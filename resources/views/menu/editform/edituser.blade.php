@extends('layouts.side')

@section('content')
<div class="containers mt-5">
    <div class="row justify-content-center">
    <div class="col-md-12">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">Form User</div>
                <form method="POST" action="" enctype="multipart/form-data" class="my-5">
                @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Input Email" name="email" value="{{ $user->email }}">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Input Name" name="name" value="{{ $userinfo->name }}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Input Alamat" name="alamat" value="{{ $userinfo->alamat }}">
                        @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Gender">Gender</label>
                        <select class="form-control @error('Gender') is-invalid @enderror" id="Gender" placeholder="Input Gender" name="gender">
                            @foreach($gender as $gender)
                            <option @if($userinfo->gender == $gender){{'selected'}} @endif>{{$gender}}</option>
                            @endforeach
                        </select>
                        @error('Role')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Date">Date of birth</label>
                        <input type="date" class="form-control @error('Date') is-invalid @enderror datetimepicker-input" id="datetimepicker" placeholder="Input Date of birth" name="date" value="{{ $userinfo->date_of_birth }}">
                        @error('Date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Place">Place of birth</label>
                        <input type="text" class="form-control @error('Place') is-invalid @enderror" id="Place" placeholder="Input Place of birth" name="place" value="{{ $userinfo->place_of_birth }}">
                        @error('Place')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="NIK">NIK (nomor induk kependudukan)</label>
                        <input type="number" class="form-control @error('NIK') is-invalid @enderror" id="NIK" Placeholder="Input NIK (nomor induk kependudukan)" name="nik" value="{{ $userinfo->nik }}">
                        @error('NIK')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Bergabung">Tanggal Bergabung</label>
                        <input type="date" class="form-control @error('Bergabung') is-invalid @enderror" id="Bergabung" placeholder="Input Tanggal Bergabung" name="bergabung" value="{{ $userinfo->tanggal_bergabung }}">
                        @error('Bergabung')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Lulus">Tanggal Lulus Probation</label>
                        <input type="date" class="form-control @error('Lulus') is-invalid @enderror" id="Lulus" placeholder="Input Tanggal Lulus Probation" name="lulus" value="{{ $userinfo->tanggal_lulus_probation }}">
                        @error('Lulus')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Department">Department</label>
                        <select class="form-control @error('Department') is-invalid @enderror" id="Department" placeholder="Input Department" name="department">
                            @foreach($department as $department)
                            <option @if($userinfo->department == $department){{'selected'}} @endif>{{$department}}</option>
                            @endforeach
                        </select>
                        @error('Department')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Jabatan">Jabatan</label>
                        <input type="text" class="form-control @error('Jabatan') is-invalid @enderror" id="Jabatan" placeholder="Input Jabatan" name="jabatan" value="{{ $userinfo->jabatan }}">
                        @error('Jabatan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Role">Role</label>
                        <select class="form-control @error('Role') is-invalid @enderror" id="Role" placeholder="Input Role" name="role">
                            @foreach($role as $role)
                            <option @if($role == $userinfo->role){{'selected'}}@endif>{{$role}}</option>
                            @endforeach
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