<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EduannouncementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '班级公告';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-announcement-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title">' . $this->title,
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i>发布', ['create'],
                    ['class' => 'btn btn-success']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>刷新', ['index'], ['class' => 'btn btn-info']),
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            // [
            //     'label' => '内容',
            //     'attribute' => 'content',
            //     'value' => function($model){
            //         return mb_substr(htmlspecialchars($model->content), 0,15);
            //     },
            // ],
            [
                'label' => '班级',
                'attribute' => 'class_id',
                'value' => 'class.class_name',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'class_id',
                    'hideSearch' => false,
                    'data' => ArrayHelper::map($class, 'id', 'class_name'),
                    'options' => [
                        'placeholder' => '选择班级',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    
                ]),
            ],
            //'created_at',
            [
                'label' => '发布时间',
                'attribute' => 'created_at',
                
            ],
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
