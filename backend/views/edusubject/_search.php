<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EdusubjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-subject-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'relate_paper') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'maxval') ?>

    <?= $form->field($model, 'dif') ?>

    <?php // echo $form->field($model, 'que') ?>

    <?php // echo $form->field($model, 'que_sec') ?>

    <?php // echo $form->field($model, 'answer') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
