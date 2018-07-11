<?php
//index.php




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
 </head>
 <body>
  <br />
  <h2 align="center"><a href="#">Terminkalender</a></h2>
  <br />
  <div class="container">
   <div id="calendar"></div>
   
      <a href="http://localhost/Kalenderprogramm/Terminverwaltung.php">zurück </a>
  </div>
 </body>
</html>