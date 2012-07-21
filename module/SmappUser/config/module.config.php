<?php
return array(
    'router' => array(
        'routes' => array(
            'user' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/user',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SmappUser\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    /*'auth' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/go',
                            'defaults' => array(
                                'controller' => 'Auth',
                                'action' =>
                            ),
                        ),
                    ),*/
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/:controller[/:action][/]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes'  => array(
                            'query' => array(
                                'type' => 'Query',
                            ),
                        ),
                    ),
                ),
            ),
            'userslashed' => array(
                'type' => 'Literal',
                    
                'options' => array(
                    'route' => '/user/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'SmappUser\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
            ),    
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            //'SmappDoctrine'       => 'SmappDoctrine\Service\SmappDoctrineFactory',
        ),
        'aliases' => array (
        ),
        'invokables' => array(
            //'orm_cache_array'
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'SmappUser\Controller\Index' => 'SmappUser\Controller\IndexController',
            'SmappUser\Controller\Auth' => 'SmappUser\Controller\AuthController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'SmappUser' => __DIR__ . '/../view',
        ),
    ),
);



return array(
    'service_manager' => array(
        'factories' => array(
            'SmappDoctrine'       => 'SmappDoctrine\Service\SmappDoctrineFactory',
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