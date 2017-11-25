<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\EdupaperSearch;

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

}
