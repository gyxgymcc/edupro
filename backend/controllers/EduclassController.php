<?php

namespace backend\controllers;

use Yii;
use backend\models\EduClass;
use backend\models\EduclassSearch;
use backend\models\EduTeacher;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EduclassController implements the CRUD actions for EduClass model.
 */
class EduclassController extends Controller
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
     * Lists all EduClass models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EduclassSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $teacherModel = new EduTeacher();
        
        if(!EduTeacher::isAdmin()){
            $teacher = $teacherModel->find()->where(['relate_user' => Yii::$app->user->identity->id])->all();
        }
        else{
            $teacher = $teacherModel->find()->all();
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'teacher' => $teacher,
        ]);
    }

    /**
     * Displays a single EduClass model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $teacherModel = new EduTeacher();
        $teacher = $teacherModel->findOne($model->relate_teacher);
        return $this->render('view', [
            'model' => $model,
            'teacher' => $teacher,
        ]);
    }

    /**
     * Creates a new EduClass model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EduClass();
        $teacherModel = new EduTeacher();
        if(!EduTeacher::isAdmin()){
            $teacher = $teacherModel->find()->where(['relate_user' => Yii::$app->user->identity->id])->all();
        }
        else{
            $teacher = $teacherModel->find()->all();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'teacher' => $teacher,
            ]);
        }
    }

    /**
     * Updates an existing EduClass model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $teacherModel = new EduTeacher();
        if(!EduTeacher::isAdmin()){
            $teacher = $teacherModel->find()->where(['relate_user' => Yii::$app->user->identity->id])->all();
        }
        else{
            $teacher = $teacherModel->find()->all();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('update', [
                'model' => $model,
                'teacher' => $teacher,
            ]);
        }
    }

    /**
     * Deletes an existing EduClass model.
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
     * Finds the EduClass model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EduClass the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EduClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
