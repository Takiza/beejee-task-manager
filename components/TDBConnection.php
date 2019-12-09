<?php

Trait TDBConnection
{
	private static $conn;

	private static function connect(){

		//Singletone
		if(self::$conn === NULL) {
			$host = 'localhost';
			$database = 'beejee_tasks';
			$user = 'root';
			$password = '';	

			self::$conn = new mysqli($host, $user, $password, $database);
		}

	    if (self::$conn->connect_error) {
	        die("Connection error");
	    }
	}
}