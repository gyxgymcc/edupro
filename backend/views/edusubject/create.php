<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduSubject */

$this->title = Yii::t('app', '添加题目');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '题目管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-subject-create">

    <?= $this->render('_form', [
        'model' => $model,
        'paper' => $paper,
        'examType' => $examType,
        'examDif' => $examDif,
        'key' => $key,
        'modelSelection' => $modelSelection,
    ]) ?>

</div>
