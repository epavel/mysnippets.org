<?php
namespace SmappUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//use SmappDoctrine\Service\SmappDoctrineFactory;
use SmappSocialOAuth\Service\SocialOAuth;
use SmappSocialOAuth\Provider;
use Zend\Debug;

class IndexController extends AbstractActionController
{
    protected $em;
    
    public function indexAction()
    {   
        $router = $this->getServiceLocator()->get('router');
        //echo get_class($router);
        //Debug::dump($router); 
        die('<hr>ok');
        return new ViewModel();
    }
    
    public function getEm()
    {
        return $this->em = $this->getServiceLocator()->get('Doctrine');
    }
}
