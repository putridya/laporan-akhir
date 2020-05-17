<script>
    $(function() {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function init_events(ele) {
            ele.each(function() {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
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

        init_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()




        $('#calendar1').fullCalendar({
            <?php echo " header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        ";
            foreach ($dashboard as $das) {
                $warnaBackground;
                $warnaBorder;
                if ($das->JENIS_ACARA == 'Jumatan') {
                    $warnaBackground = '#f56954';
                    $warnaBorder = '#f56954';
                } else if ($das->JENIS_ACARA == 'Kajian') {
                    $warnaBackground = '#00a65a';
                    $warnaBorder = '#00a65a';
                } else {
                    $warnaBackground = '#00c0ef';
                    $warnaBorder = '#00c0ef';
                }
                echo "{
                title          : '" . $das->JENIS_ACARA . "',
                start          : '" . $das->TGL_ACARA . "',
                backgroundColor: '" . $warnaBackground . "', 
                borderColor    : '" . $warnaBorder . "' 
              },
          ";
            }
            echo "],";
            ?>

            // editable  : true,
            // droppable : true, // this allows things to be dropped onto the calendar !!!

        })
        // 
    })
</script>