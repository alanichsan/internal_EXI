<!-- Summon Model -->
@php( $array = \App\UserInformation::paginate(10))
<!-- DIY Pagination Code -->

@extends('layouts.side')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg bg-white rounded">
            <div class="card-header m-4">List User</div>   
                <div class="main_content">
                    <div class="info">
                        <a href="/formuser" class="btn btn-primary my-3">Create<span class="mx-3">&plus;</span></a>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div style="overflow-x:auto;">
                            <table class="content-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th></th>
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
                                        <td>
                                            <a href="/listuser/edit/{{$data->users_id}}">
                                                <i class="fa fa-edit" style="font-size:20px;color:primary" data-toggle="tooltip" data-placement="top" title="Edit!"></i>
                                            </a>
                                            @if(Auth::user()->id != $data->users_id)
                                            <a id="deleteReq" data-toggle="modal" data-target="#deleteModal" data-id="{{$data->users_id}}">
                                                <i class="fa fa-minus-circle" style="font-size:20px;color:red" data-toggle="tooltip" data-placement="top" title="Delete!"></i>
                                            </a>
                                            <script>
                                                $(document).ready(function() {
                                                    $('[data-toggle="tooltip"]').tooltip();
                                                });
                                            </script>
                                            @endif
                                        </td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination mt-5" style="margin-left:45%">
        {{ $array->links()}}
    </div>
    @include('menu.dialog.set1')
    @endsection
    @section('js-script')
    <script>
        var idD;
        $(document).on("click", "#deleteReq", function() {
            idD = $(this).attr('data-id');
        });
        function delete_request() {
            window.location.href = 'listuser/delete/' + idD;
        }
    </script>
    @endsection