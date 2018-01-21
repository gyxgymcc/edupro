<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\EduStudent;
use backend\models\EduClass;
use backend\models\EduStudentClass;
use backend\models\EduAnnouncement;



class ProfileController extends Controller
{
	
	public function actionIndex(){
		$classModel = new EduClass();
    	$classes = $classModel->find()->all();
		return $this->render('index',[
			'classes' => $classes,
        ]);
	}


}