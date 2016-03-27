<?php
/**
 * Configurações específicas do ambiente de desenvolvimento.
 * 
 * $env === 'development'
 */
return [
	'numenor' => [
		'html' => [
			'comportamento_padrao' => Numenor\Html\Controle::COMPORTAMENTO_PADRAO_DEV
		]
	],
	'zfctwig' => [
		'environment_options' => [
			'debug' => true,
			'cache' => false
		]
	]
];