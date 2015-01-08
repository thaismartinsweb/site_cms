<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property integer $master_id
 * @property integer $type_menu_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property integer $special
 * @property integer $exibition
 *
 * The followings are the available model relations:
 * @property Menu $master
 * @property Menu[] $menus
 * @property TypeMenu $typeMenu
 */
class Menu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_menu_id, title', 'required'),
			array('master_id, type_menu_id, special, exibition', 'numerical', 'integerOnly'=>true),
			array('title, image', 'length', 'max'=>100),
			array('image', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, master_id, type_menu_id, title, description, image, special, exibition', 'safe', 'on'=>'search'),
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
			'master' => array(self::BELONGS_TO, 'Menu', 'master_id'),
			'menus' => array(self::HAS_MANY, 'Menu', 'master_id'),
			'typeMenu' => array(self::BELONGS_TO, 'TypeMenu', 'type_menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'master_id' => 'Master',
			'type_menu_id' => 'Type Menu',
			'title' => 'Title',
			'description' => 'Description',
			'image' => 'Image',
			'special' => 'Special',
			'exibition' => 'Exibition',
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
		$criteria->compare('master_id',$this->master_id);
		$criteria->compare('type_menu_id',$this->type_menu_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('special',$this->special);
		$criteria->compare('exibition',$this->exibition);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function hasMaster($id){
	
		$master = $this->findAllByPk($id);
	
		if($master){
			return true;
		}
	
		return false;
	}
	
	public function findTitle($id){

		$master = $this->findAllByPk($id);
		
		if($master){
			return $master[0]->title;
		}
		
		return '---';
	}
}
