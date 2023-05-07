<?php

$message = "Hello World" . PHP_EOL;
$fp = fopen("php://output", "a");
if ($fp) {
	fwrite($fp, $message);
}
fclose($fp);
exit("done success" . PHP_EOL);
