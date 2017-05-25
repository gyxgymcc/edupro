<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EduSubject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-subject-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'relate_paper')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'maxval')->textInput() ?>

    <?= $form->field($model, 'dif')->textInput() ?>

    <?= $form->field($model, 'que')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'que_sec')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '添加') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
