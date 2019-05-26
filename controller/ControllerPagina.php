<?php
namespace controller;


use Service;
use modelos;


require_once 'Service\Request.php';
require_once 'modelos\Pagina.php';
require_once 'dao\DaoPagina.php';

class ControllerPagina
{
    private $daoPagina;
    private $request;
    
    function __construct(){
        $this->daoPagina=new \DaoPagina();
        $this->request= new Service\Request();
    }
    public function index(){
        echo "<h1>index</h1>";
    }
    public function listado(){
        $_REQUEST['salida']=  $this->daoPagina->listAll();
        return "listado";
    }
    public function editar($request){
        $_REQUEST['salida']=  $this->daoPagina->listPorId($request->getParam('id'));
        return "formulario";
    }

    public function actualizar($request){
        $pagina = new modelos\Pagina(); 

        $date= date('Y-m-d H:i:s'); 

        $pagina->setId($request->getParam('id'));
        $pagina->setNombre($request->getParam('nombre'));
        $pagina->setSlug($request->getParam('slug'));
        $pagina->setActivo($request->getParam('activo'));
        $pagina->setCreated_at($request->getParam('created_at'));
        $pagina->setModified_at($date);
        $this->daoPagina->update($pagina);
        return $this->listado();
    }
    public function borrar($request){
        $pagina = new modelos\Pagina();    
        $pagina->setId($request->getParam('id'));
        $this->daoPagina->delete($pagina);
        return $this->listado();




    }
//AÑADIR QUE setId sea 0
    public function add($request){
        $pagina = new modelos\Pagina();    
        $pagina ->setId(0);
        $_REQUEST['salida']=  $pagina;

        return "formulario";

    }




    public function anadir($request){
        $pagina = new modelos\Pagina();

        $date= date('Y-m-d H:i:s');

        //var_dump($request);
        //die();    
        $pagina->setId($request->getParam('id'));
        $pagina->setNombre($request->getParam('nombre'));
        $pagina->setSlug($request->getParam('slug'));
        $pagina->setActivo($request->getParam('activo'));

        $pagina->setCreated_at($date);
        $pagina->setModified_at($date);

        $this->daoPagina->add($pagina);
        return $this->listado();
    }
}

