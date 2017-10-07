<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\EduClass */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edu-class-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'class_name')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'relate_teacher')->textInput() ?> -->

    <?= $form->field($model, 'relate_teacher')->widget(Select2::classname(), [
            'language' => 'de',
            'data' => ArrayHelper::map($teacher, 'id', 'teacher_name'),
            'options' => ['placeholder' => '请选择课堂'],
            'pluginOptions' => [
                'allowClear' => true
            ],
         ]);  
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '添加') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
