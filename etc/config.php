<?php

$_urlBase = "http://mediocurso.test/";
$host = 'localhost';
$namedb = 'dbmediocurso';
$userdb = 'root';
$passworddb = '2003';

function get_UrlBase($arg1)
{
    return $GLOBALS['_urlBase'] . $arg1;
}

function get_views($arg1)
{
    return $GLOBALS['_urlBase'] . 'views/' . $arg1;
}

function get_models($arg1)
{
    return $GLOBALS['_urlBase'] . 'models/' . $arg1;
}
function get_controllers($arg1)
{
    return $GLOBALS['_urlBase'] . 'controllers/' . $arg1;
}
