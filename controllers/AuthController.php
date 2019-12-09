<?php

require_once ROOT . '/models/Auth.php';

class AuthController
{
	
	public function actionLogin()
	{

		require_once ROOT . '/views/auth/login.php';
	}

	public function actionLogged()
	{
		if(isset($_POST['login'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			if(Auth::isAdmin($login, $password)) {
				$_SESSION['name'] = 'admin';
			}
		}
		require_once ROOT . '/views/auth/logged.php';
	}

	public function actionLogout()
	{
		unset($_SESSION['name']);
		require_once ROOT . '/views/auth/logout.php';
	}
}