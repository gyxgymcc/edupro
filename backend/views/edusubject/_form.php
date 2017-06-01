<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\EduSubject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-subject-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'relate_paper')->widget(Select2::classname(), [
            'language' => 'de',
            'data' => ArrayHelper::map($paper, 'id', 'paper_name'),
            'options' => ['placeholder' => '请选择试卷'],
            'pluginOptions' => [
                'allowClear' => true
            ],
         ]); 
     ?>

    <?= $form->field($model, 'type')->widget(Select2::classname(), [
            'language' => 'de',
            'data' => ArrayHelper::map($examType, 'id', 'name'),
            'options' => ['placeholder' => '请选择题型'],
            'pluginOptions' => [
                'allowClear' => true
            ],
         ]); 
    ?>

    <?= $form->field($model, 'maxval')->textInput() ?>

    <?= $form->field($model, 'dif')->widget(Select2::classname(), [
            'language' => 'de',
            'data' => ArrayHelper::map($examDif, 'id', 'name'),
            'options' => ['placeholder' => '请选择难度'],
            'pluginOptions' => [
                'allowClear' => true
            ],
         ]);  
    ?>

    <?= $form->field($model, 'que')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'que_sec')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '添加') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
