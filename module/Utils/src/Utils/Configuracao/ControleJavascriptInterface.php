<?php
namespace Utils\Configuracao;

use Numenor\Html\ControleJavascript;

interface ControleJavascriptInterface
{

	public function setControleJsHead(ControleJavascript $controleJsHead);
	
	public function setControleJsBody(ControleJavascript $controleJsBody);
}