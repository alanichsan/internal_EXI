@extends('layouts.side')

@section('content')
<div class="containers mt-5">
    <div class="row justify-content-center">
    <div class="col-md-12">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">Form Project</div>
                <form method="POST" action="" class="my-5">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Project</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"" id=" name" placeholder="Input Name" name="name" value="{{$data->projects_name}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Perusahaan">Perusahaan</label>
                        <input type="text" class="form-control @error('Perusahaan') is-invalid @enderror" id="Perusahaan" placeholder="Input Perusahaan" name="perusahaan" value="{{$data->perusahaan}}">
                        @error('Perusahaan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Status">Status Project</label>
                        <select class="form-control @error('Status') is-invalid @enderror" id="Status" placeholder="Input Status Project" name="status">
                            @foreach($status as $status)
                            <option @if($status == $data->status_projects){{'selected'}}@endif>{{$status}}</option>
                            @endforeach
                        </select>
                        @error('Role')
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