<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;


class SregForm extends Model
{
	public $student_name;
	public $username;
	public $school;
	public $faculty;
	public $password;

	public function rules()
	{
		return [
			[['student_name', 'username'], 'trim'],
			[['student_name', 'username', 'password'], 'required'],
			['student_name', 'string', 'min' => 2, 'max' => 20],

			['username', 'string', 'max' => 50],
			['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '此邮箱地址已存在'],
			['username','email'],

		];
	}

	public function attributeLabels()
    {
        return [
            'student_name' => '学生姓名',
            'username' => '邮箱',
            'password' => '密码',
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->role = 1;
        
        return $user->save() ? $user : null;
    }

}