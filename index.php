<?php

require_once 'controller/loader.php';
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('DIR', __DIR__);
define('REQUEST_URI', $_SERVER['REQUEST_URI']);


require_once 'content/header.php';
require_once 'router/router.php';
