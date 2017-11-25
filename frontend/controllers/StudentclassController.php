<?php

namespace frontend\controllers;
use Yii;
use backend\models\EduClass;
use backend\models\EduclassSearch;
use backend\models\EduStudentClass;
use backend\models\EdustudentclassSearch;
use backend\models\EduTeacher;
use backend\models\EduStudent;

class StudentclassController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$escModel = new EdustudentclassSearch();
    	//$searchModel = new EduclassSearch();
    	$dataProvider = $escModel->search(Yii::$app->request->queryParams);

    	//$teacherModel = new EduTeacher();
    	//$teacher = $teacherModel->find()->all();

        $classModel = new EduClass();
        $classes = $classModel->find()->all();



        return $this->render('index',[
        	'dataProvider' => $dataProvider,
        	'searchModel' => $escModel,
            'classes' => $classes,
        	//'teacher' => $teacher,
        	//'teacherModel' => $teacherModel
        ]);
    }

    public function actionIn()
    {
        $postdata = Yii::$app->request->post();
        $escModel = new EduStudentClass();
        


        $uid = Yii::$app->user->identity->id;
        $studentInfo = EduStudent::findOne(['relate_user' => $uid]);
        $stuid = $studentInfo['id'];

        if(EduStudentClass::find()->where(['student_id' => $stuid,'class_id' => $postdata['class_id']])->exists()){
            return '已加入班级,请勿重复加入';
        }

        $escModel->load(Yii::$app->request->post());
        $escModel->class_id = $postdata['class_id'];
        $escModel->student_id = intval($stuid);
        $escModel->in_time = date('Y-m-d H:i:s',time());
        $escModel->is_in = 1;
        $escModel->gradute = 0;
        //$escModel->load($data);
        $escModel->save();
        return '加入成功';
    }

}
