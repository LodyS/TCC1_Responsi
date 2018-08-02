<?php

/**
 * This is the model class for table "kota".
 *
 * The followings are the available columns in table 'kota':
 * @property integer $id
 * @property integer $provinsi_id
 *  @property string $nama_kota
 *
 * The followings are the available model relations:
 * @property Provinsi $provinsi
 */
 
 
 
 
class Kota extends CActiveRecord
{
  public $data;
  
	public function tableName()
	{
		return 'kota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('provinsi_id', 'numerical', 'integerOnly'=>true),
			array('nama_kota', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, provinsi_id, nama_kota', 'safe', 'on'=>'search'),
		);
	}

	
	public function relations()
	{
		
		return array(
			'provinsi' => array(self::BELONGS_TO, 'Provinsi', 'provinsi_id'),
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'provinsi_id' => 'Provinsi',
			'nama_kota' => 'Nama Kota',
		);
	}


	public function search()
	{
		
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('provinsi_id',$this->provinsi_id);
		$criteria->compare('nama_kota',$this->nama_kota,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchKota($provinsi_id)
	{
		$criteria = new CDbCriteria (array(
		'condition'=>'provinsi_id=:param1',
		'params'=>array(':param1'=>$provinsi_id),
		));
		
		
		$criteria->compare('id', $this->id);
		$criteria->compare('provinsi_id', $this->provinsi_id);
		$criteria->compare('nama_kota', $this->nama_kota,true);
		
		return new CActiveDataProvider ($this, array(
		  'criteria'=>$criteria,
		));
	}
	
	
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
