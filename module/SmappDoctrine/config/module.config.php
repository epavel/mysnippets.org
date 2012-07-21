<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Doctrine'       => 'SmappDoctrine\Service\SmappDoctrineFactory',
         ),
        'aliases' => array (
            
        ),
        'invokables' => array(
            //'orm_cache_array'
        ),
    ),
    'translator' => array(
        'locale' => 'ru_RU',
        'translation_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
);
