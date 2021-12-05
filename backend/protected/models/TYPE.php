<?php

/**
 * This is the model class for table "tbl_TYPE".
 *
 * The followings are the available columns in table 'tbl_TYPE':
 * @property string $id
 * @property string $EnglishName
 * @property string $ChiName
 * @property string $StartTime
 * @property string $EndTime
 * @property integer $Enable
 * @property integer $LastOrder
 * @property integer $EndOrder
 * @property integer $Full
 * @property integer $Half
 * @property integer $buffet
 *
 * The followings are the available model relations:
 * @property TYPECAT[] $tYPECATs
 */
class TYPE extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_TYPE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Enable, LastOrder, EndOrder, Full, Half, buffet', 'numerical', 'integerOnly'=>true),
			array('EnglishName, ChiName', 'length', 'max'=>100),
			array('StartTime, EndTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, EnglishName, ChiName, StartTime, EndTime, Enable, LastOrder, EndOrder, Full, Half, buffet', 'safe', 'on'=>'search'),
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
			'tYPECATs' => array(self::HAS_MANY, 'TYPECAT', 'TypeID'),
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
			'StartTime' => 'Start Time',
			'EndTime' => 'End Time',
			'Enable' => 'Status',
			'LastOrder' => 'Last Order (MINS)',
			'EndOrder' => 'End Order (MINS)',
			'Full' => 'Full Price',
			'Half' => 'Half Price',
			'buffet' => 'Is Buffet?',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('EnglishName',$this->EnglishName,true);
		$criteria->compare('ChiName',$this->ChiName,true);
		$criteria->compare('StartTime',$this->StartTime,true);
		$criteria->compare('EndTime',$this->EndTime,true);
		$criteria->compare('Enable',$this->Enable);
		$criteria->compare('LastOrder',$this->LastOrder);
		$criteria->compare('EndOrder',$this->EndOrder);
		$criteria->compare('Full',$this->Full);
		$criteria->compare('Half',$this->Half);
		$criteria->compare('buffet',$this->buffet);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TYPE the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
