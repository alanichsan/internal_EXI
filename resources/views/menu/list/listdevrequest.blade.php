@php($user_info = Auth::user()->users_information[0])
@extends('layouts.side')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg bg-white rounded">
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
                                            <a href="#delete" onclick="delete_request({{$data->id}})">
                                                <i class="fa fa-minus-circle" style="font-size:20px;color:red"></i>
                                            </a>
                                            @endif
                                            @if($authority)
                                            <i onclick="priority1({{$data->id}})" class="fas fa-star" style="font-size:20px;color:yellow">
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
                                            <a href="#edit">
                                                <i class="fa fa-edit" style="font-size:20px;color:primary" data-toggle="tooltip" data-placement="top" title="Edit!"></i>
                                            </a>
                                            <a href="#delete" data-toggle="modal" data-target="#exampleModalCenter">
                                                <i class="fa fa-minus-circle" style="font-size:20px;color:red" data-toggle="tooltip" data-placement="top" title="Delete!"></i>
                                            </a>
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <center>
                                                                <i class="fa fa-exclamation-circle" style="font-size:100px;color:red"></i>
                                                                <h4 class="mt-4"><b>Are you sure?</b></h4>
                                                                <h6>You won't be able to revert this!</h6>
                                                            </center>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <a type="button" class="btn btn-primary text-white"  onclick="delete_request({{$data->id}})">Yes, insert it!</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if($authority)
                                            <i onclick="priority0({{$data->id}})" class="fa fa-star-o" style="font-size:20px;color:orange" data-toggle="tooltip" data-placement="top" title="Khusus!">
                                                @endif
                                        </td>
                                        <script>
                                            $(document).ready(function() {
                                                $('[data-toggle="tooltip"]').tooltip();
                                            });

                                            // modal
                                            $('#myModal').on('shown.bs.modal', function() {
                                                $('#myInput').trigger('focus')
                                            })
                                        </script>
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