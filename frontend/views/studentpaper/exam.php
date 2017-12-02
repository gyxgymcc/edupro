<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$this->title = $paper->paper_name;

$this->registerJsFile(
	'@web/js/angular.min.js',['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
   '@web/js/angular-wizard.min.js',['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
	'@web/js/ansctrl.js',['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile('@web/js/jquery.smartWizard.js',['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerCssFile('@web/css/angular-wizard.css');
?>
<div class="row">
   <div class="col-md-12" ng-app="answer" ng-controller="answerCtrl">
      <wizard on-finish="finishedWizard()" on-cancel="cancelledWizard()"> 
          <wz-step wz-title="&nbsp;&nbsp;第{{ $index+1 }}題&nbsp;&nbsp;" ng-repeat="sub in subjects track by $index">
            <div class="row">
               <div class="col-md-6">
                  <ul class="list-unstyled timeline">
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag">
                            <span>第{{ $index+1 }}題</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title">
                              
                           </h2>
                          <div class="byline">
                            <span style="font-size:16px;"><b><?= $paper->room->room_name ?></b></span> の <a><?= $paper->paper_name ?></a>
                          </div>
                          <span class="label label-info">难度: {{ dif(sub.dif) }}</span>
                          <span class="label label-warning">粪值: {{ sub.maxval }}分</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag">
                            <span>题干</span>
                          </a>
                        </div>
                        <div class="block_content">
                           <br/>
                          <p class="excerpt" ng-bind-html="trustAsHtml(sub.que)" style="color:black;font-size: 14px;">
                          </p>
                        </div>
                      </div>
                    </li>
                    <li ng-if="sub.type == 0">
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag">
                            <span>选择</span>
                          </a>
                        </div>
                        <div class="block_content">
                           <div class="form-group">
                              <p ng-repeat="co in sub.choice">
                                 <input type="radio" ng-checked="postdata[$parent.$index].stu_answer" ng-model="postdata[$parent.$index].stu_answer" name="{{ co.id }}" value="{{ co.id }}"/>{{ co.content }}<br/>
                              </p>
                           </div>
                        </div>
                      </div>
                    </li>

                    <li ng-if="sub.type != 0">
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag">
                            <span>答题</span>
                          </a>
                        </div>
                        <div class="block_content">
                             <textarea rows="10" cols="50" style="width: 400px;height: 150px;" ng-model="postdata[$index].stu_answer"></textarea>
                        </div>
                      </div>
                    </li>
                  </ul>
                 <button ng-if="!$last" wz-next value="Continue" class="btn btn-default" style="float: right;">下一题</button>
                 <button ng-if="$last" wz-next value="Finish now" class="btn btn-default" style="float: right;" ng-click="getCheck()">交卷</button>
              </div>
            </div>
         </wz-step>
      </wizard>
   </div>
</div>