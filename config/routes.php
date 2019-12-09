<?php

return array(
	'edit/update/([0-9]+)' => 'task/update/$1',
	'task/edit/update/([0-9]+)' => 'task/update/$1',
	'task/edit/([0-9]+)' => 'task/edit/$1',
	'edit/([0-9]+)' => 'task/edit/$1',
	'new' => 'task/new',
	'task/new' => 'task/new',
	'task/add' => 'task/add',
	'login' => 'auth/login',
	'task/login' => 'auth/login',
	'auth/logged' => 'auth/logged',
	'logout' => 'auth/logout',
	'task/logout' => 'auth/logout',
	'task/([0-9]+)' => 'task/index/$1',
	'task' => 'task/index/1'
);