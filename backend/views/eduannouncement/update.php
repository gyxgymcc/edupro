<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EduAnnouncement */

$this->title = '修改公告: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Edu Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edu-announcement-update">

    <?= $this->render('_form', [
        'model' => $model,
        'class' => $class,
    ]) ?>

</div>
