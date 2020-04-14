@extends('layouts.side')

@section('content')
<div class="containers mt-5">
    <div class="row justify-content-center">
    <div class="col-md-12">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">Form Daily Reports</div>
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
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Input title" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Report">Report</label>
                        <textarea class="form-control" rows="5" id="Report" class="form-control @error('Report') is-invalid @enderror" name="report" value="{{ old('Report') }}"></textarea>
                        @error('Report')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary  mt-5" style="width:100px">Create</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection