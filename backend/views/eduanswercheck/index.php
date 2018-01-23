<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EduanswercheckSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '试卷批阅';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-answer-check-index">

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'heading' => '<h3 class="panel-title">' . $this->title,
            'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i>刷新', ['index'], ['class' => 'btn btn-info']),
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'paper_id',
                'value' => 'paper.paper_name',
                'filter' => '',
            ],
            [
                'attribute' => 'stu_id',
                'value' => 'student.student_name'
            ],
            [
                'attribute' => 'is_check',
                'format' => 'raw',
                'value' => function($model,$key,$index,$column){
                    switch ($model->is_check) {
                        case '0':
                            return Html::tag('span', Html::encode('未批阅'),['class' => 'label label-danger']);
                            break;
                        case '1':
                            return Html::tag('span', Html::encode('已阅'),['class' => 'label label-success']);
                            break;
                        default:
                            return Html::tag('span', Html::encode('已阅'),['class' => 'label label-success']);
                            break;
                    }
                },
                'filter' => Html::activeDropDownList($searchModel,
                    'is_check',['0'=>'未批阅','1'=>'已阅'],
                    ['prompt'=>'全部']
                ),
            ],
            [
                'attribute' => 'exam_time',
                'filter' => '',
            ],
            // 'teacher_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{check}',
                'buttons' => [
                    'check' => function($url,$model){
                        return Html::a('<i class="glyphicon glyphicon-list-alt"></i>批阅', '/index.php?r=eduanswercheck%2Fcheck&id='.$model->id, ['class' => 'btn btn-info']);
                    }
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
