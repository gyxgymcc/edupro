<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduTeacher */

$this->title = Yii::t('app', 'Create Edu Teacher');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Edu Teachers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-teacher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
