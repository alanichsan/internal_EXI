@php($user_info = Auth::user()->users_information[0])
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="main_content">
                    <div class="info">
                        <a href="/devrequest" class="btn btn-primary my-3">Create<span class="mx-3">&plus;</span></a>
                        <div style="overflow-x:auto;">
                            <table class="content-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        @if($user_info->department == 'IT'|| $user_info->role == 'Director')
                                        <th>Action</th>
                                        @endif
                                        <th>From</th>
                                        <th>Title</th>
                                        <th>Project</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($array->where('priority', 1) as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        @if($user_info->department == 'IT'|| $user_info->role == 'Director')
                                        <td>
                                            @if($user_info->users_id == $data->user_id)
                                            <a href="#edit">
                                                <i class="fa fa-edit" style="font-size:20px;color:yellow"></i>
                                            </a>
                                            <a href="#delete">
                                                <i class="fa fa-minus-circle" style="font-size:20px;color:red"></i>
                                            </a>
                                            @endif
                                            @if($authority)
                                            <i onclick="priority1({{$data->id}})" class="fa fa-star" style="font-size:20px;color:yellow">
                                                @endif
                                        </td>
                                        @endif
                                        <td>{{\App\UserInformation::where('users_id', $data->user_id)->first()->name}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{\App\Project_list::where('projects_id', $data->project)->first()->projects_name}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tbody>
                                    @foreach($array->where('priority', 0) as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        @if($user_info->department == 'IT'|| $user_info->role == 'Director')
                                        <td>
                                            @if($user_info->users_id == $data->user_id)
                                            <a href="#edit">
                                                <i class="fa fa-edit" style="font-size:20px;color:yellow"></i>
                                            </a>
                                            <a href="#delete" onclick="delete_request({{$data->id}})">
                                                <i class="fa fa-minus-circle" style="font-size:20px;color:red"></i>
                                            </a>
                                            @endif
                                            @if($authority)
                                            <i onclick="priority0({{$data->id}})" class="fa fa-star-o" style="font-size:20px;color:yellow">
                                                @endif
                                        </td>
                                        @endif
                                        <td>{{\App\UserInformation::where('users_id', $data->user_id)->get('name')[0]->name}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{$data->project}}</td>

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
    @section('js-script')
    <script>
        function priority0(req_id) {
            if (confirm("Press a button!")) {
                window.location.href = 'makepriority/makeone/' + req_id;
            }
        }

        function priority1(req_id) {
            if (confirm("Press a button!")) {
                window.location.href = 'makepriority/makezero/' + req_id;
            }
        }

        function delete_request(req_id) {
            if (confirm("Press a button!")) {
                window.location.href = 'devrequest/delete/' + req_id;
            }
        }
    </script>
    @endsection