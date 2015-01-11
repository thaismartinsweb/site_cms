<?php

/**
 * This is the model class for table "tag".
 *
 * The followings are the available columns in table 'tag':
 * @property integer $id
 * @property string $title
 *
 * The followings are the available model relations:
 * @property Portfolio[] $portfolios
 */
class Tag extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title', 'safe', 'on'=>'search'),
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
			'portfolios' => array(self::MANY_MANY, 'Portfolio', 'tag_x_portfolio(id_tag, id_portfolio)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
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
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tag the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Returns tags title by portfólio
	 * 
	 */
	public function findTitleByPortfolio($idPortfolio)
	{
		$tagsPort = TagXPortfolio::model()->findAllByAttributes(array('id_portfolio' => $idPortfolio));
		
		$tags = '';
		
		foreach($tagsPort as $tagPort){
			$tag = Tag::model()->findByPk($tagPort->id_tag);
			$tags .= $tag->title . ' ';
		}
		
		return $tags;
	}
	
	/**
	 * Returns tags by portfólio
	 *
	 */
	public function findByPortfolio($idPortfolio)
	{
		$tagsPort = TagXPortfolio::model()->findAllByAttributes(array('id_portfolio' => $idPortfolio));
	
		$tags = array();
	
		foreach($tagsPort as $tag){
			$tags[] = Tag::model()->findByPk($tag->id_tag);
		}
	
		return $tags;
	}
}