<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//use SmappDoctrine\Service\SmappDoctrineFactory;
use SmappSocialOAuth\Service\SocialOAuth;
use SmappSocialOAuth\Provider;

class IndexController extends AbstractActionController
{
    protected $em;
    
    public function indexAction()
    {   
        //$em = $this->getServiceLocator()->get('SmappDoctrine');
        //$con = $em->getConnection();
        //$this->getEm();
        //\Zend\Debug::dump($this->em);
        //$this->request;
        
        $options = array(
            'provider' => 'Google',
            'client_id' => '352061932588.apps.googleusercontent.com',
            'client_secret' => 'VP9zTdqkOp6d6eKmJ4J_RJEX',
            'redirect_uri' => 'http://epavel.ru/curl.php',
            'scope' => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email',
            'authorize_url' => 'https://accounts.google.com/o/oauth2/auth',
            'access_url' => 'https://accounts.google.com/o/oauth2/token',
        );
            
        //$provider = Provider::factory($options);
        //\Zend\Debug::dump($provider);
        //die('<hr>ok');
        return new ViewModel();
    }
    
    public function getEm()
    {
        return $this->em = $this->getServiceLocator()->get('SmappDoctrine');
    }
}
