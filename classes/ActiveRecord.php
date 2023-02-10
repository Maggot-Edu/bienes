<?php

namespace App;

class ActiveRecord{
    //BBDD
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    //Errores
    protected static $errores = [];
    
    public static function setDDBB($baseDatos){
        self::$db = $baseDatos;
    }

    public function guardar() {
        if(!is_null($this->id)) {
            // Actualizar
            $this->actualizar();
        } else {
            // Creando un nuevo registro
            $this->crear();
        }
    }
    public function crear() {
        $atributos = $this->sanitizarAtributos();
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ( \"";
        $query .= join('", "', array_values($atributos));
        $query .= " \" ) ";
        // Sanirtizar Dato
        $resultado = self::$db->query($query);
        if ($resultado) {
            // Redireccion de usuario
            header('Location: /bienes/admin?resultado=1');
        }
    }
    public function actualizar() {
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            // Redireccion de usuario
            header('Location: /bienes/admin?resultado=2');
        } 
    }
    // Eliminar un regisro
    public function eliminar() {
        //Elimina propiedad
        $query = "DELETE FROM " . static::$tabla . " WHERE id = ". self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->borrarImagen();
            // Redireccion de usuario
            header('Location: /bienes/admin?resultado=3');
        } 
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
        // Elimina imagen prevbia
        if(!is_null($this->id)) {
            $this->borrarImagen();
        }
        // Asigna al atributo de imagen el nombre de la imagen
        if($imagen) {
            $this->imagen = $imagen;
        }
    }
    // Eliminar imagen
    public function borrarImagen() {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }
    // Validacion
    public static function getErrores() {
  
        return static::$errores;
    }
    public function validar() {
        static::$errores = [];
        return static::$errores;
    }
    // Identificar atributos de BBDD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    // Lista todas las propiedades
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    public static function consultarSQL($query) {
        // Consultar BBDD
        $resultado = self::$db->query($query);
        // Iterar resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }
        // Liberar memoria
        $resultado->free();
        // Devolver resltados
        return $array;
    }
    // Busca propiedad ID
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id=$id";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }
    protected static function crearObjeto($registro) {
        $objeto = new static;
        foreach($registro as $key => $value) {
            if (property_exists( $objeto, $key )) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
    // Sincroniza el objeto en momoria con los cambios realizados por el usuario
    public function sincronizar( $args = [] ) {
        foreach($args as $key => $value){
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}