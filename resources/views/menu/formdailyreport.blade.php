@extends('layouts.app')

@section('content')
@if($errors->any())
<h1>{{$errors->first()}}</h1>
@endif
<div class="containers mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">Form Daily Reports</div>
                <form method="POST" action="" enctype="multipart/form-data" class="my-5">
                    @csrf
                    <div class="form-group">
                        <label for="Report">Report</label>
                        <!-- <input type="text textarea" class="form-control @error('report') is-invalid @enderror" id="report" placeholder="Input Report" name="report" value="{{ old('report') }}"> -->
                        <textarea id="subject" name="description" placeholder="Write something.." style="height:200px; width: 100%"></textarea>

                        @error('report')
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