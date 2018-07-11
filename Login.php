<<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
session_start();                                                                                               /*Start des Loggins session_start() */
include('datenbank_anbindung.php');

if(isset($_POST['login'])) {                                                                                   /* mit isset wird überprüft ob mittels $_POST(Datenübergabemethode) das login formular an die datenbank übertragen wurde(durch den login button)*/
    $benutzername = $_POST['benutzername'];
    $passwort = $_POST['passwort'];                                                                            /*Wenn ja dann übergebe der variable $passwort den inhalt der an die datenbank im passwortfeld(zeile 51) mittels $_Post übertragen wurde*/
    $hashed_password = password_hash($passwort, PASSWORD_DEFAULT);                                             /*hier wird der variable hashed_password folgendes zugewiesen: mittels der password_hash methode wird der hash des passworts ermittelt, also den verschlüsselungswert(Da wir in der datenbank die passwörter verschlüsselt speichern)/PASSWORD_DEFAULT ist die verwendung eines hash-algorithmus*/
    $statement = $pdo->prepare("SELECT * FROM users WHERE benutzername = :benutzername");                      /*funktionsaufruf von prepare(query/anfrage vorbereitung) , durch select wird der datenbank abgefragt, was in der tabelle users bei benutzname steht*/
    $result = $statement->execute(array('benutzername' => $benutzername));                                     /*Durchführung vom $statement und es wird in die datenbank für den parameter benutzername der eingebene $benutzername(den wert in der variable) übergeben*/
    $user = $statement->fetch();                                                                               /*Es wird überprüft/geholt ob der user mit dem benutzernamen existiert. Sollte kein benutzer gefunden worden sein, so hat der $user den Wert false*/
    if ($user == true && $user['id']== 6 && password_verify($passwort, $hashed_password)) {                    /*Ist $user true also existiert der benutzername(der user)/ist die id des users in der datenbank gleich 6?(heikewiesner user)/ mit password_verify wird verglichen ob das eigegebene passwort mit dem erstellten hashwert passt*/
        $_SESSION['userid'] = $user['id'];                                                                     /*Registrierung der sessionvariable userid mit der ID des $user/damit wird der user nach der user-id identifiziert*/
        header('Location:TerminverwaltungAdmin.php');                                                          /* Weiterleitung zum Admin bereich */
    }if($user == true && $user['id']> 6 && password_verify($passwort, $hashed_password)){                      /*Ist $user true also existiert der benutzername(der user)/ist die id des users in der datenbank über 6?(alle user nach heikewiesner)/ mit password_verify wird verglichen ob das eigegebene passwort mit dem erstellten hashwert passt*/
        $_SESSION['userid'] = $user['id'];                                                                     /*Registrierung der sessionvariable userid mit der ID des $user/damit wird der user nach der user-id identifiziert*/
        header('Location:Terminverwaltung.php');                                                               /* Studentenbereich */
    }else {
        $errorMessage = "Benutzername oder Passwort falsch<br>";
    }
}
?>

<html>
   <head>
      <title>PSE-Wiesner</title>																				 <!-- Websitentitel -->
      <link rel="stylesheet" href="style.css" type="text/css" />												 <!-- Anbindung zur Css-Datei style.css-->
      <meta name="viewport" content="width=device.with, initial-scale=1.0, maximum-scale=1,0,user-scalable=no">  <!-- Der Content wird an das Endgerät skalliert, welches verwendet wird, ohne zoomfunktion-->
      <script src="https://code.jquery.com/jquery-latest.js"></script>                                           <!-- jquery eingebunden/framework/Javascript-Bibliothek was das frontend stark erleichtert -->
      <script type="text/javascript">																			 <!-- beim Drücken des Menübuttion wird die funktion slidetoggle ausgeführt, in langsam, animation -->
         $(document).ready(function(){
         	$('.menubutton').click(function(){
         		$('nav').slideToggle('slow');
         	});
         });
      </script>	
      <section id="menubar">
         <ul>
            <li><a class="menubutton" href="#menu"><img src="kalendersymbol.png" /></a></li>
         </ul>
      </section>
      <header>
         <h1>Project Software Engineering: <br> Termin-und Dokumentenverwaltung</h1>
        
      </header>
   </head>
   <body>
		<div id="amina">                                                                             
			<h4>Login</h4>		
<?php 
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
				<form action="?login=1" method="post">
					Benutzername:<br></br>
					<input type="text" size="40" maxlength="250" name="benutzername"><br><br>
 					Dein Passwort:<br></br>
					<input type="password" size="40"  maxlength="250" name="passwort"><br>
					<br>
					<input type="submit" value="Abschicken" name="login">
			</form>
		</div>  
	</body>
</html>



































