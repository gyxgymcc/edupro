<?php

namespace backend\controllers;

use Yii;
use backend\models\EduTeacher;
use backend\models\EduteacherSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EduteacherController implements the CRUD actions for EduTeacher model.
 */
class EduteacherController extends Controller
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
     * Lists all EduTeacher models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EduteacherSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EduTeacher model.
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
     * Creates a new EduTeacher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EduTeacher();
        $omPic = $omConf = $osPic = $osConf = [];
        if ($model->load(Yii::$app->request->post())) {
            $model->birth = strtotime($model->birth);

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'omPic' => $omPic,
                'omConf' => $omConf,
                'osPic' => $osPic,
                'osConf' => $osConf,
            ]);
        }
    }

    /**
     * Updates an existing EduTeacher model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $omPic = $omConf = $osPic = $osConf = [];
        $oldAvatar = $model->avatar;
        if ($model->load(Yii::$app->request->post())) {
            $model->birth = strtotime($model->birth);
            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/teacher/';
            $image = UploadedFile::getInstance($model, 'avatar');

            if($image != '' || $image != NULL || !empty($image)){
                $filename = $image->name;
                $extp1 = explode(".", $image->name);
                $ext = end($extp1);
                $avatar = Yii::$app->security->generateRandomString().".{$ext}";
                $path = Yii::$app->params['uploadPath'] . $avatar;
                $image->saveAs($path);
                $model->avatar = $avatar;
            }
            else{
                $model->avatar = $oldAvatar;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->birth = date('Y-m-d',$model->birth);
            if($oldAvatar != ''){
                $omPic = ['http://'.$_SERVER['HTTP_HOST'].'/uploads/teacher/'.$oldAvatar];
                $omConf = [
                    'caption' => $oldAvatar,
                    'size' => 2099
                ];
            }
            else{
                $omPic = [];
                $omConf = [];
            }
            return $this->render('update', [
                'model' => $model,
                'omPic' => $omPic,
                'omConf' => $omConf,
                'osPic' => $osPic,
                'osConf' => $osConf,
            ]);
        }
    }

    /**
     * Deletes an existing EduTeacher model.
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
     * Finds the EduTeacher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EduTeacher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EduTeacher::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
