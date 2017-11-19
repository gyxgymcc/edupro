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
    .fa♂:nth-child(1) .tile-stats{
        background-color: white;
        color: lightpink;
    }
    .fa♂:nth-child(2) .tile-stats{
        background-color: white;
        color: #2894FF;
    }
    .fa♂:nth-child(3) .tile-stats{
        background-color: white;
        color: #4F9D9D;
    }
    .fa♂:nth-child(4) .tile-stats{
        background-color: white;
        color: #949449;
    }
    .fa♂ i{
        color: #000000;
    }

</style>
<div class="site-index">
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-md-3 fa♂" id='title1'>
                <?=
                \yiister\gentelella\widgets\StatsTile::widget(
                    [
                        'icon' => 'users',
                        'header' => Html::a('班级', ['studentclass/index'],['style' => 'color:black;']),
                        'text' => '学习知识要善于思考，思考，再思考。 —— 爱因斯坦',
                        'number' => $classcount?$classcount.'个班级':'未加入班级',
                    ]
                )
                ?>
            </div>
            <div class="col-xs-12 col-md-3 fa♂">
                <?=
                \yiister\gentelella\widgets\StatsTile::widget(
                    [
                        'icon' => 'newspaper-o',
                        'header' => Html::a('未完成的试卷', ['studentclass/index'],['style' => 'color:black;']),
                        'text' => '只要愿意学习，就一定能够学会。 —— 列宁',
                        'number' => '1.5%',
                    ]
                )
                ?>
            </div>
            <div class="col-xs-12 col-md-3 fa♂">
                <?=
                \yiister\gentelella\widgets\StatsTile::widget(
                    [
                        'icon' => 'list-ol',
                        'header' => Html::a('成绩一览', ['studentclass/index'],['style' => 'color:black;']),
                        'text' => '我们愈是学习，愈觉得自己的贫乏。 —— 雪莱',
                        'number' => '1807',
                    ]
                )
                ?>
            </div>
            <div class="col-xs-12 col-md-3 fa♂">
                <?=
                \yiister\gentelella\widgets\StatsTile::widget(
                    [
                        'icon' => 'comments-o',
                        'header' => Html::a('班级通知', ['studentclass/index'],['style' => 'color:black;']),
                        'text' => '人要独立生活，学习有用的技艺。 —— 凯德',
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
