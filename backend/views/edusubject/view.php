<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EduSubject */

$this->title = $paper['paper_name'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '题目管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs("
    var type = $model->type;
    var s= document.getElementById('w0').getElementsByTagName('tr');
    window.onload=function()
    {
        if(type == 2 || type == 3){
            console.log(s[5]);
            s[5].style.display='none';
        };
        
    };

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
    ", \yii\web\View::POS_END);
?>
<div class="row">
<div class="edu-subject-view col-md-6">
    <style type="text/css">
        table.detail-view th {
    width: 40% !important;
}

table.detail-view td {
    width: 60% !important;
}
    table img{
        width: 400px !important;
        height: auto !important;
    }
    </style>
    <p>
        <!-- <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
        <button class="btn btn-primary" onclick="test(<?=$model->type?>,<?=$model->id?>)">修改</button>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'relate_paper',
            [
                'label' => '试卷名称',
                'attribute' => 'relate_paper',
                'value' => $paper['paper_name'],
            ],
            //'type',
            [
                'label' => '题型',
                'attribute' => 'type',
                'value' => function($model,$examType){
                    $val = $model::findEt($model->type);
                    return $val;
                },
            ],
            'maxval',
            //'dif',
            [
                'label' => '难度',
                'attribute' => 'type',
                'value' => function($model,$examType){
                    $val = $model::findDi($model->type);
                    return $val;
                },
            ],
            'que:html',
            // [
            //     'label' => '题干',
            //     'attribute' => 'que',
            //     'value' => $model->que,
            //     'formart' => 'raw',
            // ],
            //'que_sec:ntext',
            [
                'label' => '选择题候选答案',
                'attribute' => 'que_sec:ntext',
                'value'=>$model->que_sec,
            ],
            'answer:ntext',
            'ans_info:html',
        ],
    ]) ?>

</div>
</div>
