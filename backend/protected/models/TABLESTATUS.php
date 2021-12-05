<?php

/**
 * This is the model class for table "tbl_TABLESTATUS".
 *
 * The followings are the available columns in table 'tbl_TABLESTATUS':
 * @property integer $id
 * @property integer $TableID
 * @property integer $Status
 * @property integer $OrderNo
 * @property integer $NumberOfSeat
 * @property string $CreatedOn
 * @property integer $LastOrder
 * @property integer $ExpiredOn
 * @property string $updatetime
 * @property string $Type
 *
 * The followings are the available model relations:
 * @property TYPE $type
 * @property TABLE $table
 */
class TABLESTATUS extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_TABLESTATUS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TableID, OrderNo, NumberOfSeat, CreatedOn, LastOrder, ExpiredOn, updatetime, Type', 'required'),
			array('TableID, Status, OrderNo, NumberOfSeat, LastOrder, ExpiredOn', 'numerical', 'integerOnly'=>true),
			array('Type', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, TableID, Status, OrderNo, NumberOfSeat, CreatedOn, LastOrder, ExpiredOn, updatetime, Type', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'TYPE', 'Type'),
			'table' => array(self::BELONGS_TO, 'TABLE', 'TableID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'TableID' => 'Table',
			'Status' => '1=enable',
			'OrderNo' => 'Order No',
			'NumberOfSeat' => 'Number Of Seat',
			'CreatedOn' => 'Created On',
			'LastOrder' => 'Last Order',
			'ExpiredOn' => 'mins',
			'updatetime' => 'Updatetime',
			'Type' => 'Type',
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
		$criteria->compare('TableID',$this->TableID);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('OrderNo',$this->OrderNo);
		$criteria->compare('NumberOfSeat',$this->NumberOfSeat);
		$criteria->compare('CreatedOn',$this->CreatedOn,true);
		$criteria->compare('LastOrder',$this->LastOrder);
		$criteria->compare('ExpiredOn',$this->ExpiredOn);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('Type',$this->Type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TABLESTATUS the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
