<?php
function getFooter() {
		echo "<div class='text-center' id='footer'>";
		echo "<a href='mailto:misterjaaay@gmail.com'>&copy; <?php echo date('Y');?> jay </a>";
		echo "</div>";
		echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>";
		
		echo "<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>";
		
		echo '<script>
	$(document).ready(function(){
		 $("#loginBtn").click(function(){
		        $("#myModal").modal();
		    });
		 $("#registerBtn").click(function(){
		        $("#regModal").modal();
		    });
		 $("#logoutBtn").click(function(){
		
			 alert("11");
				exit();
		    });
	});'
;
		echo " </script>
</div>
</body>
</html>";
}

?>	

