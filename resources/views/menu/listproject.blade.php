@php( $array = \App\Project_list::all())
<?php
$total = 0;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$count = ($page * 20);
foreach($array as $data){
    $total++;
}
$total = ceil($total/20);
?>
@extends('layouts.app')

@section('content')
<div class="containers mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">List Projects</div>
                <ul class="pager">
                    <li class="previous" id="previous"><a href="?page=@if($page != 1){{$page - 1}}@else{{$page}}@endif">Previous</a></li>
                    @for($i = 1; $i <= $total;$i++)
                    <li><a class="active" href="?page={{$i}}">{{$i}}</a></li>
                    @endfor
                    <li class="next" id="next"><a href="?page=@if($page != $total){{$page + 1}}@else{{$page}}@endif">Next</a></li>
                </ul>
                <div class="container my-5 mx-5">
                    <div class="row">
                        <div class="col-md-9">
                            <ul class="list-group list-group-horizontal float-left">
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">#</li>
                                    @foreach($array->slice($count-20, 10) as $data)
                                    <li class="list-group-item">{{$data->projects_id}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Name</li>
                                    @foreach($array->slice(($count-20), 10) as $data)
                                    <li class="list-group-item">{{$data->projects_name}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Perusahaan</li>
                                    @foreach($array->slice(($count-20), 10) as $data)
                                    <li class="list-group-item">{{$data->perusahaan}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Status</li>
                                    @foreach($array->slice(($count-20), 10) as $data)
                                    <li class="list-group-item">{{$data->status_projects}}</li>
                                    @endforeach
                                </ul>
                            </ul>
                            <ul class="list-group list-group-horizontal float-right">
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">#</li>
                                    @foreach($array->slice(($count-10), 10) as $data)
                                    <li class="list-group-item">{{$data->projects_id}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Name</li>
                                    @foreach($array->slice(($count-10), 10) as $data)
                                    <li class="list-group-item">{{$data->projects_name}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Perusahaan</li>
                                    @foreach($array->slice(($count-10), 10) as $data)
                                    <li class="list-group-item">{{$data->perusahaan}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                    <li class="list-group-item active">Status</li>
                                    @foreach($array->slice(($count-10), 10) as $data)
                                    <li class="list-group-item">{{$data->status_projects}}</li>
                                    @endforeach
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection