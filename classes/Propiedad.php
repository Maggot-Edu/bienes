<?php

namespace App;

class Propiedad {

    //BBDD
    protected static $db;

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $parking;
    public $creado;
    public $vendedores_id;

    public function __construct( $args = [] )
    {
        $this->id =            $args['id'] ?? '';
        $this->titulo =        $args['titulo'] ?? '';
        $this->precio =        $args['precio'] ?? '';
        $this->imagen =        $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion =   $args['descripcion'] ?? '';
        $this->habitaciones =  $args['habitaciones'] ?? '';
        $this->wc =            $args['wc'] ?? '';
        $this->parking =       $args['parking'] ?? '';
        $this->creado =        date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function guardar() {
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, parking, creado, vendedores_id)
                  VALUES ( '$this->titulo', $this->precio, '$this->imagen', '$this->descripcion', '$this->habitaciones', '$this->wc', '$this->parking', '$this->creado', '$this->vendedores_id' )";
        

        $resultado = self::$db->query($query);
        debuguear($resultado);
    }

    public static function setDDBB($baseDatos){
        self::$db = $baseDatos;
    }
}