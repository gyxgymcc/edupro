<?php
use backend\models\EduStudent;

$userId = Yii::$app->user->getId();
$studentModel = new EduStudent();
$userInfo = $studentModel->findOne(['relate_user' => $userId]);
$username = $userInfo['student_name'];
?>
<div class="">
   <div class="clearfix"></div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
               <h2>个人<small>资料</small></h2>
               <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
               </ul>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                  <div class="profile_img">
                     <div id="crop-avatar">
                        <!-- Current avatar -->
                        <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
                     </div>
                  </div>
                  <h3><?php echo $username;?></h3>
                  <ul class="list-unstyled user_data">
                     <li><i class="fa fa-envelope user-profile-icon"></i> <?=$userInfo['email']?></li>
                     <li>
                        <i class="fa fa-briefcase user-profile-icon"></i> 学生
                     </li>
                     <!-- <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i>
                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                     </li> -->
                  </ul>
                  <!-- <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>修改个人资料</a> -->
                  <br>
                  <!-- start skills -->
                  <h4>加入班级</h4>
                  <ul class="list-unstyled user_data">
                    <?php
                      foreach ($classes as $key => $value) {
                        ?>
                        <li>
                            <p><?=$value->class_name?></p>
                            <div class="progress progress_sm">
                               <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?=rand(50,50)?>" aria-valuenow="50" style="width: 50%;"></div>
                            </div>
                         </li>
                        <?php
                      }
                    ?>
                  </ul>
                  <!-- end of skills -->
               </div>
               <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="profile_title">
                     <div class="col-md-6">
                        <h2>考试记录</h2>
                     </div>
                     <div class="col-md-6">
                     </div>
                  </div>
                  <!-- start of user-activity-graph -->
                  <!-- end of user-activity-graph -->
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                     <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">最近考试</a></li>
                        <!-- <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a></li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a></li> -->
                     </ul>
                     <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                           <!-- start recent activity -->
                           <ul class="messages">
                              <?php
                                 foreach ($checks as $key => $value) {
                                    ?>

                                    <li>
                                       <i class="fa fa-file-text" style="font-size: 25px;" class="avatar" alt="Avatar" aria-hidden="true"></i>
                                       <div class="message_date">
                                          <h3 class="date text-info"><?php echo date('d',strtotime($value['exam_time'])); ?></h3>
                                          <p class="month"><?php echo intval(date('m',strtotime($value['exam_time']))).'月'; ?></p>
                                       </div>
                                       <div class="message_wrapper">
                                          <h4 class="heading"><?php echo $value->paper->paper_name;?></h4>
                                          <blockquote class="message">
                                             <span class="label label-primary">课堂: <?php echo $value->paper->room->room_name;?></span>
                                             <span class="label label-info">班级: <?php echo $value->paper->room->class->class_name;?></span>
                                             <?php
                                                if($value['is_check'] == 0){
                                                   ?>
                                                      <span class="label label-danger">未批阅</span>
                                                   <?php
                                                }
                                                else{
                                                   ?>
                                                      <span class="label label-success">已批阅</span>
                                                      <a href="<?php echo '/index.php?r=studentpaper%2Fscore&paperid='.$value['id'];?>" style="float: right;" type="button" class="btn btn-success btn-sm">查看成绩</a>
                                                      <a href="<?php echo '/index.php?r=studentpaper%2Fpret&';?>" style="float: right;" type="button" class="btn btn-info btn-sm">反馈报告</a>
                                                   <?php
                                                }
                                             ?>
                                          </blockquote>
                                          <br>
                                          <p class="url">
                                             <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                             <a href=""><i class="fa fa-address-book-o"></i>监考教师: <?php echo $value->teacher->teacher_name;?></a>
                                          </p>

                                       </div>
                                    </li>
                                    <?php
                                 }

                              ?>
                           </ul>
                           <!-- end recent activity -->
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                           <!-- start user projects -->
                           <table class="data table table-striped no-margin">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Client Company</th>
                                    <th class="hidden-phone">Hours Spent</th>
                                    <th>Contribution</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>1</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">18</td>
                                    <td class="vertical-align-mid">
                                       <div class="progress">
                                          <div class="progress-bar progress-bar-success" data-transitiongoal="35" aria-valuenow="35" style="width: 35%;"></div>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>2</td>
                                    <td>New Partner Contracts Consultanci</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">13</td>
                                    <td class="vertical-align-mid">
                                       <div class="progress">
                                          <div class="progress-bar progress-bar-danger" data-transitiongoal="15" aria-valuenow="15" style="width: 15%;"></div>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>3</td>
                                    <td>Partners and Inverstors report</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">30</td>
                                    <td class="vertical-align-mid">
                                       <div class="progress">
                                          <div class="progress-bar progress-bar-success" data-transitiongoal="45" aria-valuenow="45" style="width: 45%;"></div>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>4</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="hidden-phone">28</td>
                                    <td class="vertical-align-mid">
                                       <div class="progress">
                                          <div class="progress-bar progress-bar-success" data-transitiongoal="75" aria-valuenow="75" style="width: 75%;"></div>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <!-- end user projects -->
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                           <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                              photo booth letterpress, commodo enim craft beer mlkshk 
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>