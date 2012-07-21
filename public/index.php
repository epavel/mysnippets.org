<?php
define('REQUEST_MICROTIME', microtime(true));
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Setup autoloading
include 'init_autoloader.php';

define('APPLICATION_PATH', realpath(__DIR__ . '/../'));
define('APPLICATION_DATA', APPLICATION_PATH . '/data');





// Run the application!
Zend\Mvc\Application::init(include 'config/application.config.php')->run()->send();
