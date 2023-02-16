<?php

namespace App;

class Vendedor extends ActiveRecord {
    protected static $tabla = 'vendedores';
    protected static $columnasDB = [ 'id', 'nombre', 'apellido', 'telefono' ];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    
    public function __construct( $args = [] )
    {
        $this->id =       $args['id'] ?? NULL;
        $this->nombre =   $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar() {
        // Validador de datos
        if (!$this->nombre) {
            self::$errores[] = "Nombre es Obligatorio";
        }
        if (!$this->apellido) {
            self::$errores[] = "Apellido es Obligatorio";
        }
        if (!$this->telefono) {
            self::$errores[] = "Teléfono es Obligatorio";
        }
        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = "Teléfono Formato no Válido 9 digitos";
        }
        return self::$errores;
    }
}