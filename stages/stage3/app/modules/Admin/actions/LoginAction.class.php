<?php

class Admin_LoginAction extends BlogAdminBaseAction
{
	public function execute(AgaviRequestDataHolder $rd)
	{
		// remove this execute() method and create executeRead() and executeWrite() methods or equivalents
		throw new Exception('Admin_LoginAction is not yet implemented. ' .
			'This is only a stub that serves as a reminder for you to do this.');
	}

	public function getDefaultViewName()
	{
		return 'Success';
	}
}

?>