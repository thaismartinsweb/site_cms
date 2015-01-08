<?php 

class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_name;
	private $salt = 'cms';
	
	public function authenticate()
	{

		$record = User::model()->findByAttributes(array('username' => $this->username));
		
		if($record === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if($record->password !== md5($this->password . $this->salt))
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id = $record->id;
			$this->_name = $record->name;
			$this->setState('name', $record->name);
			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
	
	public function getName()
	{
		return $this->_name;
	}
}