<?php
require_once 'lib/function.php'; 

$login = trim ( $_POST ['login'] );
$password = trim ( $_POST ['password'] );
$login = stripslashes($login);
$password = stripslashes($password);
$login = mysql_real_escape_string($login);
$password = mysql_real_escape_string($password);
$login_date = date ( "Y:m:d h:m:s" );


if (isset ( $_POST ['submit'] )) {
	$loginUserConnection = new ConnectToDb;
	
	$sql = "SELECT * FROM users WHERE login = '{$login}' AND password = '".sha1 ( 'ololo' . $password )."' ";
	
	$result = $loginUserConnection->sqlQuery ( $sql );
	
	$count = mysqli_num_rows ( $result );
	echo ' <br />';
	
	if ($count == 1) {
		$cookie_name = 'Username';
		$cookie_value = $login;
		setcookie("Username", $cookie_value, time() + (86400 * 30), "/php/hw10/"); // 86400 = 1 day
		if(isset($_COOKIE["$cookie_name"])) {
			header("Location: http://paragliding.kh.ua/php/hw10");
		}
		$sql = "UPDATE users
				SET	 update_at= '" . $login_date . "'
				Where `login` = '".$login."'";
		$result = $loginUserConnection->sqlQuery ( $sql );
			
		 
	} else {
		echo 'Wrong username or password <br />';
		echo "Try again or <a href='index.php'>Register</a>";
	}
	
}
require_once 'header.php';	
require_once 'footer.php';

getFooter();