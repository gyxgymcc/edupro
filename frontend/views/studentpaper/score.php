<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = '试卷查看';
$this->registerJsFile(
  '@web/js/angular.min.js',['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerJsFile(
  '@web/js/scorectrl.js',['depends' => [\yii\web\JqueryAsset::className()]]
);

?>
<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="x_panel" ng-app="score" ng-controller="scoreCtrl">
    <div class="x_title">
      <h2>Daily active users <small>Sessions</small></h2>
      <ul class="nav navbar-right panel_toolbox">
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <ul class="list-unstyled timeline">
        <li>
          <div class="block">
            <div class="tags">
              <a href="" class="tag">
                <span>Entertainment</span>
              </a>
            </div>
            <div class="block_content">
              <h2 class="title">
                              <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                          </h2>
              <div class="byline">
                <span>13 hours ago</span> by <a>Jane Smith</a>
              </div>
              <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
              </p>
            </div>
          </div>
        </li>
        <li>
          <div class="block">
            <div class="tags">
              <a href="" class="tag">
                <span>Entertainment</span>
              </a>
            </div>
            <div class="block_content">
              <h2 class="title">
                              <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                          </h2>
              <div class="byline">
                <span>13 hours ago</span> by <a>Jane Smith</a>
              </div>
              <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
              </p>
            </div>
          </div>
        </li>
        <li>
          <div class="block">
            <div class="tags">
              <a href="" class="tag">
                <span>Entertainment</span>
              </a>
            </div>
            <div class="block_content">
              <h2 class="title">
                              <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                          </h2>
              <div class="byline">
                <span>13 hours ago</span> by <a>Jane Smith</a>
              </div>
              <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
              </p>
            </div>
          </div>
        </li>
      </ul>

    </div>
  </div>
</div>