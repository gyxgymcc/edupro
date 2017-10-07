<?php

namespace backend\controllers;

use Yii;
use backend\models\EduSubject;
use backend\models\EdusubjectSearch;
use yii\web\Controller;
use backend\models\EduPaper;
use backend\models\EduTeacher;
use backend\models\EduRoom;
use backend\models\EduTags;
use backend\models\EduSubtags;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\EduSelection;
use backend\models\Model;

/**
 * EdusubjectController implements the CRUD actions for EduSubject model.
 */
class EdusubjectController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EduSubject models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EdusubjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $paperModel = new EduPaper();
        if(!EduTeacher::isAdmin()){
            $uid = Yii::$app->user->identity->id;
            $teacherInfo = EduTeacher::findOne(['relate_user' => $uid]);
            $rooms = EduRoom::find()->select('id')->where(['relate_teacher' => $teacherInfo->id])->asArray()->all();
            $roomids = array_column($rooms,'id');
            $paper = $paperModel->find()->where(['in','relate_room',$roomids])->all();
        }
        else{
            $paper = $paperModel->find()->all();
        }

        $examType = Yii::$app->params['examType'];
        $examDif = Yii::$app->params['examDif'];
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'paper' => $paper,
            'examType' => $examType,
            'examDif' => $examDif,
        ]);
    }

    /**
     * Displays a single EduSubject model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   

        $model = $this->findModel($id);
        $paperModel = new EduPaper();
        $paper = $paperModel->findOne($model->relate_paper);
        $modelSelection = new EduSelection;
        $select = $modelSelection->find()->where(['relate_subject'=>$id])->all();
        $ansdatas = $modelSelection->find()->where(['relate_subject'=>$id,'iscorrect'=>1])->all();
        $num = count($select);
        $ansnum = count($ansdatas);
        $condata = '';
        $ansdata = '';
        for($i=0;$i<$num;$i++){
            $condata = $select[$i]['content'].','.$condata;
        };
        for ($a=0; $a < $ansnum; $a++) { 
            $ansdata = $ansdatas[$a]['content'].','.$ansdata;
        }
        $model->que_sec = $condata;//选择题候选答案
        if ($model->type==0 || $model->type==1) {
            $model->answer = $ansdata;//选择题正确答案
        }
        
        //$model->answer =

        $examType = Yii::$app->params['examType'];
        $examDif = Yii::$app->params['examDif'];
        return $this->render('view', [
            'model' => $model,
            'paper' => $paper,
            'examType' => $examType,
            'examDif' => $examDif,
        ]);
    }

    /**
     * Creates a new EduSubject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateunsel()
    {
        $requestdata = Yii::$app->request->get();
        $model = new EduSubject();
        $modelSelection = [new EduSelection];
        $tagModel = new EduTags();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $postData = Yii::$app->request->post();
            if(!empty($postData['EduTags']['id'])){
                foreach ($postData['EduTags']['id'] as $key => $st) {
                    $subtagModel = new EduSubtags();
                    $subtagModel->subid = $model->id;
                    $subtagModel->tagid = $st;
                    $subtagModel->save();
                }
            }
            return $this->redirect(['index']);
        } else {
            if(isset($requestdata['id'])){
                $id = $requestdata['id'];
            }else{
                $id = 0;
            };
            $paperModel = new EduPaper();

            if(!EduTeacher::isAdmin()){
                $uid = Yii::$app->user->identity->id;
                $teacherInfo = EduTeacher::findOne(['relate_user' => $uid]);
                $rooms = EduRoom::find()->select('id')->where(['relate_teacher' => $teacherInfo->id])->asArray()->all();
                $roomids = array_column($rooms,'id');
                
                $paper = $paperModel->find()->where(['in','relate_room',$roomids])->all();
            }
            else{
                $paper = $paperModel->find()->all();
            }

            $examType = Yii::$app->params['examType'];
            $examDif = Yii::$app->params['examDif'];

            $tags = EduTags::find()->where(['>','id',1])->asArray()->all();
            $finalTags = array();
            foreach ($tags as $key => $tg) {
                if($tg['lvl'] == 1){
                    $rootid = $tg['root'];
                    $r = array_filter($tags, function($t) use ($rootid) { return $t['id'] == $rootid; });
                    $rootname = current($r)['name'];
                    $finalTags[$rootname][$tg['id']] = $tg['name'];
                }
            }

            return $this->render('create', [
                'model' => $model,
                'paper' => $paper,
                'examType' => $examType,
                'examDif' => $examDif,
                'key' => $id,
                'tagModel' => $tagModel,
                'finalTags' => $finalTags,
                'modelSelection' => (empty($modelSelection)) ? [new EduSelection] : $modelSelection,
            ]);
        }
    }


    public function actionCreatesel(){
        $model = new EduSubject();
        $modelSelection = [new EduSelection];
        $paperModel = new EduPaper();
        //$paper = $paperModel->find()->all();
        $tagModel = new EduTags();

        if(!EduTeacher::isAdmin()){
            $uid = Yii::$app->user->identity->id;
            $teacherInfo = EduTeacher::findOne(['relate_user' => $uid]);
            $rooms = EduRoom::find()->select('id')->where(['relate_teacher' => $teacherInfo->id])->asArray()->all();
            $roomids = array_column($rooms,'id');
            
            $paper = $paperModel->find()->where(['in','relate_room',$roomids])->all();
        }
        else{
            $paper = $paperModel->find()->all();
        }

        $requestdata = Yii::$app->request->get();
        $examType = Yii::$app->params['examType'];
        $examDif = Yii::$app->params['examDif'];

        $model->type = 0;
        if($model->load(Yii::$app->request->post()))
        {
            $postData = Yii::$app->request->post();
            if(!empty($postData['EduTags']['id'])){
                foreach ($postData['EduTags']['id'] as $key => $st) {
                    $subtagModel = new EduSubtags();
                    $subtagModel->subid = $model->id;
                    $subtagModel->tagid = $st;
                    $subtagModel->save();
                }
            }

            $requestdata = Yii::$app->request->post();
            $selectdata = count($requestdata['EduSelection']);  
            $nums = 0;       
            for($i=0;$i<$selectdata;$i++){
                $numIsc = $requestdata['EduSelection'][$i]['iscorrect'];
                if($numIsc==1){
                    $nums = $nums+1;
                };
            };
            //echo $nums;
            if($nums==1){
                $model->type=0;
            }else{
                $model->type=1;
            };            
            // var_dump($_POST['EduSelection']);
            if ($model->save(false))  
            {  
                $selectionData = $requestdata['EduSelection'];
                foreach($selectionData as $sd)  
                {  
                    $modelSelection = new EduSelection();
                    $modelSelection['relate_subject'] = $model->id;
                    $modelSelection['content'] = $sd['content'];
                    $modelSelection['iscorrect'] = $sd['iscorrect'];
                     //$_model = clone $modelSelection; 
                     //$modelSelection->setAttributes($modelSelection);  
                    $modelSelection->save();  
                } 
            }

           return $this->redirect(['view', 'id' => $model->id]);
        }else{
            $tags = EduTags::find()->where(['>','id',1])->asArray()->all();
            $finalTags = array();
            foreach ($tags as $key => $tg) {
                if($tg['lvl'] == 1){
                    $rootid = $tg['root'];
                    $r = array_filter($tags, function($t) use ($rootid) { return $t['id'] == $rootid; });
                    $rootname = current($r)['name'];
                    $finalTags[$rootname][$tg['id']] = $tg['name'];
                }
            }

            if(isset($requestdata['papreid'])){
                $papreid = $requestdata['papreid'];
            }else{
                $papreid = 0;
            }
            return $this->render('create_sel', [
                'model' => $model,
                'paper' => $paper,
                'examType' => $examType,
                'examDif' => $examDif,
                'key' => $papreid,
                'tagModel' => $tagModel,
                'finalTags' => $finalTags,
                'modelSelection' => (empty($modelSelection)) ? [new EduSelection] : $modelSelection,
            ]);
        };
   
    }

    /**
     * Updates an existing EduSubject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdatesel($id)
    {
        $model = $this->findModel($id);
        $tagModel = new EduTags();
        $tagsPart1 = EduSubtags::find()->select('tagid')->where(['subid' => $id])->asArray()->all();
        $selectedtags = array();
        if(!empty($tagsPart1)){
            foreach ($tagsPart1 as $key => $tp1) {
                //$selectedtags[$key] = $tp1['tagid'];
                array_push($selectedtags, $tp1['tagid']);
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            EduSubtags::deleteAll(['subid' => $id]);
            $postData = Yii::$app->request->post();
            
            if(!empty($postData['EduTags']['id'])){
                foreach ($postData['EduTags']['id'] as $key => $st) {
                    $subtagModel = new EduSubtags();
                    $subtagModel->subid = $model->id;
                    $subtagModel->tagid = $st;
                    $subtagModel->save();
                }  
            }

            $selectionData = $postData['EduSelection'];
            $ids = array();
            foreach($selectionData as $sd => $value)  
            {  
                //array_push($ids, $value['id']);
                $modelSelection = EduSelection::findOne($value['id']);
                // var_dump($modelSelection);
                // exit();
                $modelSelection['relate_subject'] = $id;
                $modelSelection['content'] = $value['content'];
                $modelSelection['iscorrect'] = $value['iscorrect'];
                 //$_model = clone $modelSelection; 
                 //$modelSelection->setAttributes($modelSelection);  
                $modelSelection->save();
            }

            return $this->redirect(['index']);
        }
        else {
            $paperModel = new EduPaper();
            $paper = $paperModel->find()->all();    
            $examType = Yii::$app->params['examType'];
            $examDif = Yii::$app->params['examDif'];

            $modelSelection = EduSelection::find()->where(['relate_subject' => $id])->all();

            $tags = EduTags::find()->where(['>','id',1])->asArray()->all();
            $finalTags = array();
            foreach ($tags as $key => $tg) {
                if($tg['lvl'] == 1){
                    $rootid = $tg['root'];
                    $r = array_filter($tags, function($t) use ($rootid) { return $t['id'] == $rootid; });
                    $rootname = current($r)['name'];
                    $finalTags[$rootname][$tg['id']] = $tg['name'];
                }
            }

            // var_dump($selectedtags);
            // exit();
            $tagModel->id = $selectedtags;
            return $this->render('updatesel', [
                'model' => $model,
                'paper' => $paper,
                'examType' => $examType,
                'examDif' => $examDif,
                'finalTags' => $finalTags,
                'tagModel' => $tagModel,
                'key' => $model->relate_paper,
                'modelSelection' => (empty($modelSelection)) ? [new EduSelection] : $modelSelection,
            ]);
        }

    }



    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tagModel = new EduTags();
        $tagsPart1 = EduSubtags::find()->select('tagid')->where(['subid' => $id])->asArray()->all();
        $selectedtags = array();
        if(!empty($tagsPart1)){
            foreach ($tagsPart1 as $key => $tp1) {
                //$selectedtags[$key] = $tp1['tagid'];
                array_push($selectedtags, $tp1['tagid']);
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            EduSubtags::deleteAll(['subid' => $id]);
            $postData = Yii::$app->request->post();
            
            if(!empty($postData['EduTags']['id'])){
                foreach ($postData['EduTags']['id'] as $key => $st) {
                    $subtagModel = new EduSubtags();
                    $subtagModel->subid = $model->id;
                    $subtagModel->tagid = $st;
                    $subtagModel->save();
                }  
            }
            return $this->redirect(['index']);
        } else {
            $paperModel = new EduPaper();
            $paper = $paperModel->find()->all();    
            $examType = Yii::$app->params['examType'];
            $examDif = Yii::$app->params['examDif'];

            $tags = EduTags::find()->where(['>','id',1])->asArray()->all();
            $finalTags = array();
            foreach ($tags as $key => $tg) {
                if($tg['lvl'] == 1){
                    $rootid = $tg['root'];
                    $r = array_filter($tags, function($t) use ($rootid) { return $t['id'] == $rootid; });
                    $rootname = current($r)['name'];
                    $finalTags[$rootname][$tg['id']] = $tg['name'];
                }
            }

            // var_dump($selectedtags);
            // exit();
            $tagModel->id = $selectedtags;
            return $this->render('update', [
                'model' => $model,
                'paper' => $paper,
                'examType' => $examType,
                'examDif' => $examDif,
                'finalTags' => $finalTags,
                'tagModel' => $tagModel,
                'key' => $model->relate_paper
            ]);
        }
    }

    /**
     * Deletes an existing EduSubject model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EduSubject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EduSubject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EduSubject::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
