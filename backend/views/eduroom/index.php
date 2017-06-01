<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EduroomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '课堂管理');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("

    $(document).on('pjax:complete', function(){
        var el = $('#eduroomsearch-relate_teacher');
        settings = el.attr('data-krajee-select2');
        id = el.attr('id');
        settings = window[settings];
        el.select2(settings);
        // $('.kv-plugin-loading').remove();
        // $('.select2-dropdown').remove();


        var el2 = $('#eduroomsearch-relate_teacher');
        id2 = el2.attr('id');
        el2.select2(settings);
        $('.kv-plugin-loading').remove();
        $('.select2-dropdown').remove();


        var el1 = $('#eduroomsearch-relate_class');
        settings = el1.attr('data-krajee-select2');
        id = el1.attr('id');
        settings = window[settings];
        el1.select2(settings);

        var el3 = $('#eduroomsearch-relate_class');
        id2 = el3.attr('id');
        el3.select2(settings);
        $('.kv-plugin-loading').remove();
        $('.select2-dropdown').remove();

    });

    ", \yii\web\View::POS_END);

?>
<div class="edu-room-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title">' . $this->title,
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i>添加', ['create'],
                    ['class' => 'btn btn-success']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>刷新', ['index'], ['class' => 'btn btn-info']),
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'room_name',
            //'start_time',
            [
                'label' => '开启时间',
                'attribute' => 'start_time',
                'headerOptions' => ['style' => 'width:200px;'],
                'value' => function($model){
                    return date('Y-m-d',$model->start_time);
                },
                'filterType' => GridView::FILTER_DATE,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'format' => 'yyyy-m-d',
                        'autoclose' => true,
                        'todayHighlight' => true,
                    ]
                ],
            ],
            //'relate_teacher',
            [
                'label' => '教师',
                'attribute' => 'relate_teacher',
                'value' => 'teacher.teacher_name',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'relate_teacher',
                    'hideSearch' => false,
                    'data' => ArrayHelper::map($teacher, 'id', 'teacher_name'),
                    'options' => [
                        'placeholder' => '选择教师',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    
                ]),
            ],
            //'relate_class',
            [
                'label' => '班级',
                'attribute' => 'relate_class',
                'value' => 'class.class_name',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'relate_class',
                    'hideSearch' => false,
                    'data' => ArrayHelper::map($class, 'id', 'class_name'),
                    'options' => [
                        'placeholder' => '选择班级',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    
                ]),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
