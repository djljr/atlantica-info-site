<?php

class IndexController extends Zend_Controller_Action
{
	function indexAction()
	{
		$this->view->title = "Coming Soon";
	}
}