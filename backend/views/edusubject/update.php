<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EduSubject */

$this->title = Yii::t('app', '修改 {modelClass}: ', [
    'modelClass' => '题目',
]) ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '题目管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '题目', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '修改');
?>
<div class="edu-subject-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'paper' => $paper,
        'examType' => $examType,
        'examDif' => $examDif,
    ]) ?>

</div>
