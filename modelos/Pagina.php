<?php
namespace modelos;

class Pagina
{
    private $id;
    private $nombre;
    private $slug;
    private $activo;
    private $created_at;
    private $modified_at;
    
    function __construct($id=null,$nombre=null,$slug=null,$activo = null,$created_at = null,$modified_at = null ){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->slug=$slug;
        $this->activo=$activo;
        $this->created_at=$created_at;
        $this->modified_at=$modified_at;
    }
    function __toString(){
        return "id: $this->id , nombre: $this->nombre , apellido: $this->slug , fecha:  $this->activo , PaginaCreada: $this->created_at , UltimaModificacion: $this->modified_at "; 
    }
    

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    

    /**
     * Get the value of slug
     */ 
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */ 
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of activo
     */ 
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of activo
     *
     * @return  self
     */ 
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of modified_at
     */ 
    public function getModified_at()
    {
        return $this->modified_at;
    }

    /**
     * Set the value of modified_at
     *
     * @return  self
     */ 
    public function setModified_at($modified_at)
    {
        $this->modified_at = $modified_at;

        return $this;
    }
}

