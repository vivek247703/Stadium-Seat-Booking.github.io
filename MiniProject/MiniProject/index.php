<!DOCTYPE HTML>

<html>
	<head>
		<title>Stadium Seat Booking System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="index is-preload">
		<?php
    require('dbconnect.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1 id="logo"><a href="index.php">Stadium <span>Seat Booking System</span></a></h1>
					<nav id="nav">
						<ul>
							<li class="current"><a href="#">Welcome</a></li>
							<li class="submenu">
								<a href="#">Menu</a>
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="login.php">Book Tickets</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</li>
							<li><a href="registration.php" class="button primary">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">

					
					<div class="inner" >

						<div class="login-content">
			<form action="" method="post">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="text" name="username" placeholder="Username" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" name="password" placeholder="password" class="input">
            	   </div>
            	</div>
            	<br>
            	<input type="submit" name="submit" class="btn" value="Login">
            </form>
        </div>

					</div>

				</section>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
<?php
    }
?>
	</body>
</html>