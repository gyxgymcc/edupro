<?php
use yii\helpers\Html;
use backend\models\EduStudent;

$userId = Yii::$app->user->getId();
$studentModel = new EduStudent();
$userInfo = $studentModel->findOne(['relate_user' => $userId]);
$username = $userInfo['student_name'];

$this->title = $username.'诊断报告';
?>

<div class="row" style="background-color:white;">
	<div class="pad margin no-print">
		<div class="callout callout-default" style="margin-bottom: 0!important;border: 1px solid black;">
	        <h4><i class="fa fa-calendar"></i> 日期: <?= date('Y-m-d',time()) ?></h4>
	        <span style="margin-right: 20px;">班级: 三年级</span>
	        <span style="margin-right: 20px;">学科: 数学</span>
	        <span style="margin-right: 20px;color: #408080">测试名称: <b>小数的初步认识</b></span>
	    </div>
	    <div class="row">
	    	<div class="col-md-6">
			    <div class="callout callout-default" style="margin-bottom: 0!important;border: 1px solid black;text-align: center;">
			    	<h5>学生测试的基本信息</h5>
			    </div>

			    <div class="callout callout-default" style="margin-bottom: 0!important;border: 1px solid black;text-align: left;">
			    	<h5>总成绩：前测：15（总分50）</h5>
			    	<h5>后测：50 （总分50）</h5>
			    	<h5>总用时：10分57秒</h5>
			    	<h5>统计图：</h5>
					<h5>1.能力维度图</h5>
					<img src="/uploads/<?php echo $num;?>/1.png">
					<h5>2.答对题目知识点雷达图</h5>
					<img src="/uploads/<?php echo $num;?>/2.png">
			    </div>
			</div>

			<div class="col-md-6">
				<div class="callout callout-default" style="margin-bottom: 0!important;border: 1px solid black;">
					<h5>3.答对题目知识点雷达图</h5>
					<img src="/uploads/<?php echo $num;?>/3.png">
				</div>
				
				<div class="box-body table-responsive no-padding">
					<table class="table table-bordered" style="border: 1px black solid;">
						<tbody>
							<tr>
								<th colspan="4">学习者错题情况</th>
							</tr>
							<tr>
								<th>知识考点</th>
								<th>题号</th>
								<th>错题号</th>
								<th>错题百分比</th>
							</tr>
							<tr>
								<th>小数含义</th>
								<th>1、3</th>
								<th></th>
								<th>0%</th>
							</tr>

							<tr>
								<th>读写小数</th>
								<th>2、4</th>
								<th></th>
								<th>0%</th>
							</tr>

							<tr>
								<th>小数大小比较</th>
								<th>5、6、7</th>
								<th></th>
								<th>0%</th>
							</tr>

							<tr>
								<th>小数的加减法</th>
								<th>8、9、10</th>
								<th></th>
								<th>0%</th>
							</tr>

							<tr>
								<th colspan="4">复习计划</th>
							</tr>

							<tr>
								<th colspan="2">序号</th>
								<th colspan="2">复习内容</th>
							</tr>

							<tr>
								<th colspan="2">1</th>
								<th colspan="2">小数的含义</th>
							</tr>

							<tr>
								<th colspan="2">2</th>
								<th colspan="2">小数大小的比较</th>
							</tr>

							<tr>
								<th colspan="2">3</th>
								<th colspan="2">小数加减法的运算</th>
							</tr>

							<tr>
								<th colspan="2">备注</th>
								<th colspan="2">你已经掌握本次测试所有目标，可以进行后面的学习。</th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>