<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EduRoom */

$this->title = Yii::t('app', '修改 {modelClass}: ', [
    'modelClass' => '课堂',
]) . $model->room_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '课堂'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->room_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="edu-room-update">

    <?= $this->render('_form', [
        'model' => $model,
        'teacher' => $teacher,
        'class' => $class,
    ]) ?>

</div>
