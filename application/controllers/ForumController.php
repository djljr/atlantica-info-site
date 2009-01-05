<?php
class ForumController extends Zend_Controller_Action
{
	protected $_calendarEventDao;
		
	public function indexAction()
	{
		$this->_redirect("/forum/index.php");
	}
}