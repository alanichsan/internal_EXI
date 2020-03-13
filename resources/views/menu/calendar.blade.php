@php( $array = Auth::user()->report)

@extends('layouts.app')

@section('content')
<div class="containers mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-header">Calendar</div>
        <a href="/dailyreports" class="btn btn-primary my-3">Create<span class="mx-3">&plus;</span></a>
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
      defaultDate: "{{\Carbon\Carbon::now()->format('Y-m-d')}}",
      editable: false,
      events: [
        @foreach($array as $report)
        {
          title: '{{$report->title}}',
          start: '{{$report->start}}',
          end: '{{$report->end}}',
          url: 'calendar/detail/{{$report->id}}'
        },
        @endforeach
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