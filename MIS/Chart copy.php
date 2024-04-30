<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Calendar</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-YQp1wFdsy1Z3dCU5ym8nfcfJWIPSK1rYBprYO8r00ELIOknvRr4aRKeqWSS6I6Zh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="./plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <link rel="stylesheet" href="./Admin/css/admin.css">
</head>
<style>
  .main {
    max-height: 100vh;
    width: 100%;
    overflow: hidden;
    transition: all 0.35s ease-in-out;
    background-color: #e2e3dc;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: start;
  }

  .header {
    background-color: gray;
  }

  tr {
    border: 1px solid gray;
  }

  .th {
    text-align: center;
  }

  .table-responsive.m-2 {
    width: 99.3%;
    height: 100vh;

  }

  .header {
    position: sticky;
    top: -2px;
  }
</style>

<body>
  <div class="wrapper">
    <aside id="sidebar">
      <div class="d-flex">
        <button class="toggle-btn" type="button">
          <img src="../image/macaraeg.png" alt="Company Logo" class="logo-imig">
        </button>
        <div class="sidebar-logo">
          <a href="Profile.php">User Account<i class="fa-solid fa-pen-to-square"></i></a>
        </div>
      </div>
      <ul class="sidebar-nav">
        <li class="sidebar-item">
          <a href="Admin.php" id="profile" class="sidebar-link">
            <i class="fa-solid fa-chart-line"></i>
            <span>DashBoard</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
            <i class="fa-solid fa-code-pull-request"></i>
            <span>Request</span>
          </a>
          <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="Service.php" id="service" class="sidebar-link"><i class="fa-solid fa-user"></i>Service</a>
            </li>

            <li class="sidebar-item">
              <a href="Feedback.php" id="feedback" class="sidebar-link"><i class="fa-solid fa-comments"></i>Feedback</a>
            </li>

            <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#equipmentDropdown" aria-expanded="false" aria-controls="equipmentDropdown">
                <i class="fa-solid fa-wrench"></i>
                <span>Equipment</span>
              </a>
              <ul id="equipmentDropdown" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="ProfessorEquipment.php" id="equipment" class="sidebar-link"><i class="fa-solid fa-chalkboard-user"></i>Professor</a>
                </li>
                <li class="sidebar-item">
                  <a href="StudentEquipment.php" id="room" class="sidebar-link"><i class="fa-solid fa-user"></i>Student</a>
                </li>

              </ul>
            </li>

            <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#roomDropdown" aria-expanded="false" aria-controls="roomDropdown">
                <i class="fa-solid fa-desktop"></i>
                <span>Room</span>
              </a>
              <ul id="roomDropdown" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="ProfessorRoom.php" id="room" class="sidebar-link"><i class="fa-solid fa-chalkboard-user"></i>Professor</a>
                </li>
                <li class="sidebar-item">
                  <a href="StudentRoom.php" id="room" class="sidebar-link"><i class="fa-solid fa-user"></i>Student</a>
                </li>

              </ul>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a href="Inquiry.php" id="inquiry" class="sidebar-link">
            <i class="fa-solid fa-message"></i>
            <span>Inquiry</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="Record.php" id="record" class="sidebar-link">
            <i class="fa-solid fa-folder"></i>
            <span>Record</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="User.php" id="account" class="sidebar-link">
            <i class="fa-solid fa-gear"></i>
            <span>User Account </span>
          </a>
        </li>
      </ul>
      <div class="sidebar-footer">
        <a href="../login.html" id="logout" class="sidebar-link">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span>Logout</span>
        </a>
      </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="main">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <h1>Calendar</h1>
              </div>
              <div class="col-md-9">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Calendar</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <div class="sticky-top mb-3">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Draggable Events</h4>
                    </div>
                    <div class="card-body">
                      <!-- the events -->
                      <div id="external-events">
                        <div class="external-event bg-success">Lunch</div>
                        <div class="external-event bg-warning">Go home</div>
                        <div class="external-event bg-info">Do homework</div>
                        <div class="external-event bg-primary">Work on UI design</div>
                        <div class="external-event bg-danger">Sleep tight</div>
                        <div class="checkbox">
                          <label for="drop-remove">
                            <input type="checkbox" id="drop-remove">
                            remove after drop
                          </label>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Create Event</h3>
                    </div>
                    <div class="card-body">
                      <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                        <ul class="fc-color-picker" id="color-chooser">
                          <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                          <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                        </ul>
                      </div>
                      <!-- /btn-group -->
                      <div class="input-group">
                        <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                        <div class="input-group-append">
                          <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                        </div>
                        <!-- /btn-group -->
                      </div>
                      <!-- /input-group -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card card-primary">
                  <div class="card-body p-0">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    
</div>
    <!-- jQuery -->
    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI -->
    <script src="./plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/adminlte.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/fullcalendar/main.js"></script>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
      $(function() {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function() {

            // create an Event Object (https://fullcalendar.io/docs/event-object)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0 //  original position after the drag
            })

          })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
          m = date.getMonth(),
          y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
          itemSelector: '.external-event',
          eventData: function(eventEl) {
            return {
              title: eventEl.innerText,
              backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
              borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
              textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
            };
          }
        });

        var calendar = new Calendar(calendarEl, {
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          themeSystem: 'bootstrap',
          //Random default events
          events: [{
              title: 'All Day Event',
              start: new Date(y, m, 1),
              backgroundColor: '#f56954', //red
              borderColor: '#f56954', //red
              allDay: true
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d - 5),
              end: new Date(y, m, d - 2),
              backgroundColor: '#f39c12', //yellow
              borderColor: '#f39c12' //yellow
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false,
              backgroundColor: '#0073b7', //Blue
              borderColor: '#0073b7' //Blue
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false,
              backgroundColor: '#00c0ef', //Info (aqua)
              borderColor: '#00c0ef' //Info (aqua)
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d + 1, 19, 0),
              end: new Date(y, m, d + 1, 22, 30),
              allDay: false,
              backgroundColor: '#00a65a', //Success (green)
              borderColor: '#00a65a' //Success (green)
            },
            {
              title: 'Click for Google',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'https://www.google.com/',
              backgroundColor: '#3c8dbc', //Primary (light-blue)
              borderColor: '#3c8dbc' //Primary (light-blue)
            }
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function(info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
              // if so, remove the element from the "Draggable Events" list
              info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
          }
        });

        calendar.render();
        // $('#calendar').fullCalendar()

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        // Color chooser button
        $('#color-chooser > li > a').click(function(e) {
          e.preventDefault()
          // Save color
          currColor = $(this).css('color')
          // Add color effect to button
          $('#add-new-event').css({
            'background-color': currColor,
            'border-color': currColor
          })
        })
        $('#add-new-event').click(function(e) {
          e.preventDefault()
          // Get value and make sure it is not null
          var val = $('#new-event').val()
          if (val.length == 0) {
            return
          }

          // Create events
          var event = $('<div />')
          event.css({
            'background-color': currColor,
            'border-color': currColor,
            'color': '#fff'
          }).addClass('external-event')
          event.text(val)
          $('#external-events').prepend(event)

          // Add draggable funtionality
          ini_events(event)

          // Remove event from text input
          $('#new-event').val('')
        })
      })
    </script>
     <script>
    const hamBurger = document.querySelector(".toggle-btn");

    hamBurger.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
    });

    // Add event listener to handle clicks on the sidebar links
    document.querySelectorAll('.sidebar-link').forEach(link => {
        link.addEventListener('click', function (e) {
            // Check if the clicked element is the icon
            if (e.target.classList.contains('fa-solid')) {
                // Prevent the default behavior (expanding/collapsing the dropdown)
                e.preventDefault();
                // Toggle the expand class on the sidebar
                document.querySelector("#sidebar").classList.toggle("expand");
            }
        });
    });
</script>
</body>

</html>