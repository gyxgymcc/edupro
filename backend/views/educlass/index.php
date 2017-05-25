<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EduclassSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '班级管理');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("

    $(document).on('pjax:complete', function(){
        var el = $('#educlasssearch-relate_teacher');
        settings = el.attr('data-krajee-select2');
        id = el.attr('id');
        settings = window[settings];
        el.select2(settings);
        // $('.kv-plugin-loading').remove();
        // $('.select2-dropdown').remove();


        var el2 = $('#educlasssearch-relate_teacher');
        id2 = el2.attr('id');
        el2.select2(settings);
        $('.kv-plugin-loading').remove();
        $('.select2-dropdown').remove();

    });

    ", \yii\web\View::POS_END);

?>
<div class="edu-class-index">

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
            'class_name',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
