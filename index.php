<?php

use phpmvc\library\Request;

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

if (empty($url)) {
    $user_url = "";
} else {
    $user_url = $url;
}

$request = new Request($url);

function __autoload($qClassName) {
    $global_space = "phpmvc";
    $lastNsPos = strripos($qClassName, '\\');
    $className = substr($qClassName, $lastNsPos + 1);
    $trimed = str_replace(array($global_space . '\\', $className), '', $qClassName);
    $route = str_replace('\\', '/', $trimed);

    require $route . $className . ".php";
}
