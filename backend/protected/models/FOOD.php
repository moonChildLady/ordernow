<?php

/**
 * This is the model class for table "tbl_FOOD".
 *
 * The followings are the available columns in table 'tbl_FOOD':
 * @property integer $id
 * @property string $EnglishName
 * @property string $ChiName
 * @property string $Description
 * @property string $Images
 * @property integer $Calorie
 * @property integer $CatID
 * @property integer $Source
 * @property string $updatetime
 * @property string $MessageID
 *
 * The followings are the available model relations:
 * @property FOODMESSAGE $message
 * @property CAT $cat
 * @property SOURCE $source
 * @property FOODCAT[] $fOODCATs
 * @property ORDER[] $oRDERs
 * @property PRICE[] $pRICEs
 */
class FOOD extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_FOOD';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MessageID', 'required'),
			array('Calorie, CatID, Source', 'numerical', 'integerOnly'=>true),
			array('EnglishName, ChiName', 'length', 'max'=>100),
			array('Description, Images', 'length', 'max'=>200),
			array('MessageID', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, EnglishName, ChiName, Description, Images, Calorie, CatID, Source, updatetime, MessageID', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'message' => array(self::BELONGS_TO, 'FOODMESSAGE', 'MessageID'),
			'cat' => array(self::BELONGS_TO, 'CAT', 'CatID'),
			'source' => array(self::BELONGS_TO, 'SOURCE', 'Source'),
			'fOODCATs' => array(self::HAS_MANY, 'FOODCAT', 'FoodID'),
			'oRDERs' => array(self::HAS_MANY, 'ORDER', 'FoodID'),
			'pRICEs' => array(self::HAS_MANY, 'PRICE', 'FoodID','index'=>'FoodID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'EnglishName' => 'English Name',
			'ChiName' => 'Chi Name',
			'Description' => 'Description',
			'Images' => 'Images',
			'Calorie' => 'Calorie',
			'CatID' => 'Cat',
			'Source' => 'Source',
			'updatetime' => 'Updatetime',
			'MessageID' => 'Message',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('EnglishName',$this->EnglishName,true);
		$criteria->compare('ChiName',$this->ChiName,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Images',$this->Images,true);
		$criteria->compare('Calorie',$this->Calorie);
		$criteria->compare('CatID',$this->CatID);
		$criteria->compare('Source',$this->Source);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('MessageID',$this->MessageID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FOOD the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function behaviors(){
        return array('ESaveRelatedBehavior' => array(
         'class' => 'application.components.ESaveRelatedBehavior')
     );
}
}
