<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\widgets\DatePicker;

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
            //'avatar',
            [
                'label' => '头像',
                'attribute' => 'avatar',
                'format' => 'html',
                'value' => function ($model) {
                    if($model->avatar){
                       return Html::img('http://'.$_SERVER['HTTP_HOST'].Yii::getAlias('@web').'/uploads/teacher/'.$model->avatar,['width' => '70px']); 
                    }
                    else{
                        return '暂无头像';
                    }
                    
                },
            ],
            //'birth',
            [
                'label' => '生日',
                'attribute' => 'birth',
                'headerOptions' => ['style' => 'width:250px;'],
                'value' => function($model){
                    return date('Y-m-d',$model->birth);
                },
                'filterType' => GridView::FILTER_DATE,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'format' => 'yyyy-m-d',
                        'autoclose' => true,
                        'todayHighlight' => true,
                    ]
                ],
            ],
            // 'sex',
            // 'phone',
            // 'school',
            // 'faculty',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
