<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduRoom */

$this->title = Yii::t('app', '添加课堂');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '课堂管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-room-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
