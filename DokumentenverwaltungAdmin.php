<?php
include('header.php');
include('datenbank_anbindung.php');
?>
<html>
   <body>
      <nav class="nav">
         <ul>
            <li><a href="TerminverwaltungAdmin.php" >TerminverwaltungAdmin</a></li>
       		<li><a href="DokumentenverwaltungAdmin.php" class="active" >DokumentenverwaltungAdmin</a></l>
         </ul>
      </nav>
      <section id="main">
        
         <article>
            <!-- Artikelaufbau, linke Seite der Website-->
            <h2>Abgabe Projektarbeit [Finale Version]</h2>
            <h3>Abgabestatus</h3>
            
         </article>
         <?php
            include('seitenleiste.php');
            ?>
      </section>
   </body>
</html>


