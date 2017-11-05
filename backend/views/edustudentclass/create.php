<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduStudentClass */

$this->title = 'Create Edu Student Class';
$this->params['breadcrumbs'][] = ['label' => 'Edu Student Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-student-class-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
