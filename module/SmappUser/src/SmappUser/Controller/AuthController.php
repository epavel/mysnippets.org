<?php
namespace SmappUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\SessionManager;

//use SmappDoctrine\Service\SmappDoctrineFactory;
use SmappSocialOAuth\Service\SocialOAuth;
use SmappSocialOAuth\Provider;

class AuthController extends AbstractActionController
{
    protected $em;

    protected $storage;
    
    public function indexAction()
    {   
        
        //\Zend\Debug::dump($provider);
        //die('<hr>ok');
        
        $asd = new \Zend\Http\Client();
        echo $_SERVER['REQUEST_URI'];
        return new ViewModel();
    }
    
    
    
    public function goAction()
    {
        $query = $this->getRequest()->getQuery();
        //echo $query->dest;
        $options = array(
                'provider' => 'Google',
                'client_id' => '352061932588.apps.googleusercontent.com',
                'client_secret' => 'VP9zTdqkOp6d6eKmJ4J_RJEX',
                'redirect_uri' => 'http://mysnippets.org/user/auth/process',
                'scope' => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email',
                'authorize_url' => 'https://accounts.google.com/o/oauth2/auth',
                'access_url' => 'https://accounts.google.com/o/oauth2/token',
        );
        
        $provider = Provider::factory($options);
        exit(header('Location: ' . $provider->getAuthorizeTokenUrl()));
        die('go-go-go-');
    }
    
    public function processAction()
    {
        $options = array(
                'provider' => 'Google',
                'client_id' => '352061932588.apps.googleusercontent.com',
                'client_secret' => 'VP9zTdqkOp6d6eKmJ4J_RJEX',
                'redirect_uri' => 'http://mysnippets.org/user/auth/process',
                'scope' => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email',
                'authorize_url' => 'https://accounts.google.com/o/oauth2/auth',
                'access_url' => 'https://accounts.google.com/o/oauth2/token',
                'code' => $_REQUEST['code']
        );
        
        $provider = Provider::factory($options);
        $accessInfo = $provider->getAccessToken();
        \Zend\Debug::dump($accessInfo);
        
        $options = array(
                CURLOPT_RETURNTRANSFER => true,
               	CURLOPT_USERAGENT => 'oauth2-draft-v10',
                CURLOPT_HTTPHEADER => array(
                        "Accept: application/json",
                        "Authorization: Bearer " . $accessInfo['access_token']),
        );
        
        
        $profileUrl = "https://www.googleapis.com/oauth2/v1/userinfo?access_token=" . $accessInfo['access_token'];
        
        $ch = curl_init($profileUrl);
        curl_setopt_array($ch, $options);
        \Zend\Debug::dump(json_decode(curl_exec($ch)));
        curl_close($ch);
        die('<hr>ok');
    }
    
    
    
    public function getEm()
    {
        return $this->em = $this->getServiceLocator()->get('Doctrine');
    }
}
