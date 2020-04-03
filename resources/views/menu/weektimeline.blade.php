@extends('layouts.app')

@section('content')
<div class="containers mt-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-header">Project Timeline</div>
        <a href="projecttimeline_form" class="btn btn-primary my-3">Create<span class="mx-3">&plus;</span></a>

        <form method="POST" action="" enctype="multipart/form-data" class="my-5">
          @csrf
          <div class="form-group">
            <label for="project">Project</label>
            <select class="form-control @error('project') is-invalid @enderror" id="project" placeholder="Input Project" name="project" value="{{ old('project') }}">
              @foreach ($project_list as $item)
              <option value="{{$item->projects_id }}">{{$item->projects_name}}</option>
              @endforeach
            </select>
            @error('project')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="project">Month</label>
            <select class="form-control @error('project') is-invalid @enderror" id="project" placeholder="Input Project" name="month" value="{{ old('month') }}">
              <option value="0">ALL</option>  
              {{$count = 1}}
              @foreach ($month as $item)
              <option value="{{$count}}">{{$item}}</option>
              @php($count += 1)
              @endforeach
            </select>
            @error('project')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary  mt-5 float-right" style="width:100px ;">Submit</button>
        </form>

        <div id='chart_div' class="my-5">PROJECT TIMELINE IS NOT FOUND</div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js-script')
@isset($jsonTable)
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['gantt']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = new google.visualization.DataTable(<?php echo $jsonTable ?>);
    var options = {
      height: 400,
      gantt: {
        trackHeight: 30
      }
    };

    var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

    chart.draw(data, options);
  }
</script>
@endisset
@endsection