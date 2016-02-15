<?php
return [
	'controllers' => [
		'invokables' => [
			'Admin\Controller\Admin' => 'Admin\Controller\AdminController',
			'Admin\Controller\Login' => 'Admin\Controller\LoginController'
		],
	],
	'router' => [
		'routes' => [
			'admin' => [
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => [
					'route' => '/admin'
				],
				'defaults' => [
					'controller' => 'Admin\Controller\Admin',
					'action' => 'index'
				]
			],
			'login' => [
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => [
					'route' => '/admin/login'
				],
				'defaults' => [
					'controller' => 'Admin\Controller\Login',
					'action' => 'login'
				]
			]
		]	
	],
	'view_manager' => [
		'template_path_stack' => [
			'admin' => __DIR__ . '/../view',
		]
	]
];