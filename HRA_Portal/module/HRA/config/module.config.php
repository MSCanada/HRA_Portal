<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'HRA\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            
            'HRA' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/HRA',
                    'defaults' => array(
                        '__NAMESPACE__' => 'HRA\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
        
    ),
    'doctrine' => array(
        'authentication' => array( // this part is for the Auth adapter from DoctrineModule/Authentication
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
               
                'identity_class' => 'HRA\Entity\Registeredusers', //'Application\Entity\User',
                'identity_property' => 'username', // 'username', // 'email',
                'credential_property' => 'password', // 'password',
                'credential_callable' => function(HRA\Entity\Registeredusers $user, $passwordGiven) { 
                   
                    if ($user->getPassword() ==  $passwordGiven ) {
                        return true;
                    }
                    else {
                        return false;
                    }
                },
            ),
        ),

        'driver' => array(
            'Application' . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . 'HRA' . '/Entity',  // Define path of entities
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    'HRA'. '\Entity' => 'Application' . '_driver'  // Define namespace of entities
                )
            )
        )
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'HRA\Controller\Index' => 'HRA\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'HRA/index/index' => __DIR__ . '/../view/HRA/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
