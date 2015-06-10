<?php

namespace phpmvc\library;

class Request {

    protected $url; //Contendrá la url que ingrese el usuario.
    protected $controller; //Controlador de la página.
    protected $default_controller = 'home'; //Controlador por defecto.
    protected $action; //Acción que ejecuta el usuario.
    protected $default_action = 'index'; // Acción por defecto.
    protected $params = []; //Parámatros de la url.

    public function __construct($received_url) {
        $this->url = $received_url;
        var_dump($this->url);
        $segments = explode('/', $this->getUrl());
        var_dump("<br>El contenido del segmento es:<br>");
        var_dump($segments);
    }

    public function getUrl() {
        return $this->url;
    }

    public function resolveController(&$segments) {
        $this->controller = array_shift($segments);
        if (empty($this->controller)) {
            $this->controller = $this->default_controller;
        }
    }

    public function resolveAction(&$segments) {
        $this->action = array_shift($segments);
        if (empty($this->action)) {
            $this->action = $this->default_action;
        }
    }

    public function resolveParams(&$segments) {
        $this->params = $segments;
    }

}
