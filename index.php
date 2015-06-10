<?php

use phpmvc\library\Request;

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

if (empty($url)) {
    $user_url = "";
} else {
    $user_url = $url;
}

$request = new Request($url);

function __autoload($qualified_class_name) {
    $vendor_name = "phpmvc";
    $class_name_position = strripos($qualified_class_name, '\\') + 1;
    $class_name = substr($qualified_class_name, $class_name_position);
    $namespaces = str_replace(array($vendor_name . '\\', $class_name), '', $qualified_class_name);
    $route = str_replace('\\', '/', $namespaces);

    require $route . $class_name . ".php";
}
