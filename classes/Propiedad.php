<?php

namespace App;

class Propiedad {

    //BBDD
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'parking', 'creado', 'vendedores_id'];

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
        $this->imagen =        $args['imagen'] ?? 'imagen.jpg';
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

        // Insertar datos
        $query = "INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join(', ', array_values($atributos));
        $query .= " ')";
        debuguear($query);
        $resultado = self::$db->query($query);
        debuguear($resultado);
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
}