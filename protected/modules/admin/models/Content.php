<?php

/**
 * This is the model class for table "content".
 *
 * The followings are the available columns in table 'content':
 * @property integer $id
 * @property integer $menu_id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $image
 * @property integer $special
 * @property integer $exibition
 *
 * The followings are the available model relations:
 * @property Menu $menu
 */
class Content extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				
			array('title, date_create', 'required'),
			array('menu_id, type_page_id', 'numerical', 'integerOnly'=>true),
			array('title, image', 'length', 'max'=>100),
			array('image', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true),
			array('description, content', 'safe'),
			array('id, menu_id, type_page_id, title, description, content, image, date_create', 'safe', 'on'=>'search'),
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
			'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
			'typePage' => array(self::BELONGS_TO, 'TypePage', 'type_page_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('admin', 'Id'),
			'menu_id' => Yii::t('admin', 'Menu'),
			'type_page_id' => Yii::t('admin', 'Tipo de Página'),
			'title' => Yii::t('admin', 'Título do Conteúdo'),
			'description' => Yii::t('admin', 'Descrição'),
			'image' => Yii::t('admin', 'Imagem'),
			'date_create' => Yii::t('admin', 'Data de Criação'),
			'content' => Yii::t('admin', 'Conteúdo')
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
        $criteria->compare('menu_id',$this->menu_id);
        $criteria->compare('type_page_id',$this->type_page_id);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('content',$this->content,true);
        $criteria->compare('image',$this->image,true);
        $criteria->compare('date_create',$this->date_create,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Content the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function accessRules()
	{
		return array(
				array('allow',
						'actions' => array('remove'),
						'users' => array('*'),
				),
		);
	}
}
