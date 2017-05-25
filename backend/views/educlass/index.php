<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EduclassSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '班级管理');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-class-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '添加班级'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'class_name',
            [
                'label' => '教师',
                'attribute' => 'relate_teacher',
                'value' => 'teacher.teacher_name',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'relate_teacher',
                    'hideSearch' => false,
                    'data' => ArrayHelper::map($teacher, 'id', 'teacher_name'),
                    'options' => [
                        'placeholder' => '选择以筛选',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    
                ]),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
