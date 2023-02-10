<?php

require 'funciones.php';
require 'config/ddbb.php';
require __DIR__. '/../vendor/autoload.php';


// Conectar BBDD

$db = conexionDB();
use App\ActiveRecord;
ActiveRecord::setDDBB($db);
