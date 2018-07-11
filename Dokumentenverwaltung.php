<?php
   include('header.php');
   include('datenbank_anbindung.php'); 
   ?>
<html>
   <body>
      <nav class="nav">
         <ul>
            <li><a href="Terminverwaltung.php" >Terminverwaltung</a></li>
            <li><a href="Dokumentenverwaltung.php" class="active" >Dokumentenverwaltung</a></l>
         </ul>
      </nav>
      <section id="main">
         <!-- Hauptbereich, also unter Überschrift und navigation-->
         <article>
            <!-- Artikelaufbau, linke Seite der Website-->
            <h2>Abgabe Projektarbeit [Finale Version]</h2>
            <h3>Abgabestatus</h3>
            <form action='<? echo $PHP_SELF; ?>' method='post' enctype='multipart/form-data'>
               <p>Kategorie</p>
               <select name='kategorie' size=2>															 	  <!-- Kategerie mit einer Größe von 2 Zeilen -->
                  <option>PDF
                  <option>PowerPoint-Vortrag
               </select>
               <p>Dateiauswahl</p>
               <input type=file name='neuedatei' size=50> 													  <!-- Durchsuchungsbutton -->
               <br><br>
               <input type="submit" value="Versende Datei"><input type="Reset" >                              <!-- Button zum versenden mit name Versende Datei button zum zurücksetzen mit default name Zurücksetzen -->
            </form>
         </article>
         <?php
            include('seitenleiste.php');
            ?>
      </section>
   </body>
</html>





