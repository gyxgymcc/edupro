<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduPaper */

$this->title = Yii::t('app', 'Create Edu Paper');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Edu Papers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-paper-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
