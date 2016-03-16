<?php
namespace Admin;
return [
	'controllers' => [
		'invokables' => [
			'Admin\Controller\Admin' => Controller\AdminController::class,
			'Admin\Controller\Login' => Controller\LoginController::class
		]
	],
	'router' => [
		'routes' => [
			'admin' => [
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => [
					'route' => '/admin',
					'defaults' => [
						'controller' => 'Admin\Controller\Admin',
						'action' => 'index'
					]
				],
				'may_terminate' => true,
				'child_routes' => [
					'login' => [
						'type' => 'Zend\Mvc\Router\Http\Literal',
						'options' => [
							'route' => '/login',
							'defaults' => [
								'controller' => 'Admin\Controller\Login',
								'action' => 'login'
							]
						]
					],
					'autenticar' => [
						'type' => 'Zend\Mvc\Router\Http\Literal',
						'options' => [
							'route' => '/autenticar',
							'defaults' => [
								'controller' => 'Admin\Controller\Login',
								'action' => 'autenticar'
							]
						]
					]
				]
			],
		]	
	],
	'view_manager' => [
		'template_path_stack' => [
			'admin' => __DIR__ . '/../view',
		],
		'strategies' => [
			'ViewJsonStrategy'
		]
	],
	'doctrine' => [
		'driver' => [
			__NAMESPACE__ . '_driver' => [
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => [__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity']
			],
			'orm_default' => [
				'drivers' => [
					__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
				]
			]
		]
	]
];
