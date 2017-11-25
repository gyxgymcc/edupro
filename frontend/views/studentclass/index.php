<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use kartik\widgets\InputWidget;
use kartik\widgets\SwitchInput;

$this->title = '班级';

$js = '

  function reloadbox(e){
    //$.pjax.reload({container:"#w2"});
    // $.ajax({
    //         type: \'POST\',
    //         url : \'index.php?r=site/barpjax\',
    //         data : {y: e.date},
    //         success : function(result) {
    //           console.log(result);
    //           window.location.href="index.php?r=site&y="+e.date;
    //             //$.pjax.reload({container:"#w1"});
    //         }
    //     });
    console.log(e);
    var r = confirm("是否申请加入此班?");
    if(r == true){
      $.ajax({
          type: \'POST\',
          url : \'index.php?r=studentclass/in\',
          data : {class_id:e},
          success : function(res) {
            krajeeDialog.alert(res);
            //console.log(res);
          }
      });
      //alert(timestr);
    }
    else{

    }
  }
';

$this->registerJs($js,\yii\web\View::POS_READY);

?>
<div class="row" style="margin-bottom: 30px;">
  <h3>选择班级以加入</h3>
  <div class="col-md-3">
    <?php
      echo Select2::widget([
        'model' => $searchModel,
        'attribute' => 'id',
        'hideSearch' => false,
        'data' => ArrayHelper::map($classes, 'id', 'class_name'),
        'options' => [
            'placeholder' => '选择班级',
        ],
        'pluginOptions' => [
            'allowClear' => false,
        ],
        'pluginEvents' => [
          'change' => 
            "function(e){
              var data_id = $(this).val();
              reloadbox(data_id);
            }",
        ],
      ]);
    ?>
  </div>
</div>
<div class="row">
  <h4>已加入班级</h4>
  <div class="col-md-8">
    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            //'pjax' => true,
            'columns' => [
              ['class' => 'yii\grid\SerialColumn'],
              [
                'label' => '学生姓名',
                'value' => 'student.student_name',
              ],
              [
                'label' => '班级名称',
                'value' => 'class.class_name',
              ],
              [
                'label' => '入学时间',
                'value' => 'in_time',
              ],
              [
                'label' => '是否毕业',
                'value' => function(){
                  return '未毕业';
                },
              ],
              [
                'label' => '任课老师',
                'value' => 'class.teacher.teacher_name',
              ],
            ],
        ]
    );
    ?>
  </div>
</div>