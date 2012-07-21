<?php

namespace SmappDoctrine\Service;

use Traversable;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\Stdlib\ArrayUtils;
use Zend\Debug as debug;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Configuration as DoctrineConfiguration;

class SmappDoctrineFactory implements FactoryInterface {
    
    public function createService(ServiceLocatorInterface $services)
    {
        $moduleConfig  = $services->get('config');
        
        
        $cache = new \Doctrine\Common\Cache\ArrayCache;

        $config = new DoctrineConfiguration;
        
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);
        
        $driverImpl = $config->newDefaultAnnotationDriver(__DIR__);
        
        $config->setMetadataDriverImpl($driverImpl);
        
        $config->setProxyDir('APPLICATION_DATA');
        $config->setProxyNamespace('MyProject\Proxies');
        
        $config->setAutoGenerateProxyClasses(false);
        
        
        //return $config['smapp_doctrine'];
        $em = EntityManager::create($moduleConfig['smapp_doctrine']['connection'], $config);
        
        return $em;
        
        if ($config instanceof Traversable) {
            //$config = ArrayUtils::iteratorToArray($config);
        }
        
        return $config;
    }
}