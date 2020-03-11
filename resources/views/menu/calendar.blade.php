@extends('layouts.app')

@section('content')
<div class="containers mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-header">Calendar</div>
        <div id='calendar' class="my-5"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js-script')
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: ['interaction', 'dayGrid'],
      defaultDate: '2020-03-12',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [{
          title: 'All Day Event',
          start: '2020-02-01'
        },
        {
          title: 'Long Event',
          start: '2020-02-07',
          end: '2020-02-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-02-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-02-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2020-02-11',
          end: '2020-02-13'
        },
        {
          title: 'Meeting',
          start: '2020-02-12T10:30:00',
          end: '2020-02-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2020-02-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2020-02-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2020-02-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2020-02-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          url: 'http://google.com/',

          start: '2020-02-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-09-28'
        }
      ]
    });

    calendar.render();
  });
</script>
<link href="{{asset('plugin/fullcalendar-4.4.0/packages/core/main.css')}}" rel='stylesheet' />
<link href="{{asset('plugin/fullcalendar-4.4.0/packages/daygrid/main.min.css')}}" rel='stylesheet' />
<script src="{{asset('plugin/fullcalendar-4.4.0/packages/core/main.min.js')}}"></script>
<script src="{{asset('plugin/fullcalendar-4.4.0/packages/interaction/main.min.js')}}"></script>
<script src="{{asset('plugin/fullcalendar-4.4.0/packages/daygrid/main.js')}}"></script>
@endsection