<?php
define('APP_LOCALE', 'es_ES');
define('APP_NAME', 'Keep Clone');
define('APP_REGION', 'es_CL');
define('APP_TIMEZONE', 'America/Santiago');
define('APP_URL', 'https://keep.dev/');
// define('APP_URL', 'https://keep.epizy.com/');

define('ACTION_DEFAULT', 'index');
define('CONTROLLER_DEFAULT', 'HomeController');

ini_set('date.timezone', APP_TIMEZONE);
setlocale(LC_ALL, APP_LOCALE);
setlocale(LC_MONETARY, APP_REGION);

// Hide errors:
// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);
// error_reporting(0);

// Show errors:
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
