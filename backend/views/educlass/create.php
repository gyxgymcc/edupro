<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduClass */

$this->title = Yii::t('app', '添加班级');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '班级管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-class-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
