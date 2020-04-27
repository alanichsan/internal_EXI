@php($user_info = Auth::user()->users_information[0])
@extends('layouts.side')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg bg-white rounded">
                <div class="main_content">
                    <div class="info">
                        @if($user_info->role == 'Director')
                        <a href="/devrequest" class="btn btn-primary my-3">Create<span class="mx-3">&plus;</span></a>
                        @endif
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
                                        <th>Content</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($array->where('priority', 1) as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        @if($user_info->department == 'IT'|| $user_info->role == 'Director')
                                        <td>
                                            @if($user_info->users_id == $data->user_id)
                                            <a href="devrequest/edit/{{$data->id}}">
                                                <i class="fa fa-edit" style="font-size:20px;color:yellow"></i>
                                            </a>
                                            <a id="deleteReq" data-toggle="modal" data-target="#deleteModal" data-id="{{$data->id}}">
                                                <i class="fa fa-minus-circle" style="font-size:20px;color:red"></i>
                                            </a>
                                            @endif
                                            @if($authority)
                                            <i id="priority1" class="fas fa-star" style="font-size:20px;color:yellow" data-toggle="modal" data-target="#priority1Modal" data-id="{{$data->id}}" title="Khusus!">
                                            @endif
                                        </td>
                                        @endif
                                        <td>{{\App\UserInformation::where('users_id', $data->user_id)->first()->name}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{\App\Project_list::where('projects_id', $data->project)->first()->projects_name}}</td>
                                        <td>{{$data->content}}</td>
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
                                            <a href="devrequest/edit/{{$data->id}}">
                                                <i class="fa fa-edit" style="font-size:20px;color:primary" data-toggle="tooltip" data-placement="top" title="Edit!"></i>
                                            </a>
                                            <a id="deleteReq" data-toggle="modal" data-target="#deleteModal" data-id="{{$data->id}}">
                                                <i class="fa fa-minus-circle" style="font-size:20px;color:red" data-toggle="tooltip" data-placement="top" title="Delete!"></i>
                                            </a>
                                            @endif
                                            @if($authority)
                                            <i id="priority0" class="fa fa-star" style="font-size:20px;color:orange" data-toggle="modal" data-target="#priority0Modal" data-id="{{$data->id}}" title="Khusus!">
                                            @endif
                                        </td>
                                        @endif
                                        <td>{{\App\UserInformation::where('users_id', $data->user_id)->get('name')[0]->name}}</td>
                                        <td>{{$data->title}}</td>
                                        <td>{{\App\Project_list::where('projects_id', $data->project)->first()->projects_name}}</td>
                                        <td>{{$data->content}}</td>
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
    @include('menu.dialog.set1')
    <script>
        var idP0;
        var idP1;
        var idD;
        $(document).on("click", "#priority0", function() {
            idP0 = $(this).attr('data-id');
        });
        $(document).on("click", "#priority1", function() {
            idP1 = $(this).attr('data-id');
        });
        $(document).on("click", "#deleteReq", function() {
            idD = $(this).attr('data-id');
        });

        function priority0() {
            window.location.href = 'makepriority/makeone/' + idP0;
        }

        function priority1() {
            window.location.href = 'makepriority/makezero/' + idP1;
        }

        function delete_request() {
            window.location.href = 'devrequest/delete/' + idD;
        }
    </script>
    @endsection