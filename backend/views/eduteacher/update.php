<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EduTeacher */

$this->title = Yii::t('app', '修改 {modelClass}: ', [
    'modelClass' => '教师信息',
]) . $model->teacher_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '教师信息'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->teacher_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="edu-teacher-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
