<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduClass */

$this->title = Yii::t('app', 'Create Edu Class');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Edu Classes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-class-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
