<?php

class Auth
{
	use TDBConnection;

	public static function isAdmin($login, $password)
	{
		self::connect();

		$select = "SELECT * FROM users WHERE user = 'admin'";

	    $result = self::$conn->query($select);

	    if ($result){
	        $row = $result->fetch_assoc();
	        	
	        if ($login == $row['user'] && $password == $row['password']) {
	            return true;
	        }    
	    }
	}
}