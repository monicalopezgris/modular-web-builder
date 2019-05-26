<?php
require_once('Service\Request.php');
require_once('controller\ControllerPagina.php');

$request = new Service\Request();

// obtenemos el par�metro o asignamos un valor por defecto
$controller = $request->getParam('controller') ?? 'Page';
// construimos el nombre completo del controlador
$nombreCompleto =  'Controller' . ucfirst($controller) ;
// obtenemos el par�metro o asignamos un valor por defecto
$action = $request->getParam('action') ?? 'indice';
// intanciamos el controlador
require_once('controller\\'.$nombreCompleto. ".php");
$nombreCompletoYNamespace = 'controller\\'.$nombreCompleto;
$objController = new $nombreCompletoYNamespace;
// y llamamos a la "acci�n"/m�todo pasando el id si lo hay
$retorno=$objController->$action($request);
// a preparar la llamada a vista
if ($retorno=="") $retorno=$action;
$vista='vista\\'.$controller.'\\'.$retorno.'.php';
require_once ($vista);