<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$ar = "atlas";
$c  = "closure";
$b  = function (string $ar) use ($c) {
    echo $ar;

    var_dump(debug_backtrace());

    return nest() . "{$ar}";
};
echo $rel;
$msg = $b("atlas");
echo $msg;
//phpinfo();
function nest()
{
//    var_dump(debug_backtrace());
    echo "<pre>";
    debug_print_backtrace();
    echo "</pre>";

    return "Hello";
}