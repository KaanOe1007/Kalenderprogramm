<!-- Die Website ist an Smartphones angepasst! -->
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
      <a class="ghost_btn" style="text-decoration:none" href="Logout.php">Logout</a>
      <section id="menubar">                                                                                     <!-- Erstellung des Menubar bereiches -->
         <ul>
            <li><a class="menubutton" href="#menu"><img src="kalendersymbol.png" /></a></li>                     <!-- Kalender/Homebutton -->
         </ul>
      </section>
      <header>
         <h1>Project Software Engineering: <br> Termin-und Dokumentenverwaltung</h1>                             <!-- Überschrift der Webanwendung-->
      </header>
   </head>
</html>