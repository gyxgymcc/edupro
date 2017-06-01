<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EduRoom */

$this->title = $model->room_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '课堂管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-room-view">

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
            'room_name',
            //'start_time',
            [
                'attribute' => 'start_time',
                'value' => function($model){
                    return date('Y-m-d',$model->start_time);
                }
            ],
            //'relate_teacher',
            [
                'label' => '教师',
                'attribute' => 'relate_teacher',
                'value' => $teacher['teacher_name'],
            ],
            //'relate_class',
            [
                'label' => '班级',
                'attribute' => 'relate_class',
                'value' => $class['class_name'],
            ],
        ],
    ]) ?>

</div>
