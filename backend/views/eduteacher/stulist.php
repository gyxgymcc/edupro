<?php
use yii\helpers\Html;
$this->title = '学生管理';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">学生管理</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>学生姓名</th>
                        <th>家长名字</th>
                        <th>学生账号</th>
                        <th>密码</th>
                        <th>所在班级</th>
                    </tr>
                    <?php
                    $stuarr = ['赵思雯','赵翔','周春宇','朱明宣','朱育璇','潘丙坤','李芃龙','刘博','高羽欣','尹博'];
                    $jzarr = ['周满桂','周振喜','薛慧娟','刘雁','庸东明','盛茂昕','孙金明','王静','吴晓宁','周健','周介林'];
                    for($i = 0;$i < 10;$i++){
                        ?>
                        <tr>
                            <td><?php echo Html::a($stuarr[$i], '/index.php?r=edupaper%2Fsturep&name=' . base64_encode($stuarr[$i])); ?></td>
                            <td><?= $jzarr[$i] ?></td>
                            <td><?= time()-rand(4000,10000) ?></td>
                            <td><?= Yii::$app->getSecurity()->generateRandomString(6) ?></td>
                            <td><?= '三年级一班' ?></td>
              
                        </tr>
                    <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>