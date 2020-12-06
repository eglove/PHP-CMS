<?php
function urlFor($scriptPath): string
{
    if ($scriptPath[0] != '/') {
        $scriptPath = '/' . $scriptPath;
    }
    return WWW_ROOT . $scriptPath;
}

function u($string = ""): string
{
    return urlencode($string);
}

function raw_u($string = ""): string
{
    return rawurlencode($string);
}

function h($string = ""): string
{
    return htmlspecialchars($string);
}

function error404()
{
    header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');
    exit();
}

function error500()
{
    header($_SERVER['SERVER_PROTOCOL'] . '500 Internal Server Error');
    exit();
}

function redirectTo($location)
{
    header('Location: ' . $location);
    exit();
}

function isPostRequest()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function isGetRequest()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}