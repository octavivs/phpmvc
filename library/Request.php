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
        $segments = explode('/', $this->getUrl());
        $this->resolveController($segments);
        $this->resolveAction($segments);
        $this->resolveParams($segments);
        var_dump($this->getControllerClassName());
        var_dump($this->getControllerFileName());
        var_dump($this->getActionMethodName());
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

    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }

    public function getParams() {
        return $this->params;
    }

    public function getControllerClassName() {
        return $this->getController() . 'Controller';
    }

    public function getControllerFileName() {
        return $this->getControllerClassName() . '.php';
    }

    public function getActionMethodName() {
        return $this->getAction() . 'Action';
    }

}
