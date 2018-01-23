<?php

namespace backend\controllers;

use Yii;
use backend\models\EduAnswerCheck;
use backend\models\EduanswercheckSearch;
use backend\models\EduSubject;
use backend\models\EduAnswer;
use backend\models\EduSelection;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EduanswercheckController implements the CRUD actions for EduAnswerCheck model.
 */
class EduanswercheckController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EduAnswerCheck models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EduanswercheckSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EduAnswerCheck model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EduAnswerCheck model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EduAnswerCheck();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EduAnswerCheck model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionCheck($id)
    {
        $checkModel = $this->findModel($id);
        return $this->render('check',[
            'checkModel' => $checkModel
        ]);
    }

    //考卷数据
    public function actionExamdata()
    {
        $requestData = Yii::$app->request->post();
        $params['relate_paper'] = $requestData['paperid'];
        $checkModel = $this->findModel($requestData['paperid']);
        $paperid = $checkModel->paper_id;
        $subjects = EduSubject::find()->where(['relate_paper' => $paperid])->asArray()->all();

        $stuid = $checkModel->stu_id;
        $answers = EduAnswer::find()->where(['stu_id' => $stuid,'paper_id' => $paperid])->asArray()->all();
        $tempArray = array_column($answers, 'answer', 'sub_id');
        $asidArray = array_column($answers, 'id', 'sub_id');
        foreach ($subjects as $key => $value) {
            $subjects[$key]['stu_answer'] = $tempArray[$value['id']];
            $subjects[$key]['as_id'] = $asidArray[$value['id']];
        }
        return json_encode($subjects);
    }

    //获取选项
    public function actionSelection()
    {
        $requestData = Yii::$app->request->post();
        $subid = $requestData['subid'];
        $selection = EduSelection::find()->where(['relate_subject' => $subid])->asArray()->all();

        return json_encode($selection);
    }


    //批阅
    public function actionSetcheck()
    {
        $requestData = Yii::$app->request->post();
        $data = json_decode($requestData['data']);

        $a = 66;
        foreach ($data as $key => $value) {
            if($value->is_correct){
                $checkModel = EduAnswer::findOne($value->as_id);
                $checkModel->correct = 1;
                $checkModel->final_score = $value->total_score;
                $checkModel->save();
            }
            else{
                $checkModel = EduAnswer::findOne($value->as_id);
                $checkModel->correct = 0;
                $checkModel->final_score = 0;
                $checkModel->save();
            }
        }

        $model = $this->findModel($requestData['paperid']);

        $model->is_check = 1;
        $model->save();
        return $a;
    }


    /**
     * Deletes an existing EduAnswerCheck model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EduAnswerCheck model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EduAnswerCheck the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EduAnswerCheck::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
