<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduSubject */

$this->title = Yii::t('app', 'Create Edu Subject');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Edu Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-subject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
