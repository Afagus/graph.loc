<?php
require_once 'controller/loader.php';


$rootFolder = str_replace(DOCUMENT_ROOT, '', str_replace('\\', '/', DIR));


$rootFolder = substr($rootFolder, 1);

$temp = rtrim(ltrim(REQUEST_URI, '/'), '/');


$arrayQuery = str_replace($rootFolder, '', $temp);


$arrayQuery = substr($arrayQuery, 1 );


$arrayQuery = explode('/', $arrayQuery);


define('ROUTE', $arrayQuery);
$filePath = ROUTE[0];



if (!$filePath) {
    $filePath = 'controller/mainpage.php';
} else {
    $filePath = 'controller/' . ROUTE[0] . '.php';
    if (!file_exists($filePath)) {
        $filePath = 'controller/error404.php';
    }
}
require_once $filePath;