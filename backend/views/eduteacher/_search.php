<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EduteacherSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-teacher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'teacher_name') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'avatar') ?>

    <?= $form->field($model, 'birth') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'school') ?>

    <?php // echo $form->field($model, 'faculty') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
