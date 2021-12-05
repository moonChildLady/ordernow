<?php

/**
 * This is the model class for table "tbl_DEVICE".
 *
 * The followings are the available columns in table 'tbl_DEVICE':
 * @property integer $id
 * @property string $uuid
 * @property integer $Enable
 * @property string $Addon
 * @property string $updatetime
 * @property integer $deviceType
 * @property integer $kitchenType
 *
 * The followings are the available model relations:
 * @property DEVICETYPE $deviceType0
 * @property TABLE[] $tABLEs
 */
class DEVICE extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_DEVICE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uuid, updatetime', 'required'),
			array('Enable, deviceType, kitchenType', 'numerical', 'integerOnly'=>true),
			array('uuid', 'length', 'max'=>100),
			array('Addon', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, uuid, Enable, Addon, updatetime, deviceType, kitchenType', 'safe', 'on'=>'search'),
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
			'deviceType0' => array(self::BELONGS_TO, 'DEVICETYPE', 'deviceType'),
			'tABLEs' => array(self::HAS_MANY, 'TABLE', 'DeviceID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uuid' => 'Device ID',
			'Enable' => 'Status',
			'Addon' => 'Created On',
			'updatetime' => 'Updatetime',
			'deviceType' => 'Device Type',
			'kitchenType' => 'Kitchen Type',
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
		$criteria->compare('uuid',$this->uuid,true);
		$criteria->compare('Enable',$this->Enable);
		$criteria->compare('Addon',$this->Addon,true);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('deviceType',$this->deviceType);
		$criteria->compare('kitchenType',$this->kitchenType);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DEVICE the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
