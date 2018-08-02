<?php

/**
 * This is the model class for table "penjualan".
 *
 * The followings are the available columns in table 'penjualan':
 * @property integer $id
 * @property integer $no_nota
 * @property string $tanggal
 * @property integer $barang_id
 * @property integer $qty
 * @property integer $harga_sekarang
 */
class Penjualan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'penjualan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, no_nota, barang_id, qty, harga_sekarang', 'numerical', 'integerOnly'=>true),
			array('tanggal', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, no_nota, tanggal, barang_id, qty, harga_sekarang', 'safe', 'on'=>'search'),
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
			'no_nota' => 'No Nota',
			'tanggal' => 'Tanggal',
			'barang_id' => 'Barang',
			'qty' => 'Qty',
			'harga_sekarang' => 'Harga Sekarang',
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
		$criteria->compare('no_nota',$this->no_nota);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('barang_id',$this->barang_id);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('harga_sekarang',$this->harga_sekarang);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Penjualan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
