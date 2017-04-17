<?php

namespace Pessoa;

return array(
    'router' => array(
        'routes' => array(

          'home-action' => array(
              'type' => 'Zend\Mvc\Router\Http\Literal',
              'options' => array(
                  'route' => '/',
                  'defaults' => array(
                      'controller' => 'Pessoa\Controller\Index',
                      'action' => 'home',
                  ),
              ),
          ),
        		'home' => array(
        				'type' => 'Zend\Mvc\Router\Http\Literal',
        				'options' => array(
        						'route' => '/home',
        						'defaults' => array(
        								'controller' => 'Pessoa\Controller\Index',
        								'action' => 'index',
        						),
        				),
        		),

        		'pessoa-acao' => array(
        				'type' => 'Segment',
        				'options' => array(
        						'route' => '/home/[:controller[/:action]][/:id]',
        						'constraints' => array(
        								'id'=> '[0-9]+'
        						)
        				),
        		),

        		'pessoas' => array(
        				'type'    => 'Literal',
        				'options' => array(
        						'route'    => '/home',
        						'defaults' => array(
        								'controller'    => 'Pessoa\Controller\Index',
        								'action'        => 'index',
        						),
        				),
        	'may_terminate' => true,
        		'child_routes' => array(
        				'default' => array(
        						'type'    => 'Segment',
        						'options' => array(
        								'route'    => '/[:controller[/page/:page]]',
        								'constraints' => array(
        									'controller' => '[a-zA-Z][a-zA-Z0-9_-]*'
        								),
        								'defaults' => array(
        									'page' => 1
        								),
        						),
        				),
        		),
        				),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Pessoa\Controller\Index' => 'Pessoa\Controller\IndexController',
            'pessoas' => 'Pessoa\Controller\IndexController',
        ),
    ),

    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'pessoa/index/index' => __DIR__ . '/../view/pessoa/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    )
);
