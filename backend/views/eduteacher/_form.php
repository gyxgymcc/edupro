<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\EduTeacher */
/* @var $form yii\widgets\ActiveForm */
?>
<style type="text/css">
    .kv-file-remove{
        display: none;
    }
    .kv-file-upload{
        display: none;
    }
</style>
<div class="edu-teacher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar')->widget(FileInput::classname(),
    [
        'pluginOptions' => [
            'previewFileType' => 'any',
            'uploadUrl' => Url::to(['/ckeditor/formupload']),
            'showRemove' => false,
            'showUpload' => true,
            'initialPreview'=>$omPic,
            'initialPreviewAsData'=>true,
            'initialCaption'=>"",
            //'initialPreviewConfig' => $omConf,
            'overwriteInitial'=>true,
        ],
        'options' => ['accept' => 'image/*'],
    ])?>

    <?= $form->field($model, 'birth')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => '请选这日期'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-m-d',
            ],
    ]);?>

    <?= $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'faculty')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '添加') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
