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
			
			// if($teacher->load(Yii::$app->request->post())){
			// 	VarDumper::dump($teacher,10,true);
			// 	exit();
			// }
			if ($user = $model->signup()) {
				if (Yii::$app->getUser()->login($user)) {
					$userId = Yii::$app->user->getId();
					$teacher->relate_user = $userId;
					$teacher->teacher_name = $request['TregForm']['teacher_name'];
					$teacher->email = $request['TregForm']['username'];
					$teacher->school = $request['TregForm']['school'];
					$teacher->faculty = $request['TregForm']['faculty'];
					if($teacher->save()){
						Yii::$app->user->logout();
						header("Location: http://edu.app");
						exit();
					}
					else{
						return $this->renderpartial('signup', [
				            'model' => $model,
				        ]);
					}
                }
			}

			return $this->renderpartial('signup', [
	            'model' => $model,
	        ]);
		}

		return $this->renderpartial('signup', [
            'model' => $model,
        ]);
	}
}