<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model backend\models\EduSubject */
/* @var $form yii\widgets\ActiveForm */
$examTypes = array(['id' => 2,'name' => '填空题'], ['id' => 3,'name' => '应用题']);
?>

<div class="edu-subject-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'relate_paper')->widget(Select2::classname(), [
            'language' => 'de',
            'data' => ArrayHelper::map($paper, 'id', 'paper_name'),
            'options' => [
                'placeholder' => '请选择试卷',
                'value' => $key,
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
         ]); 
     ?>

    <?= $form->field($model, 'type')->widget(Select2::classname(), [
            'language' => 'de',
            'data' => ArrayHelper::map($examTypes, 'id', 'name'),
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

    <?= $form->field($tagModel, 'id')->widget(Select2::classname(), [
            'data' => $finalTags,
            'options' => ['placeholder' => '选择标签'],
            'pluginOptions' => [
                'multiple' => true,
            ],
        ])->label('标签');

    ?>

   <!--  <?= $form->field($model, 'que')->textarea(['rows' => 6]) ?> -->

    <?= $form->field($model, 'que')->widget(CKEditor::className(), [
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


    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '添加') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
