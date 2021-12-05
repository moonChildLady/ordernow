<?php

class FoodController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
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
public function actionRemoveImg($id, $image) {
		$model=$this->loadModel($id);
		$image = $model->Images;
		$model->save();

		//unlink(Yii::getPathOfAlias('webroot').'/images/hotel/thumbnail/'.$image);
		unlink(Yii::getPathOfAlias('webroot').'/images/'.$image);
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new FOOD;
		//$price = new PRICE;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FOOD']))
		{
			$model->attributes=$_POST['FOOD'];
			$images = CUploadedFile::getInstancesByName('Images');
			if (isset($images) && count($images) > 0) {
				//foreach ($images as $image => $pic) {
				     $uni_name = uniqid().".".$images->extensionName;
					 $images->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$uni_name);
						 //$this->toThumbnail($uni_name);
						 //$imgArr[] = $uni_name;
				
				//}
				$model->Images = $images;
			}
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('admin'));
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
		$price = new PRICE;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FOOD']))
		{
			$model->attributes=$_POST['FOOD'];
			if (isset($_POST['PRICE']))
            {

                //$price->Price = $_POST['PRICE']['Price'];
				$price->attributes = $_POST['PRICE'];
            }

			if($model->save() && $model->saveWithRelated(array('pRICEs' => array('append' => true))))
			//if($model->save() && $model->saveRelated( array('pRICEs')))
				//$this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('admin'));
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
		$dataProvider=new CActiveDataProvider('FOOD');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FOOD('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FOOD']))
			$model->attributes=$_GET['FOOD'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return FOOD the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=FOOD::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param FOOD $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='food-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
