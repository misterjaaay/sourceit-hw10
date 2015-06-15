<?php
require_once 'lib/function.php'; 
require_once 'header.php';
require_once 'footer.php';

$new_login = trim ( $_POST ['new_login'] );
$email = trim ( $_POST ['email'] );
$new_password = trim ( $_POST ['new_password'] );
$r_password = trim ( $_POST ['new_r_password'] );
$registration_date = date ( "Y:m:d h:m:s" );

$new_login = stripslashes($new_login);
$email = stripslashes($email);
$new_password = stripslashes($new_password);
$r_password = stripslashes($r_password);
$new_login = mysql_real_escape_string($new_login);
$email = mysql_real_escape_string($email);
$new_password = mysql_real_escape_string($new_password);
$r_password = mysql_real_escape_string($r_password);

if (isset ( $_POST ['register'] )) {
	$registerUserConnection = new ConnectToDb;
	
	if ($new_password === $r_password) {
		$new_password = sha1 ( 'ololo' . $new_password );
	} else {
		echo "passwords do not match";
		die ();
	}
	if (! (filter_var ( $email, FILTER_VALIDATE_EMAIL ))) {
		echo "This ($email) email address is not valid.";
		die();
	}
	
	if (!preg_match("#^[A-Za-z0-9]+$#",$new_login)){
		echo "Please use letters or digits"; 
		die();
	} 
	
	$sql = "SELECT * FROM users WHERE `email` = '{$email}' OR `login` = '{$new_login}'";
	$result = $registerUserConnection->sqlQuery ( $sql );

	$count = mysqli_num_rows ( $result );

	if ($count >= 1) {
		echo "USER OR EMAIL is occupied";
		die ();
	} else {
		$sql = "INSERT INTO users(login, password, email, create_at )
					 VALUES ('" . $new_login . "','" . $new_password . "', '" . $email . "', '" . $registration_date . "')";
		$result = $checkUserConnection->sqlQuery ( $sql );
		
		if ($result) {
			echo "Welcome <br />";
			mail ( $email, "Сообщение с сайта " . $_SERVER['SERVER_NAME'], "Приветствуем Вас на сайте " . $_SERVER['SERVER_NAME'] );
			echo "Email has been set to " .$email. "<br /> Now you can <a href='login.php'>log in</a>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
	
getFooter();