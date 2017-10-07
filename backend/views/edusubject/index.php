<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EdusubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '题目管理');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs("
    function test(type,key){
        console.log(type);
        var url = '/index.php?r=edusubject/update&id='+key;
        var url1 = '/index.php?r=edusubject/updatesel&id='+key;
        if(type == 2 || type == 3){
            location.href = url;
        }else if(type == 0 || type == 1) {
            location.href = url1;
        };
    }; 

    $(document).on('pjax:complete', function(){
        var el = $('#edusubjectsearch-relate_paper');
        settings = el.attr('data-krajee-select2');
        id = el.attr('id');
        settings = window[settings];
        el.select2(settings);
        // $('.kv-plugin-loading').remove();
        // $('.select2-dropdown').remove();

        var el2 = $('#edusubjectsearch-relate_paper');
        id2 = el2.attr('id');
        el2.select2(settings);
        $('.kv-plugin-loading').remove();
        $('.select2-dropdown').remove();


        var el1 = $('#edusubjectsearch-type');
        settings = el1.attr('data-krajee-select2');
        id1 = el1.attr('id');
        settings = window[settings];
        el1.select2(settings);

        var el3 = $('#edusubjectsearch-type');
        id3 = el3.attr('id');
        el3.select2(settings);
        $('.kv-plugin-loading').remove();
        $('.select2-dropdown').remove();


        var el4 = $('#edusubjectsearch-dif');
        settings = el4.attr('data-krajee-select2');
        id4 = el4.attr('id');
        settings = window[settings];
        el4.select2(settings);

        var el5 = $('#edusubjectsearch-dif');
        id5 = el5.attr('id');
        el5.select2(settings);
        $('.kv-plugin-loading').remove();
        $('.select2-dropdown').remove();
    });

    ", \yii\web\View::POS_END);

?>
<div class="edu-subject-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a(Yii::t('app', '添加题目'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title">' . $this->title,
            'before' =>
                '<div class="btn-group">
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-plus"></i>添加题目 <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li>'.Html::a('选择题', ['createsel']).'</li>
                    <li>'.Html::a('非选择题', ['createunsel']).'</li>
                  </ul>
                </div>'.' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>刷新', ['index'], ['class' => 'btn btn-info']),
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'relate_paper',
            [
                'label' => '试卷名称',
                'attribute' => 'relate_paper',
                'value' => 'paper.paper_name',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'relate_paper',
                    'hideSearch' => false,
                    'data' => ArrayHelper::map($paper, 'id', 'paper_name'),
                    'options' => [
                        'placeholder' => '选择试卷',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    
                ]),
            ],
            //'que:ntext',
            [
                'label' => '题干',
                'attribute' => 'que',
                'value' => function($model){
                    return mb_substr($model->que, 0,15);
                }
            ],
            //'type',
            [
                'label' => '题型',
                'attribute' => 'type',
                'value' => function($model,$examType){
                    $val = $model::findEt($model->type);
                    return $val;
                },
                //'value' => $examType[$model->type]['name'],
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'type',
                    'hideSearch' => false,
                    'data' => ArrayHelper::map($examType, 'id', 'name'),
                    'options' => [
                        'placeholder' => '选择题型',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    
                ]),
            ],
            'maxval',
            //'dif',
            [
                'label' => '难度',
                'attribute' => 'dif',
                'value' => function($model,$examType){
                    $val = $model::findDi($model->dif);
                    return $val;
                },
                //'value' => $examType[$model->type]['name'],
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'dif',
                    'hideSearch' => false,
                    'data' => ArrayHelper::map($examDif, 'id', 'name'),
                    'options' => [
                        'placeholder' => '选择难度',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    
                ]),
            ],
            
            // 'que_sec:ntext',
            // 'answer:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                    'update' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'update'),
                            'aria-label' => Yii::t('yii', 'update'),
                            'data-pjax' => '0',
                            'onClick' => 'test('.$model->type.','.$key.')',
                            'id' => 'sss'.$key,
                        ];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',"javascript:void(0)", $options);
                    },

                ],
            ],
        ],
    ]); ?>
</div>
