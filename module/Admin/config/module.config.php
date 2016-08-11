<?php
namespace Admin;
return [
	'service_manager' => [
		'invokables' => [
			
		],
		'factories' => [
			 
		]
	],
	'controllers' => [
		'factories' => [
			'Admin\Controller\Login' => Factory\LoginController::class
		],
		'invokables' => [
			'Admin\Controller\Admin' => Controller\AdminController::class
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
					'autenticar' => [
						'type' => 'Zend\Mvc\Router\Http\Literal',
						'options' => [
							'route' => '/autenticar',
							'defaults' => [
								'controller' => 'Admin\Controller\Login',
								'action' => 'autenticar'
							]
						]
					],
					'solicitar-senha' => [
						'type' => 'Zend\Mvc\Router\Http\Literal',
						'options' => [
							'route' => '/solicitar-senha',
							'defaults' => [
								'controller' => 'Admin\Controller\Login',
								'action' => 'solicitar-senha'
							]
						]
					],
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
				'paths' => [
					__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity',
					__DIR__ . '/../src/' . __NAMESPACE__ . '/Model'
				]
			],
			'orm_default' => [
				'drivers' => [
					__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
					__NAMESPACE__ . '\Model' => __NAMESPACE__ . '_driver'
				]
			]
		]
	]
];
