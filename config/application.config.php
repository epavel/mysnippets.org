<?php
//echo realpath('./vendor/DoctrineModule/src'); die;
return array(
    'modules' => array(
        'Application',
        'ZendDeveloperTools',
        'SmappDoctrine',
        'SmappUser',
        'SmappSocialOAuth',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
