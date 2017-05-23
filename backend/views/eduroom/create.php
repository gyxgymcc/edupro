<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduRoom */

$this->title = Yii::t('app', 'Create Edu Room');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Edu Rooms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
