<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EduTags */

$this->title = 'Update Edu Tags: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Edu Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edu-tags-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
