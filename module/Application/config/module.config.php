<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

use Album\Controller\AlbumController;

return [
    'navigation' => [
        'default' => [
            [
                'label' => 'application',
                'route' => 'application',
            ],
            [
                'label' => 'Album',
                'route' => 'album',
                'pages' => [
                    [
                        'label' => 'Add',
                        'route' => 'album',
                        'action' => 'add',
                    ],
                    [
                        'label' => 'Edit',
                        'route' => 'album',
                        'action' => 'edit',
                    ],
                    [
                        'label' => 'Delete',
                        'route' => 'album',
                        'action' => 'delete',
                    ],
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'default' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/[:controller[/:action]]',
                    'defaults' => [
                        'controller' => Application\Controller\IndexController::class,
                        'action' => 'index',
                    ],
                    'constraints' => [
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
//                        'controller' => Controller\IndexController::class,
                        'controller' => AlbumController::class, // <-- change here
                        'action' => 'index',
                    ],
                ],
            ],
            'application' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'console' => [
        'router' => [
            'routes' => [
                'mq' => [
                    'type' => Simple::class, //Literal Simple
                    'options' => [
                        'route' => '/mq',
                        'defaults' => [
                            'controller' => Controller\IndexController::class,
                            'action' => 'echo',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
