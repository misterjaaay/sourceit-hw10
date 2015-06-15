<?php
require_once 'lib/function.php';
require_once 'header.php';
require_once 'footer.php';
?>

<div class="row text-center">
  <div class="jumbotron">
    <h1>Welcome,<?php echo ($_COOKIE["Username"] !='' ? $_COOKIE['Username'] : 'Guest');  ?></h1>
    <p>This page will grow as we add more and more components from Bootstrap...</p>
  </div>
	<?php getLastPosts();?>

</div>

<?php getFooter();?>