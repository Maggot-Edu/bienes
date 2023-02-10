<?php

namespace App;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columnasDB = [ 'id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'parking', 'creado', 'vendedores_id' ];

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
        $this->id =            $args['id'] ?? NULL;
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

    public function validar() {
        // Validador de datos
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
        if (!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        }
        if ( strlen( $this->descripcion ) < 50) {
            self::$errores[] = "Debes añadir una descripción con mas de 50 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir numero de habitaciones";
        }
        if (!$this->wc) {
            self::$errores[] = "Debes añadir numero de wc";
        }
        if (!$this->parking) {
            self::$errores[] = "Debes añadir numero de parking";
        }
        if (!$this->vendedores_id) {
            self::$errores[] = "Debes elegir un vendedores";
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }
        return self::$errores;
    }
}