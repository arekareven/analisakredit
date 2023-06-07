<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

<div class="container">
    <div class="row" style="width:100%">
       <div class="col-md-12">
           <div id="calendar"></div>
       </div>
    </div>
</div>

<script type="text/javascript">
   
    var events = <?php echo json_encode($data) ?>;
    
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
           
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'Hari ini',
        month: 'Bulan',
        week : 'Minggu',
        day  : 'Hari'
      },
      events    : events
    })
</script> -->


	<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
	<script>

		var events = <?php echo json_encode($data) ?>;
				
		var date = new Date()
		var d    = date.getDate(),
			m    = date.getMonth(),
			y    = date.getFullYear()

		document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth',
				headerToolbar: {
					left: 'prev,next,today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay' // user can switch between the two
				},
				buttonText: {
					today: 'Hari ini',
					month: 'Bulan',
					week : 'Minggu',
					day  : 'Hari'
				},
				
				events    : events,
				eventClick: function(info) {
					info.jsEvent.preventDefault();
					alert('Komite atas nama ' + info.event.title + ' ' + info.event.url );

				}

			});
			calendar.setOption('locale', 'id');
			calendar.render();
		});

	</script>

	<div class="container">
    <div class="row" style="width:100%">
       <div class="col-md-12">
           <div id="calendar">
		   </div>
       </div>
    </div>
	</div>
