<?php

namespace phpmvc\library;

class Request {

    protected $url; //Contendrá la url que ingrese el usuario.
    protected $controller; //Controlador de la página.
    protected $default_controller = 'home'; //Controlador por defecto.
    protected $action; //Acción que ejecuta el usuario.
    protected $default_action = 'index'; // Acción por defecto.
    protected $params = array(); //Parámatros de la url.

    public function __construct($url) {
        
    }

}
