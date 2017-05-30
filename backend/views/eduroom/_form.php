<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\EduRoom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'room_name')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'start_time')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model,'start_time')->widget(DatePicker::classname(), [
		    'options' => ['placeholder' => 'Enter birth date ...'],
		    //'value' => date('Y-m-d',$model->start_time),
		    //'value' => '12/31/2010',
		    'pluginOptions' => [
			    'autoclose'=>true,
			    'format' => 'yyyy-m-d',
		    ],
		    // 'inputOptions' => [
		    // 	'format' => 'datetime',
		    // ],
	]);?>

    <?= $form->field($model, 'relate_teacher')->textInput() ?>

    <?= $form->field($model, 'relate_class')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '添加') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
