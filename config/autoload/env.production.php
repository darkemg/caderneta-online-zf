<?php
/**
 * Configurações específicas do ambiente de produção.
 * 
 * $env === 'production'
 */
return [
	'numenor' => [
		'html' => [
			'comportamento_padrao' => Numenor\Html\Controle::COMPORTAMENTO_PADRAO_PROD
		]
	],
	'zfctwig' => [
		'environment_options' => [
			'debug' => false,
			'cache' => __DIR__ . '/../../data/cache/templates'
		]
	]
];