<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$this->title = $checkModel->student->student_name.'的 '.$checkModel->paper->paper_name;

$this->registerJsFile(
	'@web/js/angular.min.js',['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
   '@web/js/angular-wizard.min.js',['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
	'@web/js/chkctrl.js',['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerCssFile('@web/css/checkbox.css');
?>

<div class="row">
	<div class="col-md-12" ng-app="check" ng-controller="checkCtrl">
		<div class="col-md-6" ng-repeat="sub in subjects track by $index">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">第{{ $index+1 }}题</h3>
              <span class="" style="text-align: right;">({{ sub.maxval }}分)</span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <blockquote>
                <p ng-bind-html="trustAsHtml(sub.que)"></p>
                <div ng-if="sub.type == 0">
                  <div class="block">
                    <div class="block_content">
                       <div class="form-group">
                          <span ng-repeat="co in sub.choice" style="float: left;margin-right: 5px;">
                             <span ng-if="co.iscorrect == 0">{{ co.content }}</span>
                             <span ng-if="co.iscorrect == 1" style="color: green;border: 0.5px lightgreen solid;">{{ co.content }}</span>
                          </span>
                       </div>
                    </div>
                  </div>
                </div>
                <div ng-if="sub.type != 0">
                  <div class="block">
                    <div class="block_content">
                      <div class="form-group">
                        <span><b style="color:green;">正确答案: </b>{{ sub.answer }}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <br/>
                <span><b style="color:orange;">学生答案: </b>{{ sub.stu_answer }}</span>
                <div class="row">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6">
                    <div class="center">
                      <label class="label">
                        <input  class="label__checkbox" type="checkbox" ng-model="postdata[$index].is_correct" />
                        <span class="label__text">
                          <span class="label__check">
                            <i class="fa fa-check icon"></i>
                          </span>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </blockquote>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <a class="btn btn-app" style="float: right;margin-right: 25px;color: green;background-color: lightblue;" ng-click="check()">
          <i class="fa fa-save"></i> 批阅结束
        </a>
        <a class="btn btn-app" style="float: right;margin-right: 25px;color: green;background-color: lightblue;" ng-click="return()">
          <i class="fa fa-repeat"></i> 取消
        </a>
	</div>
  
</div>