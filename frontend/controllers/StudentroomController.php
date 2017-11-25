<?php

namespace frontend\controllers;

use Yii;
use backend\models\EduRoom;
use backend\models\EduStudentClass;
use backend\models\EduRoomSearch;


class StudentroomController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$roomModel  = new EduRoomSearch();
    	$dataProvider = $roomModel->search(Yii::$app->request->queryParams);

        return $this->render('index',[
        	'dataProvider' => $dataProvider,
        	'searchModel' => $roomModel,
        ]);
    }

}
