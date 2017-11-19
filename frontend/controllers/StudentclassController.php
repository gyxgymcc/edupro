<?php

namespace frontend\controllers;
use Yii;
use backend\models\EduClass;
use backend\models\EduclassSearch;
use backend\models\EduStudentClass;
use backend\models\EdustudentclassSearch;
use backend\models\EduTeacher;

class StudentclassController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$escModel = new EduclassSearch();
    	//$searchModel = new EduclassSearch();
    	$dataProvider = $escModel->search(Yii::$app->request->queryParams);

    	//$teacherModel = new EduTeacher();
    	//$teacher = $teacherModel->find()->all();

        $classModel = new EduClass();
        $class = $classModel->find()->all();

        return $this->render('index',[
        	'dataProvider' => $dataProvider,
        	'searchModel' => $escModel,
            'classArr' => $class,
        	//'teacher' => $teacher,
        	//'teacherModel' => $teacherModel
        ]);
    }

}
