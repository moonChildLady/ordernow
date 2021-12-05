<?php

class DeviceController extends Controller
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
	public function CheckDevice()
	{
		$criteria = new CDbCriteria();
 		$criteria->condition = 'Enable = :Enable';
 		$criteria->params = array(':Enable' => 1);
		$checkdevice = DEVICE::model()->count($criteria);
		//$checkdevice = $checkdevice + 1;
		return $checkdevice;
	}
	public function CheckLicense()
	{
		$criteria = new CDbCriteria();
 		$criteria->select = 'sum(Number) as totalcal';
		$checklicense = LICENSE::model()->find($criteria);
		return $checklicense->totalcal;
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
				'actions'=>array('index','view','uuid', 'regdevice','checktable'),
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
		$model=new DEVICE;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DEVICE']))
		{
			$model->attributes=$_POST['DEVICE'];
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

		if(isset($_POST['DEVICE']))
		{
			$model->attributes=$_POST['DEVICE'];
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
		$dataProvider=new CActiveDataProvider('DEVICE');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	public function actionuuid($uuid)
	{
		$checkdevice = DEVICE::model()->find(array(
						'select'=>'uuid, Enable, kitchenType, deviceType',
						'condition'=>'uuid=:uuid',
						'params'=>array(':uuid'=>$uuid))
		);
		if($checkdevice===null){
			$message = "0"; //no this device
		}else{
			if($checkdevice->Enable == 1){
				if($checkdevice->deviceType == 2){
					$message = "3";
				}elseif($checkdevice->deviceType == 99){
					$message = "99";
				}else{
				$message = "1"; //device OK
			}
			}else{
				$message = "2"; //NOT enable
			}
		}
		/*$this->render('checkdevice',array(
			'message'=>renderJSON($message)
		));*/
		$this->renderJSON($message);
		/*$dataProvider=new CActiveDataProvider('DEVICE');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
	}
	public function actionRegDevice(){
		//if(Yii::app()->request->isPostRequest){
		
		$uuid = $_POST['uuid'];
		$deviceType = $_POST['device_type'];
		$kitchen_type = $_POST['kitchen_type'];
		$command = Yii::app()->db->createCommand();
		//$this->renderJSON($this->CheckDevice());
		if($this->CheckLicense() > $this->CheckDevice()){
			$checkdevice = DEVICE::model()->count(array(
						'select'=>'uuid',
						'condition'=>'uuid=:uuid',
						'params'=>array(':uuid'=>$uuid))
			);
			if($checkdevice===0){
				$this->renderJSON("2");//already registered
			}else{
				$model = new DEVICE;
				$command->reset();
				$result=$command->insert('tbl_DEVICE',
				array(
				'uuid'=>$uuid,
				'deviceType'=>$deviceType,
				'Addon'=>date('Y-m-d H:i:s'),
				'kitchenType'=>$kitchen_type,
				));

				$lastID = Yii::app()->db->getLastInsertID();
				if($deviceType == 1){ //customer use
					$command->reset();
					$result=$command->insert('tbl_TABLE',
					array(
					'TableNo'=>$_POST['tableno'],
					'DeviceID'=>$lastID,
					));
					}
				if($deviceType == 1){ //customer use
					$command->reset();
					$result=$command->insert('tbl_TABLELOG',
					array(
					'TableNo'=>$_POST['tableno'],
					//'DeviceID'=>$lastID,
					));
					}
				$this->renderJSON("1_".$deviceType); //register OK
			}
		}else{
			$this->renderJSON("3");
		}
	//}else{
	//	$this->renderJSON("3");
	//}
	}
	public function actionCheckTable(){
		//if($this->CheckLicense() > $this->CheckDevice()){
		$uuid = $_GET['uuid'];
		$criteria = new CDbCriteria();
		$criteria->select = array('id', 'uuid');
 		$criteria->condition = 'uuid = :uuid';
 		$criteria->params = array(':uuid' => $uuid);
		$check = DEVICE::model()->findAll($criteria);
		//$count = DEVICE::model()->count($criteria);
		/*$rows = array();
		foreach($check as $i=>$checkinfo){
			$rows[$i]=$checkinfo->attributes;
			$rows[$i]['uuid']=$checkinfo->uuid;
		}*/
		$this->renderJSON(array('check'=>$check));
		//$this->renderJSON($count);
		//}
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DEVICE('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DEVICE']))
			$model->attributes=$_GET['DEVICE'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DEVICE the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DEVICE::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DEVICE $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='device-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
