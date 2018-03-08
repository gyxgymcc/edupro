<?php

namespace backend\controllers;

use Yii;
use backend\models\EduPaper;
use backend\models\EdupaperSearch;
use backend\models\EduTeacher;
use backend\models\EduRoom;
use backend\models\EduAnswer;
use backend\models\EduAnswerCheck;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EdupaperController implements the CRUD actions for EduPaper model.
 */
class EdupaperController extends Controller
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
     * Lists all EduPaper models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EdupaperSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $roomModel = new EduRoom();
        $room = $roomModel->find()->all();


        if(!EduTeacher::isAdmin()){
            $room = $roomModel->find()->where(['relate_teacher' => EduTeacher::relateUser()])->all();
        }
        else{
            $room = $roomModel->find()->all();
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'room' => $room,
        ]);
    }

    /**
     * Displays a single EduPaper model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $roomModel = new EduRoom();
        $room = $roomModel->findOne($model->relate_room);
        return $this->render('view', [
            'model' => $model,
            'room' => $room,
        ]);
    }

    public function actionReport($id){
        $model = $this->findModel($id);

        //得分
        $totalScore = EduAnswer::find()->select(['SUM(final_score) AS count','SUM(total_score) AS tcount'])->where(['paper_id' => $id])->groupBy('paper_id')->asArray()->all();

        //平均分
        $totalStuscore = EduAnswer::find()->select(['SUM(final_score) AS count','SUM(total_score) AS tcount'])->where(['paper_id' => $id])->groupBy('paper_id')->asArray()->all();

        $stuCount = EduAnswerCheck::find()->select(['COUNT(1) AS count'])->where(['paper_id' => $id])->asArray()->all();

        $difper = $totalStuscore[0]['count']/$stuCount[0]['count']/$totalScore[0]['tcount'];

        $pertime = date('i分s秒',20*(50+$difper*12));

        $average = $totalStuscore[0]['count']/$stuCount[0]['count'];

        return $this->render('report',[
            'model' => $model,
            'difper' => $difper,
            'totalScore' => $totalScore,
            'totalStuscore' => $totalStuscore,
            'stuCount' => $stuCount,
            'pertime' => $pertime,
            'average' => $average,
        ]);
    }

    /**
     * Creates a new EduPaper model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EduPaper();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $roomModel = new EduRoom();
            if(!EduTeacher::isAdmin()){
                $room = $roomModel->find()->where(['relate_teacher' => EduTeacher::relateUser()])->all();
            }
            else{
                $room = $roomModel->find()->all();
            }
            return $this->render('create', [
                'model' => $model,
                'room' => $room,
            ]);
        }
    }

    /**
     * Updates an existing EduPaper model.
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
            $roomModel = new EduRoom();
            if(!EduTeacher::isAdmin()){
                $room = $roomModel->find()->where(['relate_teacher' => EduTeacher::relateUser()])->all();
            }
            else{
                $room = $roomModel->find()->all();
            }
            return $this->render('update', [
                'model' => $model,
                'room' => $room,
            ]);
        }
    }

    /**
     * Deletes an existing EduPaper model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSturep($name)
    {
        $num = rand(0,2);
        return $this->render($num, [
            'name' => base64_decode($name),
            'num' => $num,
        ]);
    }

    /**
     * Finds the EduPaper model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EduPaper the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EduPaper::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
