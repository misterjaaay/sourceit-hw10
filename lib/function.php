<?php
require_once 'class/ConnectToDB.php';
/* main menu */
class MenuCreate {
	public function createMainMenu($arrayMenu) {
		if (! is_array ( $arrayMenu ) || ! count ( $arrayMenu )) {
			return;
		}
		
		echo '<ul class="nav navbar-nav">';
		foreach ( $arrayMenu as $key => $value ) {
			echo '<li >' . "<a href='category.php?id={$key}'>";
			echo $value;
			echo '</a></li>';
		}
		echo '</ul>';
	}
	public function getAllCategories() {
		$menuConnect = new ConnectToDB ();
		$result1 = array ();
		
		$sql = "SELECT id, name FROM  category" or die ( "Error in the consult.." . mysqli_error ( $link ) );
		$result = $menuConnect->sqlQuery ( $sql );
			
		while ( $row = mysqli_fetch_array ( $result ) ) {
			$result1 [$row ['id']] = $row ["name"];
		}
		return $result1;
	}
}
/* getPosts */
function getPosts() {
	$postConnect = new ConnectToDB ();
	
	if (! isset ( $_GET ) || ! isset ( $_GET ['id'] )) {
		exit ( 'Wrong category id' );
	}
	$id = $_GET ['id'];
	if (! is_numeric ( $id )) {
		exit ( 'Wrong category id' );
	}
	
	$sql = "SELECT * FROM post where id = '" . $_GET ['id'] . "' ";
	
	$result = $postConnect->sqlQuery ( $sql );
	if (mysqli_num_rows ( $result ) > 0) {
		// output data of each row
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			echo "<h2> " . $row ["title"] . " </h2>" . $row ["text"] . "<br><br>";
		}
	} else {
		exit ( "0 results" );
	}
}

/* getCategory */
function getCategory() {
	$categoryConnect = new ConnectToDB ();
	if (! isset ( $_GET ) || ! isset ( $_GET ['id'] )) {
		exit ( 'Wrong category id' );
	}
	$id = $_GET ['id'];
	if (! is_numeric ( $id )) {
		exit ( 'Wrong category id' );
	}
	$sql = "SELECT id, title, description, text FROM post where category_id = '" . $_GET ['id'] . "'";
	$result = $categoryConnect->sqlQuery ( $sql );
	if (mysqli_num_rows ( $result ) > 0) {
		// output data of each row
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			$post_id = $row ["id"];
			$post_title = $row ["title"];
			echo " <h2> <a href='post.php?id=$post_id'>$post_title</a> </h2>";
			echo "id: " . $row ["id"] . "  " . $row ["title"] . " " . $row ["description"] . "<br><br>";
		}
	} else {
		exit ( "0 results" );
	}
}
/*get last cat*/
function getLastPosts() {
	$lastPostConnect = new ConnectToDB ();
	
	$sql = "SELECT id, title, description, text FROM post limit 5";
	$result = $lastPostConnect->sqlQuery ( $sql );
	
	if (mysqli_num_rows ( $result ) > 0) {
		// output data of each row
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			echo "<h2> " . $row ["title"] . " </h2>" . $row ["text"] . "<br><br>";
		}
	} else {
		exit ( "0 results" );
	}
}