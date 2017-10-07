<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EduTeacher */

$this->title = $model->teacher_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '教师信息'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-2">
</div>
<div class="edu-teacher-view col-md-4">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'teacher_name',
            'email:email',
            //'avatar',
            [
                'attribute' => 'avatar',
                'value' => function($model){
                    return 'http://'.$_SERVER['HTTP_HOST'].Yii::getAlias('@web').'/uploads/teacher/'.$model->avatar;
                },
                'format' => ['image',['width'=>'200','height'=>'200']],
            ],
            //'birth',
            [
                'attribute' => 'birth',
                'value' => function($model){
                    return date('Y-m-d',$model->birth);
                }
            ],
            'sex',
            'phone',
            'school',
            'faculty',
        ],
    ]) ?>
    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
</div>
