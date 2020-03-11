<!-- Summon Model -->
@php( $array = \App\UserInformation::paginate(10))
<!-- DIY Pagination Code -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="main_content">
                    <div class="info">
                        <center>
                            <div style="overflow-x:auto;">
                                <table class="content-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Alamat</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Place of Birth</th>
                                            <th>NIK</th>
                                            <th>Tanggal Bergabung</th>
                                            <th>Tanggal Lulus Probation</th>
                                            <th>Department</th>
                                            <th>Jabatan</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($array as $data)
                                        <tr>
                                            <td>{{$data->users_id}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->alamat}}</td>
                                            <td>{{$data->gender}}</td>
                                            <td>{{$data->date_of_birth}}</td>
                                            <td>{{$data->place_of_birth}}</td>
                                            <td>{{$data->nik}}</td>
                                            <td>{{$data->tanggal_bergabung}}</td>
                                            <td>{{$data->tanggal_lulus_probation}}</td>
                                            <td>{{$data->department}}</td>
                                            <td>{{$data->jabatan}}</td>
                                            <td>{{$data->role}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination mt-5" style="margin-left:45%">
        {{ $array->links()}}
    </div>
    @endsection