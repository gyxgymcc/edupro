<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduPaper */

$this->title = Yii::t('app', '添加试卷');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '试卷管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-paper-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
