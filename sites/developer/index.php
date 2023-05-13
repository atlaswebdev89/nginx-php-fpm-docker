<?php
declare(strict_types=1);

use Tracy\Debugger;
use MyApp\Common\Components\LoadEnv;
use MyApp\Common\Components\Session;
use Clockwork\Support\Vanilla\Clockwork;

// Monolog
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\HtmlFormatter;

const BASE_PATH = __DIR__;
const APP_PATH  = BASE_PATH . '/app';
const LOGS      = BASE_PATH . '/app/logs';

require_once(BASE_PATH . '/vendor/autoload.php');

// init clockwork debuger
$clockwork = Clockwork::init([
    'api'                => '/clockwork.php?request=',
    'storage_files_path' => __DIR__ . '/storage/clockwork',
    'register_helpers'   => true
]);

$username = "atlas";
clock('Log', 'something'); // это debug level
clock()->info("User {$username} logged in!");
clock()->error("User {$username} logged in!");
clock()->warning("User {$username} logged in!");
clock()->notice("User {$username} logged in!");

clock()->addDatabaseQuery('SELECT * FROM users WHERE id = 1', [], 50);

//// debugBar tracy and pretty errors views
Debugger::enable(Debugger::Development);

// Monolog
$monolog     = new Logger('main-logger');
$stream      = new StreamHandler(BASE_PATH . '/logs/app.log', Level::Debug);
$stream_html = new StreamHandler(BASE_PATH . '/logs/log.html', Level::Debug);
$monolog->pushHandler($stream);
$monolog->pushHandler($stream_html->setFormatter(new HtmlFormatter));
$monolog->pushProcessor(function ($record) {
    $record->extra['dummy'] = 'Hello world!';

    return $record;
});

// write in log file
$monolog->info("START MEssage", ['name' => 'atlas']);
// write in log file
$monolog->error("Error Message", ['name' => 'atlas']);
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


$array = [
    'a'    => 1,
    'b'    => 2,
    'c'    => 3,
    'name' => 'atlas',
];

['c' => $c, 'a' => $a] = $array;
['name' => $atlas] = $array;
echo $atlas;


//for ($i = 0; $i < 1000000; $i++) {
//
//}

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

    $clockwork->requestProcessed();
} catch (Throwable $e) {
    echo $e->getMessage();
}
