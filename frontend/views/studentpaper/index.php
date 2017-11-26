<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use kartik\widgets\InputWidget;
use kartik\widgets\SwitchInput;
use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */
$this->title = '试卷';
?>
<style type="text/css">
	.summary{
		display: none;
	}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<div class="row">
	<div class="col-md-4">
		<?= GridView::widget(
				[
					'dataProvider' => $dataProvider,
					'columns' => [
						//['class' => 'yii\grid\SerialColumn'],
						[
				        	'label' => '试卷名称',
				        	'value' => 'paper_name',
				    	],
				    	[
				    		'label' => '课堂',
				    		'value' => 'room.room_name'
				    	],
				    	[
				    		'label' => '监考老师',
				    		'value' => 'room.teacher.teacher_name'

				    	],
					],
				]
			);
		?>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<?php
		$model = $dataProvider->getModels()[0];
		?>
		<h4>试卷难易程度</h4>
		<canvas id="myChart" width="300" height="300"></canvas>
		<script>
			var ctx = document.getElementById("myChart").getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: [<?php echo '"'.implode('","',$model->difflabel).'"'; ?>],
			        datasets: [{
			            label: '2333',
			            data: [<?php echo implode(',',$model->diff); ?>],
			            backgroundColor: [
			            	'rgba(75, 192, 192, 0.2)',
			            	'rgba(54, 162, 235, 0.2)',
			            	'rgba(255, 206, 86, 0.2)',
			            	'rgba(153, 102, 255, 0.2)',
			                'rgba(255, 99, 132, 0.2)',
			            ],
			            borderColor: [
			            	'rgba(75, 192, 192, 1)',
			            	'rgba(54, 162, 235, 1)',
			            	'rgba(255, 206, 86, 1)',
			            	'rgba(153, 102, 255, 1)',
			                'rgba(255,99,132,1)',
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			        },
			        tooltips: {
				      callbacks: {
				        label: function(tooltipItem, data) {
				        	//console.log(data)
							var dataset = data.datasets[tooltipItem.datasetIndex];
							var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
								return previousValue + currentValue;
							});
							var currentValue = dataset.data[tooltipItem.index];
							var precentage = Math.floor(((currentValue/total) * 100)+0.5);    
							return precentage + "%";
				        }
				      }
				    }
			    }
			});
		</script>
	</div>
	<div class="col-md-1">
		
	</div>
	<div class="col-md-3">
		<h4>试卷能力维度分布</h4>
		<canvas id="tagChart" width="300" height="300"></canvas>
		<script>
			var ctx = document.getElementById("tagChart").getContext('2d');
			var tagChart = new Chart(ctx, {
			    type: 'radar',
			    data: {
			        labels: [<?php echo '"'.implode('","',$model->taglabel).'"'; ?>],
			        datasets: [{
			            label: '能力维度',
			            data: [<?php echo implode(',',$model->tagvalue); ?>],
			            backgroundColor: [
			            	'rgba(64, 0, 255, 0.3)',
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:false,
			                    display: false
			                }
			            }],
			        },
			        
			    },
			});
		</script>
	</div>

	<div class="col-md-4">
		<h4>试卷知识点统计</h4>
		<canvas id="knowchart" width="300" height="300"></canvas>
		<script>
			var ctx = document.getElementById("knowchart").getContext('2d');
			var knowchart = new Chart(ctx, {
			    type: 'polarArea',
			    data: {
			        labels: [<?php echo '"'.implode('","',$model->knowvalue['labels']).'"'; ?>],
			        datasets: [{
			            label: '能力维度',
			            data: [<?php echo implode(',',$model->knowvalue['datas']); ?>],
			            backgroundColor: [
			            	'rgba(130, 169, 44, 0.4)',
			            	'rgba(209, 130, 92, 0.4)',
			            	'rgba(182, 66, 107, 0.4)',
			            	'rgba(182, 174, 251, 0.4)',
			                'rgba(41, 174, 251, 0.4)',
			                'rgba(129, 67, 35, 0.4)',
			                'rgba(129, 161, 35, 0.4)',
			                'rgba(172, 89, 122, 0.4)',
			                'rgba(84, 89, 122, 0.4)',
			                'rgba(122, 207, 157, 0.4)',
			                'rgba(127, 71, 46, 0.4)',
			                'rgba(127, 199, 159, 0.4)',
			                'rgba(206, 132, 63, 0.4)',
			                'rgba(79, 132, 63, 0.4)',
			                'rgba(79, 132, 163, 0.4)',
			                'rgba(79, 187, 163, 0.4)',
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        
			        
			    },
			});
		</script>
	</div>
</div>

<div class="row">
	
</div>