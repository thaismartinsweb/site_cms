<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property integer $id
 * @property integer $video_gallery_id
 * @property integer $type_video_id
 * @property string $title
 * @property string $description
 * @property string $url
 * @property string $date_create
 *
 * The followings are the available model relations:
 * @property VideoGallery $videoGallery
 * @property TypeVideo $typeVideo
 */
class Video extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_video_id, title, date_create', 'required'),
			array('video_gallery_id, type_video_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('url', 'length', 'max'=>200),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, video_gallery_id, type_video_id, title, description, url, date_create', 'safe', 'on'=>'search'),
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
			'videoGallery' => array(self::BELONGS_TO, 'VideoGallery', 'video_gallery_id'),
			'typeVideo' => array(self::BELONGS_TO, 'TypeVideo', 'type_video_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'video_gallery_id' => 'Galeria de Videos',
			'type_video_id' => 'Tipo de Video',
			'title' => 'Título',
			'description' => 'Descrição',
			'url' => 'Url',
			'date_create' => 'Data de Criação',
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
		$criteria->compare('video_gallery_id',$this->video_gallery_id);
		$criteria->compare('type_video_id',$this->type_video_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('date_create',$this->date_create,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
