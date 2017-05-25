<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EduClass */

$this->title = Yii::t('app', '修改 {modelClass}: ', [
    'modelClass' => '班级名称',
]) . $model->class_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '班级管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="edu-class-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
