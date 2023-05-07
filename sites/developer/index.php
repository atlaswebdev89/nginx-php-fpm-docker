<?php

use Tracy\Debugger;
use MyApp\Common\Components\LoadEnv;

const BASE_PATH = __DIR__;
const APP_PATH  = BASE_PATH . '/app';
const LOGS      = BASE_PATH . '/app/logs';

require_once(BASE_PATH . '/vendor/autoload.php');

// debugBar tracy and pretty errors views
Debugger::enable();

try {
    (new LoadEnv(BASE_PATH));
} catch (Exception $e) {
    echo $e->getMessage();
}

if (getenv("APP_ENV") === 'dev') {
    error_reporting(E_ALL);
    // Вывод ошибок
    ini_set('display_errors', 1);
    // Включение лога ошибок и указания файла для записи.
    // Обязательно проверять права доступа на файл лога!!!
    ini_set('log_errors', 'On');
    ini_set('error_log', LOGS . '/php_errors.log');
}

define("APP_DEBUG", getenv("APP_DEBUG") === 'true');
define("APP_ENV", getenv("APP_ENV"));
define("YII_DEV_EMAIL", getenv("YII_DEV_EMAIL") ?? "");

$b = 500;
$c = null;

$a = ($c) ?? '100';
echo $a;
echo YII_DEV_EMAIL;

try {
    echo "Hello World";
    error_log("BAD");
} catch (Throwable $e) {
    echo $e->getMessage();
}
