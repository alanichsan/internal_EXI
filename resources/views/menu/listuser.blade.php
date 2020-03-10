<!-- Summon Model -->
@php( $array = \App\UserInformation::paginate(10))
<!-- DIY Pagination Code -->

@extends('layouts.app')

@section('content')
<div class="containers mt-5">
    <div class="row justify-content-center">
        <div class="col-md-19">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">List User</div>
                <div class="my-5 mx-auto">
                            <!-- Processing Data -->
                            <ul class="list-group list-group-horizontal float-left">
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">#</li>
                                    @foreach($array as $data)
                                    <li class="list-group-item">{{$data->users_id}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Name</li>
                                    @foreach($array as $data)
                                    <li class="list-group-item">{{$data->name}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Alamat</li>
                                    @foreach($array as $data)
                                    <li class="list-group-item">{{$data->alamat}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Gender</li>
                                    @foreach($array as $data)
                                    <li class="list-group-item">{{$data->gender}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Date of Birth</li>
                                    @foreach($array as $data)
                                    <li class="list-group-item">{{$data->date_of_birth}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">NIK</li>
                                    @foreach($array as $data)
                                    <li class="list-group-item">{{$data->nik}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Tanggal Bergabung</li>
                                    @foreach($array as $data)
                                    <li class="list-group-item">{{$data->tanggal_bergabung}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Tanggal Lulus Probation</li>
                                    @foreach($array as $data)
                                    <li class="list-group-item">{{$data->tanggal_lulus_probation}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Department</li>
                                    @foreach($array as $data)
                                    <li class="list-group-item">{{$data->department}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Jabatan</li>
                                    @foreach($array as $data)
                                    <li class="list-group-item">{{$data->jabatan}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Role</li>
                                    @foreach($array as $data)
                                    <li class="list-group-item">{{$data->role}}</li>
                                    @endforeach
                                </ul>
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="ml-5">
                        {{ $array->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection