<?php
require_once 'loader.php';


$rootFolder = str_replace(DOCUMENT_ROOT, '', str_replace('\\', '/', DIR));
//$rootFolder = substr($rootFolder, 1); эта строка почему-то нужна для работы роутера на другом компе
$killSlash = trim(REQUEST_URI, '/');
$stringURI = str_replace($rootFolder, '', $killSlash);
$stringURI = trim($stringURI, '/' );

$stringURI = explode('/', $stringURI);

define('ROUTE', $stringURI);
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