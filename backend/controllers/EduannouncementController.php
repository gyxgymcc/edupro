<?php

namespace backend\controllers;

use Yii;
use backend\models\EduAnnouncement;
use backend\models\EduannouncementSearch;
use backend\models\EduClass;
use backend\models\EduTeacher;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EduannouncementController implements the CRUD actions for EduAnnouncement model.
 */
class EduannouncementController extends Controller
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
     * Lists all EduAnnouncement controllers.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EduannouncementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $classModel = new EduClass();

        if(!EduTeacher::isAdmin()){
            $class = $classModel->find()->where(['relate_teacher' => EduTeacher::relateUser()])->all();
        }
        else{
            $class = $classModel->find()->all();
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'class' => $class,
        ]);
    }

    /**
     * Displays a single EduAnnouncement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $classModel = new EduClass();
        $class = $classModel->findOne($model->class_id);
        return $this->render('view', [
            'model' => $model,
            'class' => $class,
        ]);
    }

    /**
     * Creates a new EduAnnouncement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EduAnnouncement();
        $classModel = new EduClass();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            if(!EduTeacher::isAdmin()){
                $class = $classModel->find()->where(['relate_teacher' => EduTeacher::relateUser()])->all();
            }
            else{
                $class = $classModel->find()->all();
            }

            return $this->render('create', [
                'model' => $model,
                'class' => $class,
            ]);
        }
    }

    /**
     * Updates an existing EduAnnouncement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $classModel = new EduClass();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            if(!EduTeacher::isAdmin()){
                $class = $classModel->find()->where(['relate_teacher' => EduTeacher::relateUser()])->all();
            }
            else{
                $class = $classModel->find()->all();
            }

            return $this->render('update', [
                'model' => $model,
                'class' => $class,
            ]);
        }
    }

    /**
     * Deletes an existing EduAnnouncement model.
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
     * Finds the EduAnnouncement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EduAnnouncement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EduAnnouncement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
