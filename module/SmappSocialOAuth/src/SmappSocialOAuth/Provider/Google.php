<?php

namespace SmappSocialOAuth\Provider;

use \Zend\Http\Client as HttpClient;

class Google {

    protected $params = array (
            'client_id' => null,
            'client_secret' => null,
            'access_token' => '',
            'response_type' => 'code', //code|token
            'approval_prompt' => 'force', //force|auto
            'grant_type' => 'authorization_code',
            'scope'    => null,
            'redirect_uri' => null,
            'authorize_url' => null,
            'access_url' => null,
            'code' => '',
            'state'=> ''
    );
    
    protected $accessInfo = array();
    protected $profileInfo = array();

    protected $storage;
    
    protected $required = array('redirect_uri', 'client_id', 'client_secret', 'scope', 'redirect_uri', 'authorize_url', 'access_url');
    protected $authorizeParams = array('redirect_uri', 'client_id', 'scope', 'response_type', 'approval_prompt');
    protected $accessParams = array('redirect_uri', 'client_id', 'client_secret', 'grant_type', 'code');

    public function __construct(array $options = null)
    {
        foreach ($this->required as $key) {
            if (empty($options[$key])) {
                 throw new \InvalidArgumentException("Required option [$key]] isnt set");
            }
            $this->params[$key] = $options[$key];
        }     
    }


    public function getAuthorizeTokenUrl()
    {
        //$state = md5(uniqid(rand(), TRUE));
        //$this->storage->state = $state;

        $urlParams = array();
        foreach ($this->authorizeParams as $key) {
            $urlParams[$key] = $this->params[$key];
        }

        return $this->params['authorize_url'] . '?' . http_build_query($urlParams);
    }

    public function getAccessToken()
    {
        $urlParams = array();
        foreach ($this->accessParams as $key) {
            $urlParams[$key] = $this->params[$key];
        }

        $http = new HttpClient($this->params['access_url']);
        $http->setEncType(\Zend\Http\Client::ENC_URLENCODED)->setMethod('POST');
        $http->setHeaders(array('User-Agent: oauth2-draft-v10', 'Accept: application/json'));
        $req = $http->setParameterPost($urlParams)->send();
        
        $this->accessInfo = json_decode($req);
        
        return $this->accessInfo;
    }

    protected function getPreparedHttpClient()
    {

    }
}