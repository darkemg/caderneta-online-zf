<?php
namespace Utils\Factory;

use Zend\Http\PhpEnvironment\Request;
use Zend\ServiceManager\FactoryInterface;

abstract class ControleAsset implements FactoryInterface
{
	
	protected function getBaseUrl(Request $request) : string
	{
		$uri = $request->getUri();
		$scheme = $uri->getScheme();
		$host = $uri->getHost();
		$port = $uri->getPort();
		$baseUrl = sprintf('%s://%s', $scheme, $host);
		if (!empty($port)) {
			$baseUrl .= ':' . $port;
		}
		return $baseUrl;
	}
}
