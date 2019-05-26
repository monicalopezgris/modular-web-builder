<?php

require_once('Service\Conexion.php');
require_once('modelos\Pagina.php');

class DaoPagina
{
    const SELECT_ALL = 'SELECT * FROM paginas';
    const SELECT_UNO = 'SELECT * FROM paginas WHERE id = :idPagina';
    const INSERTAR = 'INSERT INTO paginas values (:idPagina,:nombre,:slug,:activo,:created_at,:modified_at)';
    const MODIFICAR = 'UPDATE paginas SET nombre=:nombre,slug=:slug,activo=:activo,created_at=:created_at,modified_at=:modified_at WHERE id=:idPagina';
    const BORRAR = 'DELETE FROM paginas WHERE id=:idPagina';
    
    private $pdo;
    
    function __construct(){
        $this->pdo=Conexion::getInstance();   
    }
    
    function acceder($stmt){
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE , 'modelos\Pagina');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function listAll(){
        $stmt = $this->pdo->prepare(self::SELECT_ALL);
        $stmt->execute();
        return $this->acceder($stmt);
    }
    
    function listPorId($id){
        $stmt = $this->pdo->prepare(self::SELECT_UNO);
        $stmt->bindValue(':idPagina', $id);
        return $this->acceder($stmt)[0];
        
    }
    // seguir a partir de aqui
    function delete($pagina){
        try{
        $id=$pagina->getId();
        $stmt = $this->pdo->prepare(self::BORRAR);
        $stmt->bindValue(':idPagina', $id);
        $stmt->execute();
        return true;
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }
    
    function update($pagina){
        try{            

            $date= date('Y-m-d H:i:s');

            $stmt = $this->pdo->prepare(self::MODIFICAR);
            $stmt->bindValue(':idPagina', $pagina->getId());
            $stmt->bindValue(':nombre', $pagina->getNombre());
            $stmt->bindValue(':slug', $pagina->getSlug());
            $stmt->bindValue(':activo', $pagina->getActivo());
            $stmt->bindValue(':created_at', $pagina->getCreated_at());
             $stmt->bindValue('modified_at',  $date );
            //var_dump($stmt);
            $stmt->execute();
            return true;
        }catch(Exception $e){
                echo $e->getMessage();
                return false;
        }
    }

    function add($pagina){
        try{

            $date= date('Y-m-d H:i:s');


            $stmt = $this->pdo->prepare(self::INSERTAR);
            $stmt->bindValue(':idPagina', $pagina->getId());
            $stmt->bindValue(':nombre', $pagina->getNombre());
            $stmt->bindValue(':slug', $pagina->getSlug());
            $stmt->bindValue(':activo', $pagina->getActivo());
            $stmt->bindValue(':created_at', $date );
            $stmt->bindValue('modified_at',  $date );
            //$stmt->bindValue(':created_at', $pagina->getCreated_at());
            //$stmt->bindValue(':modified_at', $pagina->getModified_at());
            //var_dump($stmt);
            $stmt->execute();
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }
    
}

