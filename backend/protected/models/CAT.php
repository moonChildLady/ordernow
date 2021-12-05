<?php

/**
 * This is the model class for table "tbl_CAT".
 *
 * The followings are the available columns in table 'tbl_CAT':
 * @property integer $id
 * @property string $EnglishName
 * @property string $ChiName
 * @property integer $Ordering
 * @property string $updatetime
 *
 * The followings are the available model relations:
 * @property FOODCAT[] $fOODCATs
 * @property TYPECAT[] $tYPECATs
 */
class CAT extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_CAT';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EnglishName, ChiName, Ordering', 'required'),
			array('Ordering', 'numerical', 'integerOnly'=>true),
			array('EnglishName, ChiName', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, EnglishName, ChiName, Ordering, updatetime', 'safe', 'on'=>'search'),
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
			'fOODCATs' => array(self::HAS_MANY, 'FOODCAT', 'CatID'),
			'tYPECATs' => array(self::HAS_MANY, 'TYPECAT', 'CatID'),
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
			'Ordering' => 'Ordering',
			'updatetime' => 'Updatetime',
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
		$criteria->compare('Ordering',$this->Ordering);
		$criteria->compare('updatetime',$this->updatetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CAT the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
