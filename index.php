<?php
error_reporting(E_ALL);
require ("frontendHandler.php")
?>
<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="de">
	<head>
		<meta charset="UTF-8">
		<title>Par5 - Minigolfsimulation</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->

		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!--<link rel="stylesheet" href="css/skel.css" />-->
		<link rel="stylesheet" href="css/style.css" />
		<!--<link rel="stylesheet" href="css/style-xlarge.css" />-->
	<!--	<link rel="shortcut icon" href="favicon.ico">-->

	</head>
	<body <class="landing">

		<!-- Header -->
			<header id="header" class="header-home">
				<a href=index.php?page=home><img src="images/logo.png" style="width: 120px; margin: 15px 15px 20px; float: left;"></a>
				<!--<nav id="nav">
					<ul>
						<li><a href="index.html">Start</a></li>
						<li><a href="function.html">Funktionen</a></li>
						<li><a href="gallery.html">Gallerie</a></li>
						<li><a href="editor.html">Editor</a></li>
						<li><a href="#" class="button special">Login</a></li>
					</ul>
				</nav>-->
				<nav id="nav">
        <ul id="nav" class="clearLeft">
            <?= getNavigation()?>

        </ul>
            </nav>
			</header>

		<!-- Banner -->
	<!--	<main id="inhaltsbereich">-->
				<!--<div id="content">-->
		<?php getContent();?>
	<!--</div>-->
    <div>
    </div>


		<!--</main>-->

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="col-lg-4 col-lg-push-1 col-md-4 col-md-push-1 col-xs-12">
								<h3>Community & mehr</h3>
								<ul class="unstyled">
									<li><a href="http://mein-auwi.de/">minigolf-welt.de</a></li>
									<li><a href="http://www.3d-minigolf.at/">3d-minigolf.at/</a></li>
									<li><a href="https://www.minigolfshop.de/">minigolfshop.de</a></li>
								</ul>
							</section>
							<section class="col-lg-4 col-lg-push-1 col-md-4 col-md-push-1 col-xs-12">
								<h3>Regeln</h3>
								<ul class="unstyled">
									<li><a href="https://de.wikipedia.org/wiki/Minigolf">Wikipedia</a></li>
									<li><a href="https://www.minigolfsport.de">Minigolfsport</a></li>
									<li><a href="www.minigolf-hessen.de/">Minigolf Hessen</a></li>
								</ul>
							</section>
							<section class="col-lg-4 col-lg-push-1 col-md-4 col-md-push-1 col-xs-12">
								<h3>THM</h3>
								<ul class="unstyled">
									<li><a href="thm.de">TH Mittelhessen</a></li>
									<li><a href="#">Altes Minigolfprojekt</a></li>
									<li><a href="#">Prof. Euler</a></li>
								</ul>
							</section>
						</div>
					</section>
					<div class="row">
						<div class="col-lg-8 col-md-8 col-xs-12">
							<ul class="copyright">
								<li>&copy; Par5. All rights reserved.</li>
							</ul>
						</div>
						<div class="col-lg-4 col-md-4 col-xs-12">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>

	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>