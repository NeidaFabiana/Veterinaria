<?php


unset($config);
$config = new stdClass();
$config->defaultClass = "Home";
$config->base_url = '/Neida/Veterinaria/Veterinaria/';
$config->url = 'http://'.$_SERVER['HTTP_HOST']. $config->base_url;
$config->asset = $config->base_url . 'view/templates/';
$config->template = 'default';


if ($_SERVER['HTTP_HOST'] == "localhost") {
    $config->dbuser = 'root'; //nomedoaluno
    $config->dbpassword = ''; //senha
    $config->dbname = 'mydb'; //nomedoaluno
    $config->dbhost = 'localhost'; //servidor (127.0.0.1)
    $config->dbdrive = 'mysql'; //servidor (127.0.0.1)
} else {
    $config->dbuser = '2018_neida'; //nomedoaluno
    $config->dbpassword = '49373254'; //senha
    $config->dbname = '2018_neida'; //nomedoaluno
    $config->dbhost = '127.0.0.1'; //servidor (127.0.0.1)
    $config->dbdrive = 'mysql'; //servidor (127.0.0.1)
}

