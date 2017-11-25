<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use kartik\widgets\InputWidget;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
$this->title = '已加入课堂';
?>
<h1><?=$this->title ?></h1>
<div class="row">
	<div class="col-md-6">
		<?= GridView::widget(
			[
				'dataProvider' => $dataProvider,
			    'filterModel' => $searchModel,
			    'columns' => [
			    	['class' => 'yii\grid\SerialColumn'],
			    	[
				        'label' => '课堂名字',
				        'value' => 'room_name',
				    ],
				    [
				    	'label' => '所在班级',
				    	'value' => 'class.class_name',
				    ],
				    [
				    	'label' => '开堂时间',
				    	'value' => function ($model){
				    		return date('Y年m月d日',$model->start_time);
				    	},

				    ],
				    [
				    	'label' => '任课老师',
				    	'value' => 'teacher.teacher_name',
				    ],
				    [
				    	'label' => '试卷数量',
				    	'value' => function ($model){
				    		return count($model->papercount);
				    	},

				    ],
				    [
				    	'label' => '操作',
				    	'format'=>'raw',
		                'value' => function($model){
		                    return Html::a('查看试卷', '/index.php?r=studentpaper%2Findex&roomid='.$model['id'],['class' => 'btn btn-round btn-success']);
			            }
				    ],
			    ],
			]
		);
		?>
	</div>
</div>
