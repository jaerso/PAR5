<?php
	include_once "PHP/Head.php";
	include_once "includes/dbh.inc.php";
	include_once "includes/picture.inc.php";
	/*if($_GET['page']==''){
		$_GET['page']='home';
	}*/
	$_SESSION['page']=$_GET['page'];
	?>
	<body class="landing" onload="init()">
		<!-- Header -->
        <header id="header" class="header-home">

		<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=index.php?page=home>
		  <img id="brand-image" alt="Website Logo" src="images/logo.png">
		</a>
		</div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

	  				<li><a href="index.php?page=home">Start</a></li>
					<li><a href="index.php?page=gallery">Galerie</a></li>
					<li><a href="index.php?page=function">Funktionen</a></li>
					<li><a href="index.php?page=editor">Editor</a></li>
					</ul>
					

<ul class="nav navbar-nav navbar-right">
<li>
<?php 



if (isset($_SESSION['u_id'])) {

	echo "<form id='form-welcome' action='includes/logout.inc.php' method='POST'>";
		$username= $_SESSION['u_uid'];
		$pic=$_SESSION['pic'];
		echo " Willkommen <img id='profileicon' src=$pic height='42' width='42' style='border-radius:100%;' > <a class='login-name' href='index.php?page=profile'>$username</a>! ";
		echo "<button id='button-login' type='submit' name='submit'><span class='glyphicon glyphicon-log-out'></span> Logout</button>
		</form>";
}	
else{
?>



<button id="button-login" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</button>
 </ul>

 
 
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
<?php
}
?>
					<!--getNavigation()-->
					
        
				
			</nav>


        </header>
		<!--</main>-->


	
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
		  echo "<button type='submit' name='submit'>Ausloggen</button>
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


<hr class="strich">
	

<img src="images/regMensch.png" style="width: 160px; float: right; margin-right:55px;">		


<div class="regKasten">
	

<h5>Noch kein Konto?</h5>
<p>Dann registriere dich noch heute!</p>
<ul class="actions">
	<li>
		<a href="index.php?page=registration" class="button big">Jetzt registrieren!</a>
	</li>
</ul>

</div>
</div>
</div>
</div>
</div>
		<section id="main" class="wrapper">
		
	    <?php if(!isset($_GET['page'])){
			header("Location: index.php?page=home");
		}
                   elseif($_GET['page']==''){ $_GET['page'] = 'home';}
            ?>
            <?php if($_GET['page'] != 'home' && $_GET['page'] != 'editor' && $_GET['page'] != 'profile' || $_GET['page'] == null){ echo "<div class=\"container\">";} ?>
            <!--getContent()-->
				<?php
				if($_GET['page']=='home'){
					include_once "PHP/Startseite.php";
				}
				elseif($_GET['page']=='gallery'){
					include_once "PHP/Galerie.php";
				}
				elseif($_GET['page']=='function'){
					include_once "PHP/Funktionen.php";
				}
				elseif($_GET['page']=='editor'){
					include_once "PHP/Editor.php";
				}
				elseif($_GET['page']=='profile'){
					include_once "PHP/Profil.php";
				}
				elseif($_GET['page']=='registration'){
					include_once "PHP/Registrierung.php";
				}
				?>
			
			
            <?php if($_GET['page'] != 'home'){ echo "</div>";} ?>
            </section>
		<?php
		include_once "PHP/Footer.php"
		?>