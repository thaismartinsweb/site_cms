<?php

class User extends CActiveRecord
{
	
	private $_identity;
	
	public function tableName()
	{
		return 'user';
	}

	public function rules()
	{
		return array(
			array('username, password', 'required'),
			array('name, username, password', 'length', 'max'=>100),
			array('id, name, username, password', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nome',
			'username' => 'Usuário',
			'password' => 'Senha',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function login()
	{
		if($this->_identity === null)
		{
			$this->_identity = new UserIdentity($this->username, $this->password);
		}
		
		$this->_identity->authenticate();
		
		if($this->_identity->errorCode === UserIdentity::ERROR_NONE)
		{
			Yii::app()->user->login($this->_identity);
			return true;
		}
		else if($this->_identity->errorCode == UserIdentity::ERROR_USERNAME_INVALID)
		{
			$this->addError('username','Usuário incorreto.');
			return false;
		}
		else if($this->_identity->errorCode == UserIdentity::ERROR_PASSWORD_INVALID)
		{
			$this->addError('password','Senha incorreta.');
			return false;
		}
	}
}
