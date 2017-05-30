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
?>
<div class="edu-room-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
                // 'filter' => DatePicker::widget([
                //     'name' => 'start_time',
                //     'type' => DatePicker::TYPE_COMPONENT_APPEND,
                //     'pluginOptions' => [
                //         'autoclose'=>true,
                //         'attribute' => 'start_time',
                //         'format' => 'yyyy-mm-dd'
                //     ],
                // ]),
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
            'relate_class',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
