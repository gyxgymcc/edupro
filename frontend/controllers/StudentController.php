<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
//use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\SregForm;
use backend\models\EduStudent;
use frontend\models\StudentLoginForm;

class StudentController extends Controller
{
	public function actionReg(){
		$model = new SregForm();
		$student = new EduStudent();

		if ($model->load(Yii::$app->request->post())){
			$request = Yii::$app->request->post();
			if ($user = $model->signup()) {
				if (Yii::$app->getUser()->login($user)) {
					$userId = Yii::$app->user->getId();
					$student->student_name = $request['SregForm']['student_name'];
					$student->relate_user = $userId;
					$student->email = $request['SregForm']['username'];
					if($student->save()){
						 return $this->goHome();
					}
					else{
						return $this->renderpartial('signup', [
				            'model' => $model,
				        ]);
					}
				}
			}
		}

		return $this->renderpartial('signup', [
            'model' => $model,
        ]);
	}

	public function actionLogin()
	{
		$model = new StudentLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->renderpartial('login', [
                'model' => $model,
            ]);
        }
	}
}