<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EduAnnouncement */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '班级公告', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-6">
        <div class="edu-announcement-view">

            <p>
                <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('删除', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'title',
                    [
                        'attribute' => 'content',
                        'format' => 'raw',
                    ],
                    //'class_id',
                    [
                        'attribute' => 'class_id',
                        'value' => $class['class_name'],
                    ],
                    'created_at',
                ],
            ]) ?>

        </div>
    </div>
</div>
