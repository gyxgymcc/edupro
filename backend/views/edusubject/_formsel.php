<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model backend\models\EduSubject */
/* @var $form yii\widgets\ActiveForm */
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

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelSelection[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'content',
        ],
    ]); ?>

    <div class="row" style="padding-left: 15px;">
    <div class="panel panel-default col-md-8">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> 选项
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> 添加选择题选项</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelSelection as $index => $modelSelectionSingle): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">选项: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelSelectionSingle->isNewRecord) {
                                echo Html::activeHiddenInput($modelSelectionSingle, "[{$index}]id");
                            }
                        ?>
                        <?= $form->field($modelSelectionSingle, "[{$index}]content")->textInput(['maxlength' => true]) ?>

                        <?= $form->field($modelSelectionSingle, "[{$index}]iscorrect")->checkBox() ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>


    <?php DynamicFormWidget::end(); ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '添加') : Yii::t('app', '修改'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
