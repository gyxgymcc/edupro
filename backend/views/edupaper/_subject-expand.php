<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AllegatoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = '草';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="allegato-index">
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'label' => '题干',
                'attribute' => 'que',
                'value' => function($model){
                    return mb_substr($model->que,0,20);
                },
            ],
            [
                'label' => '题型',
                'attribute' => 'type',
                'value' => function($model,$examType){
                    $val = $model::findEt($model->type);
                    return $val;
                },
            ],
            'maxval',
            [
                'label' => '难度',
                'attribute' => 'dif',
                'value' => function($model,$examType){
                    $val = $model::findDi($model->dif);
                    return $val;
                },
            ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>