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
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
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
        ],
    ]) ?>

</div>
</div>
