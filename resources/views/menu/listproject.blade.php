@php( $array = \App\Project_list::paginate(10))
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
                            <div style="overflow-x:auto;">
                            <a href="/formproject" class="btn btn-primary my-3">Create<span class="mx-3">&plus;</span></a>
                                <table class="content-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Perusahaan</th>
                                            <th>Status Project</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($array as $data)
                                        <tr>
                                            <td>{{$data->projects_id}}</td>
                                            <td>{{$data->projects_name}}</td>
                                            <td>{{$data->perusahaan}}</td>
                                            <td>{{$data->status_projects}}</td>
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