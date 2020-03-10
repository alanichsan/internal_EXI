@extends('layouts.app')

@section('content')
@if($errors->any())
<h1>{{$errors->first()}}</h1>
@endif
<div class="containers mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">Form User</div>
                <!-- Post to the HomeController@store_user -->
                <form method="POST" action="" enctype="multipart/form-data" class="my-5">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Input Email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Input Name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Input Alamat" name="alamat" value="{{ old('alamat') }}">
                        @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Gender">Gender</label>
                        <select class="form-control @error('Gender') is-invalid @enderror" id="Gender" placeholder="Input Gender" name="gender">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        @error('Role')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Date">Date of birth</label>
                        <input type="text" class="form-control @error('Date') is-invalid @enderror" id="Date" placeholder="Input Date of birth" name="date" value="{{ old('date') }}">
                        @error('Date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Place">Place of birth</label>
                        <input type="text" class="form-control @error('Place') is-invalid @enderror" id="Place" placeholder="Input Place of birth" name="place" value="{{ old('place') }}">
                        @error('Place')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="NIK">NIK (nomor induk kependudukan)</label>
                        <input type="number" class="form-control @error('NIK') is-invalid @enderror" id="NIK" Placeholder="Input NIK (nomor induk kependudukan)" name="nik" value="{{ old('nik') }}">
                        @error('NIK')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Bergabung">Tanggal Bergabung</label>
                        <input type="text" class="form-control @error('Bergabung') is-invalid @enderror" id="Bergabung" placeholder="Input Tanggal Bergabung" name="bergabung" value="{{ old('bergabung') }}">
                        @error('Bergabung')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Lulus">Tanggal Lulus Probation</label>
                        <input type="text" class="form-control @error('Lulus') is-invalid @enderror" id="Lulus" placeholder="Input Tanggal Lulus Probation" name="lulus" value="{{ old('lulus') }}">
                        @error('Lulus')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Department">Department</label>
                        <select class="form-control @error('Department') is-invalid @enderror" id="Department" placeholder="Input Department" name="department">
                            <option>IT</option>
                            <option>Marketing</option>
                            <option>Operational</option>
                            <option>Finance</option>
                        </select>
                        @error('Department')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Jabatan">Jabatan</label>
                        <input type="text" class="form-control @error('Jabatan') is-invalid @enderror" id="Jabatan" placeholder="Input Jabatan" name="jabatan" value="{{ old('jabatan') }}">
                        @error('Jabatan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Role">Role</label>
                        <select class="form-control @error('Role') is-invalid @enderror" id="Role" placeholder="Input Role" name="role">
                            <option>Staff</option>
                            <option>Manager</option>
                            <option>Director</option>
                        </select>
                        @error('Role')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary mt-5" style="width:100px">Create</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection