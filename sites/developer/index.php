<?php
declare(strict_types=1);

use Tracy\Debugger;
use MyApp\Common\Components\LoadEnv;
use MyApp\Common\Components\Session;

const BASE_PATH = __DIR__;
const APP_PATH  = BASE_PATH . '/app';
const LOGS      = BASE_PATH . '/app/logs';

require_once(BASE_PATH . '/vendor/autoload.php');

//// debugBar tracy and pretty errors views
Debugger::enable(Debugger::Development);


try {
    (new LoadEnv(BASE_PATH));
} catch (Exception $e) {
    echo $e->getMessage();
}


if (getenv("APP_ENV") === 'dev') {
    echo getenv("APP_ENV");
    error_reporting(E_ALL);
    // Вывод ошибок
    ini_set('display_errors', 'on');
//    ini_set('display_errors', 1);

    ini_set('html_errors', 'on');
    // Включение лога ошибок и указания файла для записи.
    // Обязательно проверять права доступа на файл лога!!!
    ini_set('log_errors', 'On');
    ini_set('error_log', LOGS . '/php_errors.log');

    // НАСТРОЙКИ ДЛЯ СЕССИИ

    //Время жизни сесии в секундах
    ini_set('session.gc_maxlifetime', 1440);
    //Настройка планировщика удаления файлов сессий
    //Вероятность запуска GC при каждом запуске скрипта  - session.gc_probability / session.gc_divisor
    //По умолчанию - 1/100. Соответственно, если задать session.gc_probability = 0 GC не запустится никогда
    ini_set('session.gc_probability', 100);
    ini_set('session.gc_divisor', 100);
    //Путь до каталога с файлами сессий
    ini_set('session.save_path', BASE_PATH . '/sessions');
    // Время жизни куки в секундах
    // 0 - по завершению текущего сеанса браузера (при закрытии браузера не всегда сеанс заканчивается. Зависит от браузера))
    ini_set('session.cookie_lifetime', 0);
    echo "DONE";
}

define("APP_DEBUG", getenv("APP_DEBUG") === 'true');
define("APP_ENV", getenv("APP_ENV"));
define("YII_DEV_EMAIL", getenv("YII_DEV_EMAIL") ?? "");


Session::startSession();
var_dump($_SESSION);
if (!isset($_SESSION['NAME'])) {
    $_SESSION['NAME'] = "ATLAS";
} else {
    echo "SESSION DONE";
}

// Типы и установка кук
$name = "atlas";
$age  = 35;
$age  = (string)$age;

$data = ['one' => 'one', 'two' => 'two', 'three' => 'three'];
unset($data['one']);
$array = ['one', 'two', 'three'];

unset($array[1]);

echo "<pre>";
print_r($array);
echo "</pre>";

echo "<pre>";
print_r($data);
echo "</pre>";

echo gettype($age);
setcookie("name", $name);
setcookie("age", $age, time() + 3600);  // срок действия - 1 час (3600 секунд)
echo $ghjsdf;


setcookie("lang[1]", "PHP");
setcookie("lang[2]", "C#");
setcookie("lang[3]", "Java");


$b = 500;
$c = null;

$a = ($c) ?? '100';
echo $a;

try {
    echo "Hello World";
    error_log("BAD");
} catch (Throwable $e) {
    echo $e->getMessage();
}
