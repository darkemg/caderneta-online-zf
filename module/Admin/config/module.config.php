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
		]
	]
];
