<!-- Summon Model -->
@php( $array = \App\UserInformation::paginate(10))
<!-- DIY Pagination Code -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="main_content">
                    <div class="info">
                        <div style="overflow-x:auto;">
                            <table class="content-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th></th>
                                        <th>Iuser_id</th>
                                        <th>Title</th>
                                        <th>project</th>
                                        <th>priority</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($array as $data)
                                    <tr>
                                        <td>{{$data->users_id}}</td>
                                        <td>
                                            <a href="#edit">
                                                <i class="fa fa-edit" style="font-size:20px;color:yellow"></i>
                                            </a>
                                            <a href="#delete">
                                                <i class="fa fa-minus-circle" style="font-size:20px;color:red"></i>
                                            </a>
                                        </td>
                                        <td>{{$data->Iuser_id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->project}}</td>
                                        <td>{{$data->priority}} <i class="fa fa-star-o" style="font-size:20px;color:yellow"></td>
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
    @endsection