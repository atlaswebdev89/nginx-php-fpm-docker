<?php

namespace MyApp\Common\Components;

use Dotenv\Dotenv;

class LoadEnv
{
	public Dotenv $dotEnv;
	public function __construct($path)
	{
		$this->dotEnv = Dotenv::createUnsafeImmutable($path);
		$this->dotEnv->load();
	}
}
