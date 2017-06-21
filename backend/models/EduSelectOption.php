<?php

namespace backend\models;

use Yii;
use yii\base\Model;

class EduSelectOption extends Model
{
	// public $isNewRecord =false;
	// public $content;
	// public $correct;

	public function rules()
	{
		return [
			[['content','correct'],'safe'],
			// ['content','required'],
		];
	}

	public function attributeLabels()
	{
		return [
			'content' => '内容',
			'correct' => '正确',
		];
	}

}