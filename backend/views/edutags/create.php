<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduTags */

$this->title = 'Create Edu Tags';
$this->params['breadcrumbs'][] = ['label' => 'Edu Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-tags-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
