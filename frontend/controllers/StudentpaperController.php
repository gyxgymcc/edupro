<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\EduPaper;
use backend\models\EdupaperSearch;
use backend\models\EduStudent;
use backend\models\EduSubject;
use backend\models\EduSelection;

class StudentpaperController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$params = array();
    	$paperModel = new EdupaperSearch();

    	$requestData = Yii::$app->request->get();
    	$params['relate_room'] = $requestData['roomid'];
    	
    	$dataProvider = $paperModel->search($params);

    	// var_dump($dataProvider);
    	// exit();
        return $this->render('index',[
        	'dataProvider' => $dataProvider
        ]);
    }

    public function actionExam()
    {
    	// $params = array();
    	$requestData = Yii::$app->request->get();
    	// $params['relate_paper'] = $requestData['paperid'];
    	$paper = EduPaper::findOne($requestData['paperid']);
    	// $subjects = $paper->subjects;
    	
    	return $this->render('exam',[
    		'paper' => $paper
    	]);
    }

    public function actionExamdata(){
        $stuid = EduStudent::studentId();

        $params = array();
        $requestData = Yii::$app->request->post();
        $params['relate_paper'] = $requestData['paperid'];
        $paper = EduPaper::findOne($requestData['paperid']);
        $subjects = EduSubject::find()->where(['relate_paper' => $requestData['paperid']])->asArray()->all();

        return json_encode($subjects);
    }

    public function actionSelection(){
        $requestData = Yii::$app->request->post();
        $subid = $requestData['subid'];
        $selection = EduSelection::find()->where(['relate_subject' => $subid])->asArray()->all();

        return json_encode($selection);
    }

}
