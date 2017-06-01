<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EduSubject */

$this->title = $paper['paper_name'];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '题目管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-subject-view">

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
            'que:ntext',
            'que_sec:ntext',
            'answer:ntext',
        ],
    ]) ?>

</div>
