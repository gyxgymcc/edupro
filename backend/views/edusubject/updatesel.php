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
    <?= $this->render('_formsel', [
        'model' => $model,
        'paper' => $paper,
        'examType' => $examType,
        'examDif' => $examDif,
        'key' => $key,
        'finalTags' => $finalTags,
        'tagModel' => $tagModel,
        'modelSelection' => $modelSelection,
    ]) ?>

</div>
