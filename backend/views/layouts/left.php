<?php
use yii\helpers\Html;
use backend\models\EduTeacher;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= EduTeacher::selfavatar() ?>" class="img-circle" alt="User Image" width="100" height="100"/>
            </div>
            <div class="pull-left info">
                <p><?=\Yii::$app->user->identity->username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <!-- <input type="text" name="q" class="form-control" placeholder="搜索..."/> -->
              <!-- <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span> -->
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => '后台管理', 'options' => ['class' => 'header']],
                    ['label' => '教师管理', 'icon' => 'user', 'url' => ['/eduteacher'], 'visible' => (Yii::$app->user->identity->username == 'admin' ) ? true : false],
                    ['label' => '课堂管理', 'icon' => 'book', 'url' => ['/eduroom']],
                    ['label' => '班级管理', 'icon' => 'home', 'url' => ['/educlass']],
                    ['label' => '试卷管理', 'icon' => 'list-alt', 'url' => ['/edupaper']],
                    ['label' => '题目管理', 'icon' => 'list', 'url' => ['/edusubject']],
                    ['label' => '标签管理', 'icon' => 'tags', 'url' => ['/edutags']],
                    // ['label' => '学生管理','icon' => 'address-book-o', 'url' => ['/eduteacher/stulist']],
                    // ['label' => '家长管理','icon' => 'user-circle-o', 'url' => ['/eduteacher/jzlist']],
                    ['label' => '公告管理', 'icon' => 'microphone', 'url' => ['/eduannouncement']],
                    ['label' => '阅卷', 'icon' => 'microphone', 'url' => ['/eduanswercheck']],
                    // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Same tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],


                    
                ],
            ]
        ) ?>

    </section>

</aside>
