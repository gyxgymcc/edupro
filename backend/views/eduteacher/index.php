<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EduteacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '教师管理');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-teacher-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title">' . $this->title,
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i>添加', ['create'],
                    ['class' => 'btn btn-success']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>刷新', ['index'], ['class' => 'btn btn-info']),
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'teacher_name',
            'email:email',
            'avatar',
            'birth',
            // 'sex',
            // 'phone',
            // 'school',
            // 'faculty',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
