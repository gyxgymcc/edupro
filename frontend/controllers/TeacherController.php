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
use frontend\models\TregForm;
use yii\helpers\VarDumper;
use backend\models\EduTeacher;

class TeacherController extends Controller
{
	public function actionReg(){
		$model = new TregForm();
		$teacher = new EduTeacher();
		if ($model->load(Yii::$app->request->post())){
			$request = Yii::$app->request->post();
			
			if($teacher->load(Yii::$app->request->post())){
				VarDumper::dump($teacher,10,true);
				exit();
			}
			//$teacher->teacher_name = 
			// VarDumper::dump($model,10,true);
			// exit();
			// if ($user = $model->signup()) {
			// 	if (Yii::$app->getUser()->login($user)) {
   //                  VarDumper::dump(Yii::$app->getUser()->id,10,true);
			// 		exit();
   //              }
			// }
		}

		return $this->renderpartial('signup', [
            'model' => $model,
        ]);
	}
}