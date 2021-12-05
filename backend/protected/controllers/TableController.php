<?php

class TableController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	protected function renderJSON($data)
	{
	    header('Content-type: application/json; charset=utf-8');
	    echo CJSON::encode($data);

	    foreach (Yii::app()->log->routes as $route) {
	        if($route instanceof CWebLogRoute) {
	            $route->enabled = false; // disable any weblogroutes
	        }
	    }
	    Yii::app()->end();
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','checktable'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TABLE;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TABLE']))
		{
			$model->attributes=$_POST['TABLE'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TABLE']))
		{
			$model->attributes=$_POST['TABLE'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TABLE');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionchecktable(){
		$uuid = $_GET['uuid'];
		/*$criteria = new CDbCriteria();
 		$criteria->condition = 'uuid = :uuid';
 		$criteria->params = array(':uuid' => $uuid);
		$model = TABLE::model()->findAll($criteria);*/
		$TableInfo = Yii::app()->db->createCommand()
   		 ->select('d.uuid, a.TableNo, b.Status, b.OrderNo, b.NumberOfSeat, b.CreatedOn, b.LastOrder, b.ExpiredOn, b.Type, c.ChiName as "TypeName"')
    	->from('tbl_TABLE a')
    	->leftJoin('tbl_TABLESTATUS b', 'b.TableID = a.TableNo')
    	->leftJoin('tbl_TYPE c', 'c.id = b.Type')
    	->leftJoin('tbl_DEVICE d', 'd.id = a.DeviceID')
    	->where('d.uuid=:uuid and b.Status = 1 and b.id in (select max(id) from tbl_TABLESTATUS) and (select a.TableNo from tbl_TABLE a left outer join tbl_DEVICE b on b.id = a.DeviceID where b.uuid = :uuid)', array(':uuid'=>$uuid))
    	->queryRow();
    	$order = Yii::app()->db->createCommand()
   		 ->select('count(*) as "NoOfOrder"')
    	->from('tbl_ORDER b')
    	->leftJoin('tbl_TABLE a', 'a.TableNo = b.TableNo')
    	->where('b.updatetime >= (select max(CreatedOn) from tbl_TABLESTATUS) and a.uuid = :uuid', array(':uuid'=>$uuid))
    	->queryRow();
		if($checkdevice===0){
			$this->renderJSON('4');
		}else{
		if(CheckDevice::CheckDevices($uuid) != null){
		if($TableInfo[2] == 1){
		$this->renderJSON(array('TableInfo'=>$TableInfo, 'Order'=>$order));
		//$model=TABLE::model()->findAll($id);
		}else{
			$this->renderJSON('3');
		}
		}else{
			$this->renderJSON('2');
		}
		}
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TABLE('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TABLE']))
			$model->attributes=$_GET['TABLE'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TABLE the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TABLE::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TABLE $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='table-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
