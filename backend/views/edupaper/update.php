<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EduPaper */

$this->title = Yii::t('app', '修改 {modelClass}: ', [
    'modelClass' => '试卷',
]) . $model->paper_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '试卷管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="edu-paper-update">

    <?= $this->render('_form', [
        'model' => $model,
        'room' => $room,
    ]) ?>

</div>
