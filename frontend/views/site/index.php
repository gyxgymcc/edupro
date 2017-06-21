<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<style type="text/css">
    /*.icon{}
    .tile-stats > div {
        background-color: aqua;
    }*/
/*    #title1{
        background-color: aqua;
    }*/
    .row .col-xs-12:nth-child(1) .tile-stats{
        background-color: pink;
    }
    .row .col-xs-12:nth-child(2) .tile-stats{
        background-color: green;
    }
</style>
<div class="site-index">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-md-3" id='title1'>
                <?=
                \yiister\gentelella\widgets\StatsTile::widget(
                    [
                        'icon' => 'list-alt',
                        'header' => Html::a('已加入班级', ['createsel'],['style' => 'color:black;']),
                        'text' => 'All orders list',
                        'number' => '7084',
                    ]
                )
                ?>
            </div>
            <div class="col-xs-12 col-md-3">
                <?=
                \yiister\gentelella\widgets\StatsTile::widget(
                    [
                        'icon' => 'pie-chart',
                        'header' => 'Conversion',
                        'text' => 'Users to orders',
                        'number' => '1.5%',
                    ]
                )
                ?>
            </div>
            <div class="col-xs-12 col-md-3">
                <?=
                \yiister\gentelella\widgets\StatsTile::widget(
                    [
                        'icon' => 'users',
                        'header' => 'Users',
                        'text' => 'Count of registered users',
                        'number' => '1807',
                    ]
                )
                ?>
            </div>
            <div class="col-xs-12 col-md-3">
                <?=
                \yiister\gentelella\widgets\StatsTile::widget(
                    [
                        'icon' => 'comments-o',
                        'header' => 'Reviews',
                        'text' => 'The next reviews are not approved',
                        'number' => '31',
                    ]
                )
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div id="w7" class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-arrow-up"></i> Collapsable panel</h2>
                        <ul id="w8" class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="display: block;">
                        <p>You can hide this text. Just click a collapse button in a panel header.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>
