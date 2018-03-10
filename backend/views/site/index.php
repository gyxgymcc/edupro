<?php
use yii\helpers\Html;
use kartik\checkbox\CheckboxX;
/* @var $this yii\web\View */

$this->title = '教育平台后台管理';

?>
<div class="site-index">
    <div class="row">
        <div class="col-md-6">

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">试卷报告</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>试卷名</th>
                                <th>班级</th>
                                <th>答题人数</th>
                                <th>试卷报告</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($papers as $key => $val) {
                                ?>
                                <tr>
                                    <td><?= $val->paper_name ?></td>
                                    <td><span class="label label-info"><?= $val->room->class->class_name ?></span></td>
                                    <td><?= 10 ?>人答题</td>
                                    <td><?= count($val->answers)?Html::a('<i class="glyphicon glyphicon-list-alt"></i>', ['edupaper/report','id' => $val->id], ['class' => 'btn btn-success']):''?></td>
                                </tr>
                            <?php
                            }
                            ?>


                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
<!--                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
<!--                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>-->
                </div>
                <!-- /.box-footer -->
            </div>

        </div>

        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">学科组长教师</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <?php
                            echo '<label class="cbx-label" for="s_1">三年级一班</label>';
                            echo CheckboxX::widget([
                                'name'=>'s_1',
                                'options'=>['id'=>'s_1'],
                                'pluginOptions'=>['threeState'=>false]
                            ]);
                            echo '<br/>';
                            echo '<br/>';
                            echo '<br/>';
                            echo '<label class="cbx-label" for="s_2">三年级二班</label>';
                            echo CheckboxX::widget([
                                'name'=>'s_2',
                                'options'=>['id'=>'s_2'],
                                'pluginOptions'=>['threeState'=>false]
                            ]);


                            echo '<br/>';
                            echo '<br/>';
                            echo '<br/>';
                            echo Html::a('查看报告', ['eduteacher/rep','id' => 0], ['class' => 'btn btn-default'])
                         ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
