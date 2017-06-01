<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EdusubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '题目管理');
$this->params['breadcrumbs'][] = $this->title;
//echo json_encode($model);
?>
<div class="edu-subject-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a(Yii::t('app', '添加题目'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'heading' => '<h3 class="panel-title">' . $this->title,
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i>添加', ['create'],
                    ['class' => 'btn btn-success']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>刷新', ['index'], ['class' => 'btn btn-info']),
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'relate_paper',
            [
                'label' => '试卷名称',
                'attribute' => 'relate_paper',
                'value' => 'paper.paper_name',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'relate_paper',
                    'hideSearch' => false,
                    'data' => ArrayHelper::map($paper, 'id', 'paper_name'),
                    'options' => [
                        'placeholder' => '选择试卷',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    
                ]),
            ],
            //'type',
            [
                'label' => '题型',
                'attribute' => 'type',
                'value' => function($model,$examType){
                    $val = $model::findEt($model->type);
                    return $val;
                },
                //'value' => $examType[$model->type]['name'],
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'type',
                    'hideSearch' => false,
                    'data' => ArrayHelper::map($examType, 'id', 'name'),
                    'options' => [
                        'placeholder' => '选择题型',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                    
                ]),
            ],
            'maxval',
            'dif',
            // 'que:ntext',
            // 'que_sec:ntext',
            // 'answer:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
