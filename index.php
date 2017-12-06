<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>SistemaContable</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<script type="text/javascript">
			function login(){
				alert("Hola");
			}
		</script>
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>Sistema Contable</h1>
						<p>Fernando &nbsp;&bull;&nbsp; Jessica &nbsp;&bull;&nbsp; Kevin</p>
						<nav>
							<ul>
								<li class="tooltip"><a href="/phpmyadmin" class="icon fa-user" onclick="login()"><span class="label tooltiptext">phpMyAdmin</span></a></li>

							<!--
								<li><a href="#" class="icon fa-archive"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
								<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
								<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>!
							-->
							</ul>
							<ul>
								<div class="login-card">
			    				<h1>Log-in</h1><br>
			  <form>
			    <input type="text" name="user" placeholder="Username">
			    <input type="password" name="pass" placeholder="Password">
			    <input type="submit" name="login" class="login login-submit" value="login">
			  </form>

			  <div class="login-help">
			    <a href="#">Register</a> • <a href="#">Forgot Password</a>
			  </div>
			</div>
							</ul>
						</nav>
					</header>


				<!-- Footer -->
					<footer id="footer">
						<span class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>
					</footer>

			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	</body>
</html>
