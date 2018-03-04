<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\grid\FormulaColumn;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\dialog\Dialog;
use backend\models\EduSubject;
use backend\models\EdusubjectSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EdupaperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
echo Dialog::widget();
$this->title = Yii::t('app', '试卷管理');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs("
    

    function dialog(key){
        window.location.href='/index.php?r=edusubject%2Fcreateunsel&id='+key; 
        /*krajeeDialog.prompt({label:'Provide reason', placeholder:'Upto 30 characters...'}, function (result) {
            if (result) {
                alert('Great! You provided a reason:' + result);
            } else {
                alert('哦!你拒绝提供一个理由!');
            }
        });*/
        
    };

    $(document).on('pjax:complete', function(){
        var el = $('#edupapersearch-relate_room');
        settings = el.attr('data-krajee-select2');
        id = el.attr('id');
        settings = window[settings];
        el.select2(settings);
        // $('.kv-plugin-loading').remove();
        // $('.select2-dropdown').remove();


        var el2 = $('#edupapersearch-relate_room');
        id2 = el2.attr('id');
        el2.select2(settings);
        $('.kv-plugin-loading').remove();
        $('.select2-dropdown').remove();

    });

    ", \yii\web\View::POS_END);

?>
<div class="edu-paper-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a(Yii::t('app', '添加试卷'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
<?php try {
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showPageSummary' => true,
        'striped' => true,
        'pjax' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title">' . $this->title,
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i>添加', ['create'],
                    ['class' => 'btn btn-success']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>刷新', ['index'], ['class' => 'btn btn-info']),
        ],
        'columns' => [
            [
                'class' => 'kartik\grid\SerialColumn',
                'header' => '试卷序号',
                'pageSummary' => '',
                'pageSummaryOptions' => ['class' => 'text-left text-warning'],
            ],
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'expandAllTitle' => 'Expand all',
                'collapseTitle' => 'Collapse all',
                'expandIcon' => '<span class="glyphicon glyphicon-expand"></span>',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    $sC = new EdusubjectSearch;
                    $sC->relate_paper = $key;
                    $dP = $sC->search(Yii::$app->request->queryParams);
                    return Yii::$app->controller->renderPartial('_subject-expand.php', [
                        'searchModel' => $sC,
                        'dataProvider' => $dP,
                    ]);
                },
                'detailOptions' => [
                    'class' => 'kv-state-enable',
                ],


            ],
            //'id',
            'paper_name',
            //'relate_room',
            [
                'label' => '所属课堂',
                'attribute' => 'relate_room',
                'value' => 'room.room_name',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'relate_room',
                    'hideSearch' => false,
                    'data' => ArrayHelper::map($room, 'id', 'room_name'),
                    'options' => [
                        'placeholder' => '选择课堂',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],

                ]),

            ],
            [
                'label' => '操作题目',
                'format' => 'raw',
                'value' => function ($data, $key) {
                    // return Html::button('添加本试卷题目',$options = [
                    //     'onclick'=>'dialog('.$key.')',
                    //     'id'=>'btn-prompt',
                    //     'class'=>'btn btn-primary',
                    // ]);
                    return '<div class="btn-group">
                      <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="glyphicon glyphicon-plus"></i>添加本试卷题目 <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li>' . Html::a('选择题', '/index.php?r=edusubject%2Fcreatesel&papreid=' . $key) . '</li>
                        <li>' . Html::a('非选择题', '/index.php?r=edusubject%2Fcreateunsel&id=' . $key) . '</li>
                      </ul>
                    </div>';
                }
            ],
            [
                'header' => '操作试卷',
                'headerOptions' => ['style' => 'width:200px;'],
                'class' => 'kartik\grid\ActionColumn',
                // 'template' => '{user-view} {update} {delete}',
                // 'buttons' => [
                //     // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                //     'user-view' => function ($url, $model, $key) {
                //         $options = [
                //             'title' => '添加本试卷题目',//Yii::t('yii', 'View'),
                //             'aria-label' => Yii::t('yii', 'View'),
                //             'data-pjax' => '0',
                //             'id' => 'sss',
                //         ];
                //         return Html::a('<span class="dd" style="border:1px solid  #DBDBDB; border-radius:5px; padding:5px;background-color:#EAEAEA;">添加本试卷题目</span>',"", $options);
                //     },

                // ],

            ],
        ],
    ]);
} catch (Exception $e) {
} ?>
</div>

