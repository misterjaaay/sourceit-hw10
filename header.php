<?php
require_once 'lib/function.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" type="text/css" rel="stylesheet">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title><?php echo $_SERVER['HTTP_REFERER'];?></title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div id="wrapper">
		<div id='content' class="container">
			<div class="row clearfix">
				<div class="col-md-12 column">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle"
								data-toggle="collapse"
								data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span><span
									class="icon-bar"></span><span class="icon-bar"></span><span
									class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php">Home</a>
						</div>
						<div class="collapse navbar-collapse"
							id="bs-example-navbar-collapse-1">
						<?php
						$mainMenu = new MenuCreate ();
						$categories = $mainMenu->getAllCategories ();
						$mainMenu->createMainMenu ( $categories );
						?>
						<form class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<input class="form-control" type="text" />
								</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
							<ul class="nav navbar-nav navbar-right">
								<li><button type="submit" id="logoutBtn"
										class="btn btn-default btn-lg">logout</button></li>
								<li>
									<!-- Trigger the modal with a button -->
									<button type="button" class="btn btn-default btn-lg"
										id="loginBtn">Login</button> <!-- Modal -->
									<div class="modal fade" id="myModal" role="dialog">
										<div class="modal-dialog">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header" style="padding: 35px 50px;">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4>
														<span class="glyphicon glyphicon-lock"></span> Login
													</h4>
												</div>
												<div class="modal-body" style="padding: 40px 50px;">
													<form role="form" action="login.php" method="POST">
														<div class="form-group">
															<label for="usrname"><span
																class="glyphicon glyphicon-user"></span> Username</label>
															<input type="text" name="login" required
																class="form-control" id="usrname"
																placeholder="Enter login">
														</div>
														<div class="form-group">
															<label for="psw"><span
																class="glyphicon glyphicon-eye-open"></span> Password</label>
															<input type="password" name="password" required
																class="form-control" id="psw"
																placeholder="Enter password">
														</div>
														<div class="checkbox">
															<label><input type="checkbox" value="" checked>Remember
																me</label>
														</div>
														<button type="submit" name="submit"
															class="btn btn-success btn-block">
															<span class="glyphicon glyphicon-off"></span> Login
														</button>
													</form>
												</div>
												<div class="modal-footer">
													<button type="submit"
														class="btn btn-danger btn-default pull-left"
														data-dismiss="modal">
														<span class="glyphicon glyphicon-remove"></span> Cancel
													</button>
													<p>
														Not a member? <a href="#">Sign Up</a>
													</p>
													<p>
														Forgot <a href="#">Password?</a>
													</p>
												</div>
											</div>

										</div>
									</div>
								</li>
								<li>
									<!-- Trigger the modal with a button -->
									<button type="button" class="btn btn-default btn-lg"
										id="registerBtn">Register</button> <!-- Modal -->
									<div class="modal fade" id="regModal" role="dialog">
										<div class="modal-dialog">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header" style="padding: 35px 50px;">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4>
														<span class="glyphicon glyphicon-lock"></span> Register
													</h4>
												</div>
												<div class="modal-body" style="padding: 40px 50px;">
													<form role="form" action="register.php" method="POST">
														<div class="form-group">
															<label for="usrname"><span
																class="glyphicon glyphicon-user"></span> Username</label>
															<input class="form-control" type="text" name="new_login"
																id="usrname" placeholder="login" required="" />
														</div>
														<div class="form-group">
															<label for="email"><span
																class="glyphicon glyphicon-envelope"></span> Еmail</label>
															<input class="form-control" type="email" name="email"
																id="email" placeholder="Enter email" required="" />
														</div>
														<div class="form-group">
															<label for="psw"><span
																class="glyphicon glyphicon-eye-open"></span> Password</label>
															<input class="form-control" type="password"
																name="new_password" id="psw"
																placeholder="Enter password" required="" />
														</div>
														<div class="form-group">
															<label for="r_psw"><span
																class="glyphicon glyphicon-eye-open"></span> Password</label>
															<input class="form-control" type="password"
																name="new_r_password" id="r_psw"
																placeholder="Repeat password" required="" />
														</div>
														<div class="checkbox">
															<label><input type="checkbox" value="" checked>Remember
																me</label>
														</div>
														<button type="submit" name="register"
															class="btn btn-success btn-block">
															<span class="glyphicon glyphicon-off"></span> register
														</button>
													</form>
												</div>
												<div class="modal-footer">
													<button type="submit"
														class="btn btn-danger btn-default pull-left"
														data-dismiss="modal">
														<span class="glyphicon glyphicon-remove"></span> Cancel
													</button>
													<p>
														Not a member? <a href="#">Sign Up</a>
													</p>
													<p>
														Forgot <a href="#">Password?</a>
													</p>
												</div>
											</div>

										</div>
									</div>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>