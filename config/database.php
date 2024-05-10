<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'host.docker.internal',
		'login' => 'root',
		'password' => '123abc',
		'database' => 'cms',
		'prefix' => '',
		'encoding' => 'utf8'
	);

	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'host.docker.internal',
		'login' => 'root',
		'password' => '123abc',
		'database' => 'cms',
		'prefix' => '',
		'encoding' => 'utf8'
	);
}