<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EduAnswerCheck */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-answer-check-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paper_id')->textInput() ?>

    <?= $form->field($model, 'stu_id')->textInput() ?>

    <?= $form->field($model, 'is_check')->textInput() ?>

    <?= $form->field($model, 'exam_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teacher_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
