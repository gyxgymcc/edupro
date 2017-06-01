<?php

namespace backend\controllers;

use Yii;
use backend\models\EduRoom;
use backend\models\EduroomSearch;
use backend\models\EduTeacher;
use backend\models\EduClass;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;

/**
 * EduroomController implements the CRUD actions for EduRoom model.
 */
class EduroomController extends Controller
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
     * Lists all EduRoom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EduroomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $teacherModel = new EduTeacher();
        $teacher = $teacherModel->find()->all();
        $classModel = new EduClass();
        $class = $classModel->find()->all();
        // var_dump($teacher);
        // var_dump($class);
        // die;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'teacher' => $teacher,
            'class' => $class,
        ]);
    }

    /**
     * Displays a single EduRoom model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $teacherModel = new EduTeacher();
        $classModel = new EduClass();
        $teacher = $teacherModel->findOne($model->relate_teacher);
        $class = $classModel->findOne($model->relate_class);
        return $this->render('view', [
            'model' => $model,
            'teacher' => $teacher,
            'class' => $class,
        ]);
    }

    /**
     * Creates a new EduRoom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EduRoom();
        //&& $model->save()
        if ($model->load(Yii::$app->request->post())) {
            $model->start_time = strtotime($model->start_time);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $teacherModel = new EduTeacher();
            $teacher = $teacherModel->find()->all();
            $classModel = new EduClass();
            $class = $classModel->find()->all();
            return $this->render('create', [
                'model' => $model,
                'teacher' => $teacher,
                'class' => $class,
            ]);
        }
    }

    /**
     * Updates an existing EduRoom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->start_time = strtotime($model->start_time);
            //var_dump($model->start_time);
            //exit();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $teacherModel = new EduTeacher();
            $teacher = $teacherModel->find()->all();
            $classModel = new EduClass();
            $class = $classModel->find()->all();
            $model->start_time = date('Y-m-d',$model->start_time);
            // VarDumper::dump($teacher,10,true);
            // exit();
            return $this->render('update', [
                'model' => $model,
                'teacher' => $teacher,
                'class' => $class,
            ]);
        }
    }

    /**
     * Deletes an existing EduRoom model.
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
     * Finds the EduRoom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EduRoom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EduRoom::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
