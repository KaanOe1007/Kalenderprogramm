
<?php
include('header.php');                                                                                        /*hier wird die datei header.php eingebunden, so macht mand das programm übersichtlicher und muss nicht so viel quelltext kopieren */
include('datenbank_anbindung.php');
?>
<html>
   <body>
      <nav class="nav">																						  <!-- Erstellung einer Navigationsleiste-->
         <ul>                                                                                                 <!-- Auflistung-->
            <li><a href="TerminverwaltungAdmin.php" class="active">TerminverwaltungAdmin</a></li>             <!-- Weiterleitung auf Menüpunkt Termine/class=Active=orangene untere linie bleibt wenn man auf dieser seite ist.-->
            <li><a href="DokumentenverwaltungAdmin.php" >DokumentenverwaltungAdmin</a></l>
         </ul>
      </nav>
      <section id="main">                                                                                     <!-- Hauptbereich, also unter Überschrift und navigation-->
         <article>                                                                                            <!-- Artikelaufbau, linke Seite der Website-->
            <h2>Terminkalender</h2>																			  <!-- Überschrift des Artikels-->
            <img src="Kalenderbild.jpg" />                                                                    <!-- Bild unter der Überschrift-->
            <p style="text-indent:30px;">Bitte legen Sie den Vortragsdatum fest</p>                           <!-- Hier wird der Text 30px nach rechts eingerückt damit er genau unter dem Bild liegt -->
            <!-- HIER KOMMT DER TERMINKALENDER REIN-->
         </article>
         <?php
            include('seitenleiste.php');
            ?>
      </section>
      
      
   </body>
</html>
