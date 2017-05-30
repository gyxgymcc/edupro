<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;


class TregForm extends Model
{
	public $name;
	public $username;
	public $school;
	public $faculty;
	public $password;

	public function rules()
	{
		return [
			[['name', 'username'], 'trim'],
			[['name', 'username', 'school', 'faculty', 'password'], 'required'],
			['name', 'string', 'min' => 2, 'max' => 20],

			['username', 'string', 'max' => 50],
			['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],

			['school', 'string', 'max' => 50],
			['faculty', 'string', 'max' => 50],

		];
	}

}