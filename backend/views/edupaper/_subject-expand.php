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
            'id',
            'type',
            'maxval',
            'dif',
            'que',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>