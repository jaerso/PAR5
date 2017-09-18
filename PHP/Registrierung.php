<h2>Registrierung</h2>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input id="vorname" type="text" name="first" placeholder="Vorname" maxlength="10" minlength="3" required>
			<input type="text" name="last" placeholder="Nachname" maxlength="12" minlength="3" required >
			<input type="email" name="email" placeholder="E-mail" required>
			<input type="text" name="uid" placeholder="Benutzername" maxlength="10" minlength="5" required oninvalid="this.setCustomValidity('Benutzname muss mindestens 5 Zeichen haben!')">
			<input type="password" name="pwd" placeholder="Passwort" minlength="8" required oninvalid="this.setCustomValidity('Passwort zu kurz. Bitte mindestens 8 Zeichen!')">
			<button type="submit" name="submit">Und los!</button>
		</form>