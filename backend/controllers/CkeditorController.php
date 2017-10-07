<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class CkeditorController extends Controller
{
    public function actionUpload()
    {
        //return $this->render('index');
        //$requestArr = Yii::$app->request->all();
    	$CKEditorFuncNum = \Yii::$app->getRequest()->getQueryParam('CKEditorFuncNum');

        $requestArr = $_FILES;
        $path = 'uploads/'. date('Y_m_d');
        FileHelper::createDirectory($path);
        $type = explode('.',$requestArr['upload']['name']);
        $imgname = Yii::$app->getSecurity()->generateRandomString(12).'.'.$type[count($type)-1];
        if(move_uploaded_file($requestArr['upload']['tmp_name'],$path.'/'.$imgname)){
            $url = 'http://'.$_SERVER['HTTP_HOST'].'/'.$path.'/'.$imgname;
            $message = '图片上传成功';
            echo "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
        }
        else{
            $url = '';
            $message = '图片上传失败';
            echo "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
        }
    }

    public function actionFormupload()
    {
        $CKEditorFuncNum = \Yii::$app->getRequest()->getQueryParam('CKEditorFuncNum');

        $requestArr = $_FILES;
        if(!empty($requestArr)){
            $controllerName = array_keys($requestArr)[0];
            $path = 'uploads/company';
            FileHelper::createDirectory($path);
            $formName = array_keys($requestArr[$controllerName]['name'])[0];
            $typeArr = explode('.',$requestArr[$controllerName]['name'][$formName]);
            $type = $typeArr[count($typeArr)-1];

            $genestr = Yii::$app->getSecurity()->generateRandomString(12);
            $imgname = $genestr.'.'.$type;
            if(move_uploaded_file($requestArr[$controllerName]['tmp_name'][$formName],$path.'/'.$imgname)){
                // $url = 'http://'.$_SERVER['HTTP_HOST'].'/'.$path.'/'.$imgname;
                // $url2 = 'http://'.$_SERVER['HTTP_HOST'].'/'.$path.'/'.$genestr;
                $url = $path.'/'.$imgname;
                //$message = '图片上传成功';
                $message = '图片上传成功';
                //echo "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
                //return $url;
                //echo $url;
                $p1[0] = $url;
                $p2[0] = ['caption' => $imgname, 'size' => $requestArr[$controllerName]['size'][$formName], 'width' => '120px', 'url' => '', 'key' => $genestr];
                echo json_encode([
                    'initialPreview' => $p1,
                    'initialPreviewConfig' => $p2,
                    'append' => false
                ]);
            }
        }
        
        //$path = 'uploads/company/'. date('Y_m_d');
        //FileHelper::createDirectory($path);
        //var_dump($requestArr);
        //echo $imgname;
    }
}
