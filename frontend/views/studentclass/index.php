<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use kartik\widgets\InputWidget;

$this->title = 'My Yii Application';
?>
<div class="row">
  <div class="col-md-8">
    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            //'pjax' => true,
            'columns' => [
              //'class_name',
              [
                'label' => '班级',
                'value' => 'class_name',
                'attribute' => 'class_name',
                'headerOptions' => ['style' => 'width:20%'],
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'class_name',
                    'hideSearch' => false,
                    'data' => ArrayHelper::map($classArr, 'class_name', 'class_name'),
                    'options' => [
                        'placeholder' => '选择学校',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    
                ]),
              ],
              [
                'label' => '学校',
                'value' => 'teacher.school',
              ],
              [
                'label' => '院系',
                'value' => 'teacher.faculty',
              ],
              [
                'label' => '教师',
                'value' => 'teacher.teacher_name',
              ],
            ],
        ]
    );
    ?>
  </div>
</div>