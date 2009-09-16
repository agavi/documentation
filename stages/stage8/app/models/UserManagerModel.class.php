<?php

class UserManagerModel extends BlogBaseModel
{
	private $users = array(
		'chuck' => array(
			'id' => 'chuck',
			'name' => 'Chuck Norris',
			'password' => 'a92b2df2a6863585637ac733044be05032bd1a7b', // roundhouse with salt
			'salt' => 'b295d117135a9763da282e7dae73a5ca7d3e5b11', // salt
			'roles' => array('admin')
		)
	);
	
	public function retrieveById($id)
	{
		if (isset($this->users[$id])) {
			return $this->getContext()->getModel('User', null, array($this->users[$id]));
		}
		
		throw new Exception('invalid user specified');
	}
}

?>
