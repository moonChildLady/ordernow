<?php

/**
 * This is the model class for table "tbl_PRICE".
 *
 * The followings are the available columns in table 'tbl_PRICE':
 * @property integer $id
 * @property integer $FoodID
 * @property integer $Price
 * @property string $AddOn
 * @property integer $Enable
 *
 * The followings are the available model relations:
 * @property FOOD $food
 */
class PRICE extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_PRICE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FoodID, Price', 'required'),
			array('FoodID, Price, Enable', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, FoodID, Price, AddOn, Enable', 'safe', 'on'=>'search'),
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
			'food' => array(self::BELONGS_TO, 'FOOD', 'FoodID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'FoodID' => 'Food Name',
			'Price' => 'Price',
			'AddOn' => 'Created On',
			'Enable' => 'Status',
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
		$criteria->compare('FoodID',$this->FoodID);
		$criteria->compare('Price',$this->Price);
		$criteria->compare('AddOn',$this->AddOn,true);
		$criteria->compare('Enable',$this->Enable);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PRICE the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
