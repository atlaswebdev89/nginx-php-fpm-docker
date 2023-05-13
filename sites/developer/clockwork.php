<?php
const BASE_PATH = __DIR__;
// clockwork.php
require_once(BASE_PATH . '/vendor/autoload.php');
$clockwork = \Clockwork\Support\Vanilla\Clockwork::init(['storage_files_path' => __DIR__ . '/storage/clockwork']);
$clockwork->returnMetadata();