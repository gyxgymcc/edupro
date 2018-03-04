<?php

$this->title = $model->paper_name.'(测试报告)';
?>

<div class="pad margin no-print">
    <div class="callout callout-default" style="margin-bottom: 0!important;border: 1px solid black;">
        <h4><i class="fa fa-calendar"></i> 日期: <?= date('Y-m-d',time()) ?></h4>
        <span style="margin-right: 20px;">班级: <?= $model->room->class->class_name ?></span>
        <span style="margin-right: 20px;">课堂: <?= $model->room->room_name ?></span>
        <span style="margin-right: 20px;color: #408080">测试名称: <b><?= $model->paper_name ?></b></span>
    </div>

    <div class="callout callout-success" style="margin-bottom: 0!important;margin-top: 5px;font-size: 18px;">
        <h4><i class="fa fa-info"></i> 测试基本信息</h4>
        <p>试卷总成绩: <?= $totalScore[0]['tcount'].'分'?></p>
        <p>平均成绩: <?= $average.'分' ?></p>
        <p>平均用时: <?= $pertime ?></p>
        <p>试卷难度: <?= round($difper,2) ?></p>
    </div>

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">试题情况统计表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>目标</th>
                        <th colspan="2">1</th>
                        <th colspan="2">2</th>
                        <th colspan="3">3</th>
                        <th colspan="3">4</th>
                        <th colspan="2">题目</th>
                        <th colspan="2">目标</th>
                    </tr>
                    <tr>
                        <th>题号</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>#</th>
                        <th>%</th>
                        <th>#</th>
                        <th>%</th>
                    </tr>
<!--                    <tr>-->
<!--                        <td>学生1</td>-->
<!--                        <td><i class="fa fa-close"></i></td>-->
<!--                        <td><i class="fa fa-close"></i></td>-->
<!--                        <td><i class="fa fa-close"></i></td>-->
<!--                        <td><i class="fa fa-close"></i></td>-->
<!--                        <td><i class="fa fa-close"></i></td>-->
<!--                        <td><i class="fa fa-close"></i></td>-->
<!--                        <td><i class="fa fa-close"></i></td>-->
<!--                        <td><i class="fa fa-close"></i></td>-->
<!--                        <td><i class="fa fa-close"></i></td>-->
<!--                        <td><i class="fa fa-close"></i></td>-->
<!--                        <td>9</td>-->
<!--                        <td>100</td>-->
<!--                        <td>4</td>-->
<!--                        <td>100</td>-->
<!--                    </tr>-->
                    <?php
                    for($i = 0;$i <= 10;$i++){
                        ?>
                        <tr>
                            <td>学生<?= $i+1 ?></td>
                            <td><?= rand(0,1)?"<i class=\"fa fa-close\"></i>":"<i class='fa fa-check'></i>" ?></td>
                            <td><?= rand(0,1)?"<i class=\"fa fa-close\"></i>":"<i class='fa fa-check'></i>" ?></td>
                            <td><?= rand(0,1)?"<i class=\"fa fa-close\"></i>":"<i class='fa fa-check'></i>" ?></td>
                            <td><?= rand(0,1)?"<i class=\"fa fa-close\"></i>":"<i class='fa fa-check'></i>" ?></td>
                            <td><?= rand(0,1)?"<i class=\"fa fa-close\"></i>":"<i class='fa fa-check'></i>" ?></td>
                            <td><?= rand(0,1)?"<i class=\"fa fa-close\"></i>":"<i class='fa fa-check'></i>" ?></td>
                            <td><?= rand(0,1)?"<i class=\"fa fa-close\"></i>":"<i class='fa fa-check'></i>" ?></td>
                            <td><?= rand(0,1)?"<i class=\"fa fa-close\"></i>":"<i class='fa fa-check'></i>" ?></td>
                            <td><?= rand(0,1)?"<i class=\"fa fa-close\"></i>":"<i class='fa fa-check'></i>" ?></td>
                            <td><?= rand(0,1)?"<i class=\"fa fa-close\"></i>":"<i class='fa fa-check'></i>" ?></td>
                            <td><?= rand(2,10)?></td>
                            <td><?= rand(1,10)*10 ?></td>
                            <td><?= rand(2,10)?></td>
                            <td><?= rand(1,10)*10 ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td>做对学生数#</td>
                        <td><?= rand(2,8)?></td>
                        <td><?= rand(2,8)?></td>
                        <td><?= rand(2,8)?></td>
                        <td><?= rand(2,8)?></td>
                        <td><?= rand(2,8)?></td>
                        <td><?= rand(2,8)?></td>
                        <td><?= rand(2,8)?></td>
                        <td><?= rand(2,8)?></td>
                        <td><?= rand(2,8)?></td>
                        <td><?= rand(2,8)?></td>
                    </tr>
                    <tr>
                        <td>做对学生百分率</td>
                        <td><?= rand(2,8)*10?></td>
                        <td><?= rand(2,8)*10?></td>
                        <td><?= rand(2,8)*10?></td>
                        <td><?= rand(2,8)*10?></td>
                        <td><?= rand(2,8)*10?></td>
                        <td><?= rand(2,8)*10?></td>
                        <td><?= rand(2,8)*10?></td>
                        <td><?= rand(2,8)*10?></td>
                        <td><?= rand(2,8)*10?></td>
                        <td><?= rand(2,8)*10?></td>
                    </tr>
                    <tr>
                        <td>目标掌握百分率</td>
                        <td colspan="2"><?= rand(2,8)*10?></td>
                        <td colspan="2"><?= rand(2,8)*10?></td>
                        <td colspan="3"><?= rand(2,8)*10?></td>
                        <td colspan="3"><?= rand(2,8)*10?></td>
                    </tr>
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>