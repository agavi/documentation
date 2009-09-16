<?php

class UserModel extends BlogBaseModel
{
	protected $_id;

	protected $_rev;
	
	protected $name;

	protected $salt;

	protected $password;

	protected $roles;

	protected static $fields = array(
		'id',
		'name',
		'salt',
		'password',
		'roles',
	);
	
	public function __construct($data)
	{
		$this->fromArray($data);
	}

	public function toArray()
	{
		$retval = array();
		
		foreach(self::$fields as $field) {
			$retval[$field] = $this->$field;
		}
		
		return $retval;
	}
	
	public function fromArray(array $data = array())
	{
		foreach (self::$fields as $field) {
			if (isset($data[$field])) {
				$this->$field = $data[$field];
			}
		}
	}
	
	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	public function getRoles()
	{
		return $this->roles;
	}
	
	public function getSalt()
	{
		return $this->salt;
	}
	
	public function setName($value)
	{
		$this->name = $value;
	}
	
	public function setPassword($value)
	{
		$this->password = $value;
	}
	
	public function setRoles($value)
	{
		$this->roles = $value;
	}
	
	public function setSalt($value)
	{
		$this->salt = $value;
	}
}

?>
