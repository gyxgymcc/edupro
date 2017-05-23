<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EduTeacher */

$this->title = Yii::t('app', '添加教师信息');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '教师管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-teacher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
