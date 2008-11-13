<?php
	date_default_timezone_set('America/New_York');
	
	// directory setup and class loading
	define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application/'));
	set_include_path(//'.' . PATH_SEPARATOR . 
		APPLICATION_PATH . '/../library/' . PATH_SEPARATOR . 
		//'../application/models' . PATH_SEPARATOR . 
		get_include_path());
	
	require_once "Zend/Loader.php";
	Zend_Loader::registerAutoload();
	
	try
	{
		require '../application/bootstrap.php';
	}
	catch (Exception $exception)
	{
		echo '<html><body><center>' .
			'An exception occurred while bootstrapping the application.';
		if(defined('APPLICATION_ENVIRONMENT') && APPLICATION_ENVIRONMENT != 'production')
		{
			echo '<br /><br />' . $exception->getMessage() . '<br />' .
				'<div align="left">Stack Trace:' .
				'<pre>' . $exception->getTraceAsString() . '</pre></div>';			
		}
		echo '</center></body></html>';
		exit(1);
	}
		
	// run!
	Zend_Controller_Front::getInstance()->dispatch();