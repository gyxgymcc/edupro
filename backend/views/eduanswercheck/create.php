<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduAnswerCheck */

$this->title = 'Create Edu Answer Check';
$this->params['breadcrumbs'][] = ['label' => 'Edu Answer Checks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-answer-check-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
