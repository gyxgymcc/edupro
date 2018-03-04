<?php
use yii\helpers\Html;
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
                                    <td><?= count($val->answers) ?>人答题</td>
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
    </div>
</div>
