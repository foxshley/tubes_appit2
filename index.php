<?php
    session_start();

    define("APP_NAME", "Stella System");
    define("BASE_URL", "http://tubes.test/");

    $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $page = $uriSegments[1] == "" ? "home" : $uriSegments[1];

    if(!file_exists('pages/'.$page.".php"))
        header("location: ". BASE_URL . '404', true, 301); 

    include("template.php");