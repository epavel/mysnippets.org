<?php
namespace SmappSocialOAuth;

class Provider {
    public static function factory(array $options = null)
    {
        if (empty($options['provider'])) {
            throw new \InvalidArgumentException("[provider] is not set in options");
        }
        
        $className = __NAMESPACE__ . '\\Provider\\' . $options['provider'];
        
        if (!class_exists($className)) {
            throw new \InvalidArgumentException("Unknown provider [{$options['provider']}]");
        }
        
        if (!$provider = new $className($options)) {
            throw new \InvalidArgumentException("Unknown error with provider [{$options['provider']}]");
        }
        
        return $provider;
    }
}