<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\EduAnnouncement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<div class="col-md-7">
    <div class="edu-announcement-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => [
            'rows' => 12,
        ],
        'preset' => 'advance',
        'clientOptions' => [
            'filebrowserUploadUrl' => Url::to(['/ckeditor/upload']),
            'toolbarGroups' => 
                [
                    [ 'name' => 'clipboard',   'groups' => [ 'clipboard', 'undo' ] ],
                    [ 'name' => 'editing',     'groups' => [ 'find', 'selection', 'spellchecker' ] ],
                    [ 'name' => 'links' ],
                    [ 'name' => 'insert' ],
                    [ 'name' => 'forms' ],
                    [ 'name' => 'tools' ],
                    [ 'name' => 'document',    'groups' => [ 'mode', 'document', 'doctools' ] ],
                    [ 'name' => 'others' ],
              
                    [ 'name' => 'basicstyles', 'groups' => [ 'basicstyles', 'cleanup' ] ],
                    [ 'name' => 'paragraph',   'groups' => [ 'list', 'indent', 'blocks', 'align' ] ],
                    [ 'name' => 'styles' ],
                    [ 'name' => 'colors' ],
                    [ 'name' => 'about' ]
                ]
        ],
        
    ]) ?>

        <?= $form->field($model, 'class_id')->widget(Select2::classname(), [
                'language' => 'de',
                'data' => ArrayHelper::map($class, 'id', 'class_name'),
                'options' => ['placeholder' => '发布班级'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
             ]);  
        ?>

        <?= $form->field($model,'created_at')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => '发布日期'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d',
                ],
        ]);?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '发布' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
</div>