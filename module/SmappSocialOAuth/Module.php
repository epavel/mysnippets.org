<?php
namespace SmappSocialOAuth;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            //'Zend\Loader\ClassMapAutoloader' => array(
            //        __DIR__ . '/autoload_classmap.php'
            //),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}

/*
 * 

Client ID: 
495906136833.apps.googleusercontent.com

Email address:
495906136833@developer.gserviceaccount.com

Client secret: 	
fwvu8LGq5LtGEgpRuBaliVbr

Redirect URIs: 	
http://epavel.ru/user/auth/oauth2callback

JavaScript origins: 	http://epavel.ru
 */