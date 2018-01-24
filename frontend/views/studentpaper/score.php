<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\EduTags;

$this->title = '试卷查看';
$this->registerJsFile(
  '@web/js/angular.min.js',['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
   '@web/js/angular-wizard.min.js',['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
  '@web/js/scorectrl.js',['depends' => [\yii\web\JqueryAsset::className()]]
);

?>
<div class="col-md-6 col-sm-6 col-xs-6" ng-app="score" ng-controller="scoreCtrl">
  <div class="x_panel">
    <div class="x_title">
      <h2><?php echo $checkModel->paper->paper_name.'(总分: '.$totalScore[0]['tcount'].'分)';?><b style="margin-left: 50px;">成绩: <?php echo $totalScore[0]['count'].'分';?></b></h2>
      <ul class="nav navbar-right panel_toolbox">
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <ul class="list-unstyled timeline">
        <li ng-repeat="sub in subjects track by $index">
          <div class="block">
            <div class="tags">
              <a href="" class="tag">
                <span>第{{ $index+1 }}题({{ sub.maxval }}分)</span>
              </a>
            </div>
            <div class="block_content">
              <h2 class="title" ng-bind-html="trustAsHtml(sub.que)"></h2>

              <!-- <div ng-if="sub.type == 0">
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
              </div> -->

              <div class="byline" style="font-size: 16px;" ng-if="sub.type == 0">
                <span ng-repeat="co in sub.choice" style="float: left;margin-right: 5px;">
                   <span ng-if="co.iscorrect == 0">{{ co.content }}</span>
                   <span ng-if="co.iscorrect == 1" style="color: black;background-color: lightgreen;">{{ co.content }}</span>
                </span>
              </div>

              <div class="byline" style="font-size: 16px;" ng-if="sub.type != 0">
                <span><b style="color:green;">正确答案: </b>{{ sub.answer }}</span>
              </div>

              <br/>

              <div class="byline" style="font-size: 16px;">
                <span><b style="color:orange;">我的答案: </b>{{ sub.stu_answer }}</span>
              </div>
              
              <br/>
              <br/>
              <p class="excerpt">
                <b>答案解析: </b><span ng-bind-html="trustAsHtml(sub.ans_info)"></span>
              </p>
            </div>
          </div>
        </li>
      </ul>

    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="box2">
            <div class="box-header">
              <h3 class="box-title">知识点考察分析</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>题目</th>
                  <th>所属知识点</th>
                </tr>
                <?php
                  foreach ($err as $key => $er) {
                    ?>
                      <tr>
                        <td><?php echo ($key+1);?>.</td>
                        <td>
                        <?php 
                          if($er->subject->type == 0){
                            $typename = '选择题';
                          }
                          else if($er->subject->type == 1){
                            $typename = '填空题';
                          }
                          else{
                            $typename = '应用题';
                          }
                          echo $typename.'第'.($key+1).'题';
                        ?> 
                        </td>
                        <td>
                          
                            <?php
                              if($er->subject->st != null){
                                $tagid = $er->subject->st->tagid;
                                $tag = EduTags::find()->where(['id' => $tagid])->asArray()->all();
                                //EduTags::find()->where(['root' => 3])->orderBy('id asc')->all();
                                //var_dump($tag);
                                ?>
                                <span class="label label-default">
                                  <?php echo $tag[0]['name'];?>
                                </span>
                                <?php
                              }
                            ?>
                            
                        </td>
                      </tr>
                    <?php
                  }
                ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
</div>