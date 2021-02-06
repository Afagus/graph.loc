<?php
ini_set('memory_limit', '2048M');

define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('DIR', __DIR__);
define('REQUEST_URI', $_SERVER['REQUEST_URI']);

require_once 'loader.php';
require_once 'router/router.php';







