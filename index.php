<?php
session_start();
error_reporting(E_ALL);
require ("frontendHandler.php")
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="UTF-8">
		<title>Par5 - Minigolfsimulation</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->

		<link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/sweetalert2.min.css" />
		<!--<link rel="stylesheet" href="css/skel.css" />-->
		<link rel="stylesheet" href="css/style.css" />
		<!--<link rel="stylesheet" href="css/style-xlarge.css" />-->
	<!--	<link rel="shortcut icon" href="favicon.ico">-->








	</head>
	<body class="landing" onload="init()">
		<!-- Header -->
        <header id="header" class="header-home">
				<link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32">
					<a href=index.php?page=home><img src="images/logo.png" style="width: 120px; margin: 15px 15px 20px; float: left;"></a>


			<nav id="" >
				<ul id="" class="nav">


<?php 


if (isset($_SESSION['u_id'])) {


	echo "<form action='includes/logout.inc.php' method='POST'>";
	if (isset($_SESSION['u_id'])) {
		//echo "Du bist eingeloggt!";
	}	echo "<button type='submit' name='submit' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>Logout</button>
		</form>";
}	
else{
?>				
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Hier anmelden!</h4>

      </div>
   
	  <div class="modal-footer">

	  <div class="nav-login">
	 
	 
	 <?php
	  if (isset($_SESSION['u_id'])) {
		  echo "<form action='includes/logout.inc.php' method='POST'>";
		  if (isset($_SESSION['u_id'])) {
			  echo "Du bist eingeloggt!";
		  }	echo "<button type='submit' name='submit'>Ausloggen</button>
			  </form>";
	  } else {
		  echo '<form action="includes/login.inc.php" method="POST">
				  <input type="text" name="uid" placeholder="Benutzername"> </br>
				  <input type="password" name="pwd" placeholder="Passwort"> </br>
				  <button class="btn btn-default" type="submit" name="submit">Einloggen</button>
				 </form>';
	  }
	  
	
	
?>

</div>
</div>
<p class="strich"> ___________________________________________________________</p>
<div class="regKasten">
<h5>Noch kein Konto?</h5>
<p>Dann registriere dich noch heute!</p>
<ul class="actions">
	<li>
		<a href="index.php?page=registration" class="button big">Jetzt registrieren!</a>
	</li>
</ul>
    <button id="closeModal" type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
</div>
</div>

</div>

</div>

<?php
}
?>
					<?= getNavigation()?>

        
				</ul>
			</nav>


        </header>
		<!--</main>-->
		<section id="main" class="wrapper">
            <?php if(isset($_GET['page'])){}
                    else{ $_GET['page'] = 'home';}
            ?>
            <?php if($_GET['page'] != 'home' || $_GET['page'] == null){ echo "<div class=\"container\">";} ?>
            <?php getContent();?>
            <?php if($_GET['page'] != 'home'){ echo "</div>";} ?>
            </section>
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
							<section class="col-lg-3 col-lg-push-1 col-md-3 col-md-push-1 col-xs-12">
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
	<script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/bahnen.js"></script>
</html>
