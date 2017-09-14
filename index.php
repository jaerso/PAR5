

	<?php
	include_once "PHP/Head.php";
	//require "PHP/Profil.php";
	?>
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
		$username= $_SESSION['u_uid'];
		//$id=$_SESSION['u_id'];
		//echo "<img src='uploads/profile".$id.".".$fileactualext."?".mt_rand()."'>";*/
		//profilIcon();
		echo "Willkommen <a href='index.php?page=profile'>$username</a> !";
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

<?php
}
?>
					<!--getNavigation()-->
					<li><a href="index.php?page=home">Start</a></li>
					<li><a href="index.php?page=gallery">Galerie</a></li>
					<li><a href="index.php?page=function">Funktionen</a></li>
					<li><a href="index.php?page=editor">Editor</a></li>
        
				</ul>
			</nav>


        </header>
		<!--</main>-->


	
	
		<section id="main" class="wrapper">
		
	    <?php if(isset($_GET['page'])){}
                   else{ $_GET['page'] = 'home';}
            ?>
            <?php if($_GET['page'] != 'home' || $_GET['page'] == null){ echo "<div class=\"container\">";} ?>
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