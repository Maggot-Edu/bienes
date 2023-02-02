<?php

namespace App;

class Propiedad {

    //BBDD
    protected static $db;
    protected static $columnasDB = [ 'id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'parking', 'creado', 'vendedores_id' ];

    //Errores
    protected static $errores = [];

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
        $atributos = $this->sanitizarAtributos();
        $query = "INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ( \"";
        $query .= join('", "', array_values($atributos));
        $query .= " \" ) ";
        // Sanirtizar Dato
        $resultado = self::$db->query($query);
        return $resultado;
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
    // Identificar atributos de BBDD
    public function atributos() {
        $atributos = [];
        foreach(self::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    // Lista todas las propiedades
    public static function all(){
        $query = "SELECT * FROM propiedades";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    public static function consultarSQL($query) {
        // Consultar BBDD
        $resultado = self::$db->query($query);
        // Iterar resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }
        // Liberar memoria
        $resultado->free();
        // Devolver resltados
        return $array;
    }
    protected static function crearObjeto($registro) {
        $objeto = new self;
        foreach($registro as $key => $value) {
            if (property_exists( $objeto, $key )) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

}