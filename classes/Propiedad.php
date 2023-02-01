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

    public static function setDDBB($baseDatos){
        self::$db = $baseDatos;
    }

    public function __construct( $args = [] )
    {
        $this->id =            $args['id'] ?? '';
        $this->titulo =        $args['titulo'] ?? '';
        $this->precio =        $args['precio'] ?? '';
        $this->imagen =        $args['imagen'] ?? '';
        $this->descripcion =   $args['descripcion'] ?? '';
        $this->habitaciones =  $args['habitaciones'] ?? '';
        $this->wc =            $args['wc'] ?? '';
        $this->parking =       $args['parking'] ?? '';
        $this->creado =        date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function guardar() {

        // Sanirtizar Datos
        $atributos = $this->sanitizarAtributos();

        $resultado = self::$db->query($query);
        //debuguear($resultado);
        return $resultado;
    }
    // Identificar atributos de BBDD
    public function atributos() {
        $atributos = [];
        foreach(self::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
    // Subir imagen
    public function setImagen($imagen) {
        // Asigna al atributo de imagen el nombre de la imagen
        if($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Validacion
    public static function getErrores() {
        return self::$errores;
    }
    // Identificar atributos de BBDD
    public function atributos() {
        $atributos = [];
        foreach(self::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public static function setDDBB($baseDatos){
        self::$db = $baseDatos;
    }
}