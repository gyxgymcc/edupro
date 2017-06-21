<?php

namespace backend\controllers;

use Yii;
use backend\models\EduSubject;
use backend\models\EdusubjectSearch;
use yii\web\Controller;
use backend\models\EduPaper;
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
        $paper = $paperModel->find()->all();    
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

        if(isset($requestdata['id'])){
            $paperModel = new EduPaper();
            $paper = $paperModel->find()->all();    
            $examType = Yii::$app->params['examType'];
            $examDif = Yii::$app->params['examDif'];
            return $this->render('create', [
                'model' => $model,
                'paper' => $paper,
                'examType' => $examType,
                'examDif' => $examDif,
                'key' => $requestdata['id'],
            ]);
        }
        

        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $paperModel = new EduPaper();
            $paper = $paperModel->find()->all();    
            $examType = Yii::$app->params['examType'];
            $examDif = Yii::$app->params['examDif'];
            return $this->render('create', [
                'model' => $model,
                'paper' => $paper,
                'examType' => $examType,
                'examDif' => $examDif,
                'key' => 0,
                'modelSelection' => (empty($modelSelection)) ? [new EduSelection] : $modelSelection,
            ]);
        }
    }


    public function actionCreatesel(){
        $model = new EduSubject();
        $modelSelection = [new EduSelection];
        $paperModel = new EduPaper();
        $paper = $paperModel->find()->all();
        $examType = Yii::$app->params['examType'];
        $examDif = Yii::$app->params['examDif'];


        if($model->load(Yii::$app->request->post()))
        {
            $requestdata = Yii::$app->request->post();
            $aaa = count($requestdata['EduSelection']);  
            $nums = 0;       
            for($i=0;$i<$aaa;$i++){
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

            
            // if ($model->save(false))  
            // {  
            //     $modelSelection = $requestdata['EduSelection'];
            //     foreach($modelSelection as $modelSelection)  
            //     {  
            //         $modelSelection['relate_subject'] = $model->id;
            //          //$_model = clone $modelSelection;  
            //          $modelSelection->setAttributes($modelSelection);  
            //          $modelSelection->save();  
            //     } 
            // }  
            $model->save(false);
               

               
            // var_dump($model->id);
            // var_dump($modelSelection);
            
            for ($e=0; $e < $aaa; $e++) { 
                $modelSelection = $requestdata['EduSelection'][$e];
                //var_dump($modelSelection);
                $modelSelection->relate_subject = $model->id;
             $modelSelection->save();
                //echo $e;
            }
            
            
             
             die;         
         //$model->save();
           return $this->redirect(['view', 'id' => $model->id]);
        }else{
            return $this->render('create_sel', [
                'model' => $model,
                'paper' => $paper,
                'examType' => $examType,
                'examDif' => $examDif,
                'key' => 0,
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $paperModel = new EduPaper();
            $paper = $paperModel->find()->all();    
            $examType = Yii::$app->params['examType'];
            $examDif = Yii::$app->params['examDif'];
            return $this->render('update', [
                'model' => $model,
                'paper' => $paper,
                'examType' => $examType,
                'examDif' => $examDif,

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
