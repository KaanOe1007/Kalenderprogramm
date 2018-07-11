<?php
include('header.php');                                                                                        /*hier wird die datei header.php eingebunden, so macht mand das programm übersichtlicher und muss nicht so viel quelltext kopieren */
include('datenbank_anbindung.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Terminplaner</title>
  <link rel="stylesheet" href="/kalenderprogramm/Kalendertool/Query/fullcalendar1.css" />
  <link rel="stylesheet" href="/kalenderprogramm/Kalendertool/Query/bootstrap.css" />
  <script src="/kalenderprogramm/Kalendertool/Query/jquery.min.js"></script>
  <script src="/kalenderprogramm/Kalendertool/Query/moment.min.js"></script>
  <script src="/kalenderprogramm/Kalendertool/Query/fullcalendar.min.js"></script>
  <script> 
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: "http://localhost/Kalenderprogramm/Kalendertool/load.php",
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"http://localhost/Kalenderprogramm/Kalendertool/insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"http://localhost/Kalenderprogramm/Kalendertool/update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"http://localhost/Kalenderprogramm/Kalendertool/update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"http://localhost/Kalenderprogramm/Kalendertool/delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>
<style>

 body {
  margin-top: 40px;
  text-align: center;
  font-size: 14px;
  font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;

  }


 #calendar {
  width: 600px;
  margin: 0 auto;
  }

</style>


         
   <body>
      <nav class="nav">																						  <!-- Erstellung einer Navigationsleiste-->
         <ul>                                                                                                 <!-- Auflistung-->
            <li><a href="Terminverwaltung.php" class="active">Terminverwaltung</a></li>                       <!-- Weiterleitung auf Menüpunkt Termine/class=Active=orangene untere linie bleibt wenn man auf dieser seite ist.-->
            <li><a href="Dokumentenverwaltung.php" >Dokumentenverwaltung</a></li>
         </ul>
      </nav>
      <section id="main">                                                                                     <!-- Hauptbereich, also unter Überschrift und navigation-->
         <article>                                                                                            <!-- Artikelaufbau, linke Seite der Website-->
            <h2>Terminkalender</h2>																			  <!-- Überschrift des Artikels-->
            <img src="Kalenderbild.jpg" />                                                                    <!-- Bild unter der Überschrift-->
            <p style="text-indent:30px;">Bitte legen Sie den Vortragsdatum fest!</p>                           <!-- Hier wird der Text 30px nach rechts eingerückt damit er genau unter dem Bild liegt -->
            <!-- HIER KOMMT DER TERMINKALENDER REIN-->

  <br />
  <div class="container">
   <div id="calendar"></div>
   

  </div>
            </article>
            
         <?php
            include('seitenleiste.php');
            ?>
            
      </section>

      
   </body>
   </head>
</html>



