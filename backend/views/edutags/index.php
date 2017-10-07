<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\tree\TreeView;
use backend\models\EduTags;
use kartik\tree\TreeViewInput;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EdutagsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '题目标签管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-tags-index">
<?php 

echo TreeView::widget([
    // single query fetch to render the tree
    // use the Product model you have in the previous step
    'query' => EduTags::find()->addOrderBy('root, lft'), 
    'headingOptions' => ['label' => '题目标签管理器'],
    'fontAwesome' => true,     // optional
    'iconEditSettings'=> [
        'show' => 'list',
        'listData' => [
            'tag' => '标签',
            'tags' => '标签类'
            // 'flag-o' => '政策',
            // 'bullhorn' => '公告',
            // 'mortar-board' => '专业知识',
            // 'file-text-o' => '笔记',
            // 'users' => '人员信息'
        ]
    ],
    'isAdmin' => false,         // optional (toggle to enable admin mode)
    'displayValue' => 1,        // initial display value
    'softDelete' => true,       // defaults to true
    'cacheSettings' => [        
        'enableCache' => true   // defaults to true
    ]
]);


?>
</div>
