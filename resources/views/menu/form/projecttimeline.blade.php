@extends('layouts.app')

@section('content')
<div class="containers mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">Form Project Timeline</div>
                <form method="POST" action="" enctype="multipart/form-data" class="my-5">
                    @csrf
                    <div class="form-group">
                        <label for="Status">Project</label>
                        <select class="form-control @error('project') is-invalid @enderror" id="project" placeholder="Input Project" name="project" value="{{ old('prject') }}">
                            @foreach ($project_list as $item)
                            <option value="{{$item->projects_id }}">{{$item->projects_name}}</option>
                            @endforeach
                        </select>
                        @error('project')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-25">
                        <label for="start">Start Event</label>
                        <input type="date" class="form-control @error('start') is-invalid @enderror datetimepicker-input" name="start" value="{{ old('start') }}">
                        @error('start')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-25">
                        <label for="end">End Event</label>
                        <input type="date" class="form-control @error('end') is-invalid @enderror datetimepicker-input" name="end" value="{{ old('end') }}">
                        @error('start')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="phase">Phase</label>
                    <ul style="list-style: none;">
                        @foreach($phase as $phase)
                        <li style="float: left;margin-left:10px;">
                            <label class="customcheck"><input type="checkbox" class="subOption">{{$phase}}
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                    <!-- https://freebiesupply.com/free-figma/gantt-chart-figma-template/ -->
                    <center>
                        <button type="submit" class="btn btn-primary  mt-5 float-right" style="width:100px ;">Create</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection