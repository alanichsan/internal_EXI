@php( $array = \App\Project_list::paginate(10))
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="main_content">
                    <div class="info">
                        <a href="/formproject" class="btn btn-primary my-3">Create<span class="mx-3">&plus;</span></a>
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
                                        <th>Perusahaan</th>
                                        <th>Status Project</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($array as $project_list)
                                    <tr>
                                        <td>{{$project_list->projects_id}}</td>
                                        <td>
                                            <a href="/listproject{{$project_list->id}}/editproject">
                                                <i class="fa fa-edit" style="font-size:20px;color:yellow"></i>
                                            </a>
                                             <i onclick="delete_project({{$project_list->projects_id}})" class="fa fa-minus-circle" style="font-size:20px;color:red"></i>
                                        </td>
                                        <td>{{$project_list->projects_name}}</td>
                                        <td>{{$project_list->perusahaan}}</td>
                                        <td>{{$project_list->status_projects}}</td>
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
        function delete_project(projects_id) {
            if (confirm("Press a button!")) {
                window.location.href = 'listproduct/delete/'+projects_id;
            } 
        }
    </script>
    @endsection