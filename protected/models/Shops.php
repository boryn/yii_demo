<?php

/**
 * This is the model class for table "tbl_shops".
 *
 * The followings are the available columns in table 'tbl_shops':
 * @property integer $id
 * @property string $voivodship
 * @property string $city
 * @property string $street
 * @property string $place
 */
class Shops extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Shops the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_shops';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('voivodship, city, street, place', 'required'),
			array('voivodship, city, street, place', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, voivodship, city, street, place', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'voivodship' => 'Voivodship',
			'city' => 'City',
			'street' => 'Street',
			'place' => 'Place',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('voivodship',$this->voivodship,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('place',$this->place,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}