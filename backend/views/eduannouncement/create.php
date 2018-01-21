<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduAnnouncement */

$this->title = '发布公告';
$this->params['breadcrumbs'][] = ['label' => 'Edu Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-announcement-create">

    <?= $this->render('_form', [
        'model' => $model,
        'class' => $class,
    ]) ?>

</div>
