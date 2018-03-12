<?php
use yii\helpers\Html;
$this->title = $model->paper_name.'(测试报告)';
?>
<div class="row">
<div class="pad margin no-print">
    <div class="callout callout-default" style="margin-bottom: 0!important;border: 1px solid black;">
        <h4><i class="fa fa-calendar"></i> 日期: <?= date('Y-m-d',time()) ?></h4>
        <span style="margin-right: 20px;">班级: <?= $model->room->class->class_name ?></span>
        <span style="margin-right: 20px;">课堂: <?= $model->room->room_name ?></span>
        <span style="margin-right: 20px;color: #408080">测试名称: <b><?= $model->paper_name ?></b></span>
    </div>

    <div class="callout callout-success" style="margin-bottom: 0!important;margin-top: 5px;font-size: 18px;">
        <h4><i class="fa fa-info"></i> 测试基本信息</h4>
        <p>试卷总成绩: <?= '50分'?></p>
        <p>平均成绩: 前测:<?= '13.5' ?></p>
        <p>后测: 40.2</p>
        <p>平均用时: 前测: 10分16秒</p>
        <p>后测: 13分16秒</p>
        <p>试卷难度: 0.79</p>
    </div>

    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">试题情况统计表</h3>
                <p>1.前测</p>
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
                        <th>3</th>
                        <th>2</th>
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
                    <?php
                    $stuarr = ['赵思雯','赵翔','周春宇','朱明宣','朱育璇','潘丙坤','李芃龙','刘博','高羽欣','尹博'];
                        ?>
                        <tr>
                            <td><?php echo Html::a('赵思雯', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('赵思雯')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td>4</td>
                            <td>40</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td><?php echo Html::a('赵翔', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('赵翔')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>2</td>
                            <td>20</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('周春宇', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('周春宇')); ?></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td>2</td>
                            <td>20</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('朱明宣', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('朱明宣')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td>3</td>
                            <td>30</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('朱育璇', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('朱育璇')); ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td>3</td>
                            <td>30</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('潘丙坤', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('潘丙坤')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>3</td>
                            <td>30</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('李芃龙', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('李芃龙')); ?></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>4</td>
                            <td>40</td>
                            <td>1</td>
                            <td>25</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('刘博', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('刘博')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td>4</td>
                            <td>40</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('高羽欣', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('高羽欣')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>3</td>
                            <td>30</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('尹博', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('尹博')); ?></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td>3</td>
                            <td>30</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    <tr>
                        <td>做对学生数#</td>
                        <td>6</td>
                        <td>3</td>
                        <td>5</td>
                        <td>2</td>
                        <td>4</td>
                        <td>2</td>
                        <td>4</td>
                        <td>4</td>
                        <td>2</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>做对学生百分率</td>
                        <td>60</td>
                        <td>30</td>
                        <td>50</td>
                        <td>20</td>
                        <td>40</td>
                        <td>20</td>
                        <td>40</td>
                        <td>40</td>
                        <td>20</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>目标掌握百分率</td>
                        <td colspan="2">0</td>
                        <td colspan="2">10</td>
                        <td colspan="3">0</td>
                        <td colspan="3">0</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br/>
            <br/>
            <br/>
            <p>2.后测</p>
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
                        <th>3</th>
                        <th>2</th>
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
                    <?php
                    $stuarr = ['赵思雯','赵翔','周春宇','朱明宣','朱育璇','潘丙坤','李芃龙','刘博','高羽欣','尹博'];
                        ?>
                        <tr>
                            <td><?php echo Html::a('赵思雯', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('赵思雯')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td>9</td>
                            <td>100</td>
                            <td>4</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td><?php echo Html::a('赵翔', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('赵翔')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td>5</td>
                            <td>50</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('周春宇', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('周春宇')); ?></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td>6</td>
                            <td>60</td>
                            <td>1</td>
                            <td>25</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('朱明宣', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('朱明宣')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td>6</td>
                            <td>60</td>
                            <td>1</td>
                            <td>25</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('朱育璇', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('朱育璇')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td>8</td>
                            <td>80</td>
                            <td>2</td>
                            <td>50</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('潘丙坤', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('潘丙坤')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td>8</td>
                            <td>80</td>
                            <td>3</td>
                            <td>75</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('李芃龙', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('李芃龙')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td>9</td>
                            <td>90</td>
                            <td>4</td>
                            <td>100</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('刘博', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('刘博')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td>8</td>
                            <td>80</td>
                            <td>3</td>
                            <td>75</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('高羽欣', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('高羽欣')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td>7</td>
                            <td>70</td>
                            <td>1</td>
                            <td>25</td>
                        </tr>

                        <tr>
                            <td><?php echo Html::a('尹博', '/index.php?r=edupaper%2Fsturep&name=' . base64_encode('尹博')); ?></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td></td>
                            <td><i class='fa fa-check'></i></td>
                            <td><i class='fa fa-check'></i></td>
                            <td>3</td>
                            <td>30</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    <tr>
                        <td>做对学生数#</td>
                        <td>9</td>
                        <td>7</td>
                        <td>9</td>
                        <td>8</td>
                        <td>10</td>
                        <td>5</td>
                        <td>7</td>
                        <td>7</td>
                        <td>9</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>做对学生百分率</td>
                        <td>90</td>
                        <td>70</td>
                        <td>90</td>
                        <td>80</td>
                        <td>100</td>
                        <td>50</td>
                        <td>70</td>
                        <td>70</td>
                        <td>90</td>
                        <td>80</td>
                    </tr>
                    <tr>
                        <td>目标掌握百分率</td>
                        <td colspan="2">60</td>
                        <td colspan="2">70</td>
                        <td colspan="3">60</td>
                        <td colspan="3">40</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="row">
                <div class="col-md-6" style="text-align: center;">
                    <h3>前测后测成绩图表</h3>
                    <img src="/uploads/class.png">
                </div>

                <div class="col-md-6" style="text-align: center;">
                    <h3>前测/后测成绩图</h3>
                    <img src="/uploads/updown.png">
                </div>
            </div>

            <div class="row" style="margin-top: 10px;">
                <div class="col-md-12" style="text-align: center;">
                    <h3>使用了教学分析结构的前测/后测成绩比较图</h3>
                    <img width="400" src="/uploads/ana.png">
                </div>
            </div>
        </div>

        <!-- /.box -->

    </div>
</div>
</div>