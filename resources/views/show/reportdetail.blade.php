@extends('layouts.side')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-center p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">
                    Daily Report
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$data[0]->title}}</h5>
                    <p class="">{{$data[0]->content}}</p>
                    <p class="">{{$project[0]->projects_name}}</p>
                    <p class="card-text"> by {{$users[0]->users_information[0]->name}}</p>
                    <a href="/calendar" class="card-link">kembali</a>
                </div>
                <div class="card-footer text-muted">
                    {{$data[0]->start}} ~ {{$data[0]->end}}
                </div>
            </div>
        </div>
    </div>
    @endsection