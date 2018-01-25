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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
                        foreach ($er->subject->st as $key2 => $val) {
                          $tagid = $val->tagid;
                          $tag = EduTags::find()->where(['id' => $tagid,'root' => 12])->asArray()->all();
                          if(!empty($tag[0])){
                          ?>
                          <span class="label label-info">
                            <?php echo $tag[0]['name'];?>
                          </span>
                          <?php
                          }
                        }
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


  <div class="col-md-6">
    <h4>学生答题能力维度分析</h4>
    <canvas id="tagChart" width="300" height="300"></canvas>
    <script>
      var ctx = document.getElementById("tagChart").getContext('2d');
      var tagChart = new Chart(ctx, {
          type: 'radar',
          data: {
              labels: [<?php echo '"'.implode('","',$checkModel->paper->taglabel).'"'; ?>],
              datasets: [{
                  label: '学生能力维度',
                  data: [<?php echo implode(',',$checkModel->paper->tagvalue2); ?>],
                  backgroundColor: [
                    'rgba(96, 236, 10, 0.3)',
                  ],
                  borderWidth: 1
              },{
                label: '总体能力维度',
                data: [<?php echo implode(',',$checkModel->paper->tagvalue); ?>],
                backgroundColor: [
                  'rgba(74, 178, 213, 0.3)',
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

  <div class="col-md-6">
    <h4>试卷难易程度</h4>
    <canvas id="myChart" width="300" height="300"></canvas>
    <script>
      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: [<?php echo '"'.implode('","',$checkModel->paper->difflabel).'"'; ?>],
              datasets: [{
                  label: '<?php echo $checkModel->paper->paper_name;?>',
                  data: [<?php echo implode(',',$checkModel->paper->diff); ?>],
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
                  yAxes: [{
                      ticks: {
                          beginAtZero:true,
                          display: false
                      }
                  }],
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

  <div class="col-md-6">
    <h4>试卷总体难易度</h4>
    <p><b>难度系数: </b> <?php echo round($difper,2);?></p>
  </div>
</div>