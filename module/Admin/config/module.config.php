<?php
return [
	'controllers' => [
		'invokables' => [
			'Admin\Controller\Aadmin' => 'Admin\Controller\AdminController',
		],
	],
	'view_manager' => [
		'template_path_stack' => [
			'admin' => __DIR__ . '/../view',
		]
	]
];