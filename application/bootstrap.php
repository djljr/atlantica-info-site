<?php
	defined('APPLICATION_PATH') or define('APPLICATION_PATH', dirname(__FILE__));
	defined('APPLICATION_ENVIRONMENT') or define('APPLICATION_ENVIRONMENT', 'development');

	error_reporting(E_ALL|E_STRICT);
	
	// setup controller
	$frontController = Zend_Controller_Front::getInstance();
	$frontController->throwExceptions(true);
	$frontController->setControllerDirectory(APPLICATION_PATH . '/controllers');
	$frontController->setParam('env', APPLICATION_ENVIRONMENT);
	
	Zend_Layout::startMvc(APPLICATION_PATH . '/layouts/scripts');
	$view = Zend_Layout::getMvcInstance()->getView();
	$view->doctype('XHTML1_STRICT');
	
	$configuration = new Zend_Config_Ini(
		APPLICATION_PATH . '/config/app.ini',
		APPLICATION_ENVIRONMENT
	);
	
	$dbAdapter = Zend_Db::factory($configuration->database);
	Zend_Db_Table_Abstract::setDefaultAdapter($dbAdapter);
	
	$registry = Zend_Registry::getInstance();
	$registry->configuration = $configuration;
	$registry->dbAdapter = $dbAdapter;
	
	//Custom routes
	$router = $frontController->getRouter();
	$router->addRoute('mercenary', new Zend_Controller_Router_Route(
    	'game/mercenaries/:merc',
    	array(
    	    'controller' => 'game',
	      	'action'     => 'mercenary'
    	)
	));
	
	unset($frontController, $view, $configuration, $dbAdapter, $registry, $router);
