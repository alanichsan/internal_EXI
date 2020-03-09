<!-- Summon Model -->
@php( $array = \App\UserInformation::all())
<!-- DIY Pagination Code -->
<?php
$total = 0;
$max = 20;

// Get the current page
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$count = ($page * $max);
foreach($array as $data){
    $total++;
}

// Check if the data is more than ten in the page
$isHalf = $total/20;
$half = floor($isHalf);

// Count total pages
$total = ceil($total/20);
?>
@extends('layouts.app')

@section('content')
<div class="containers mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">List User</div>
                <ul class="pager">
                    <!-- Previous Button -->
                    <li class="previous" id="previous"><a href="?page=@if($page != 1){{$page - 1}}@else{{$page}}@endif">Previous</a></li>
                    @for($i = 1; $i <= $total;$i++)
                    <li><a class="active" href="?page={{$i}}">{{$i}}</a></li>
                    @endfor
                    <!-- Next Button -->
                    <li class="next" id="next"><a href="?page=@if($page != $total){{$page + 1}}@else{{$page}}@endif">Next</a></li>
                </ul>
                <div class="container my-5 ">
                    <div class="row mx-3">
                        <div class="col-md-9">
                            <!-- Processing Data -->
                            <ul class="list-group list-group-horizontal float-left">
                                <ul class="list-group list-group-vertical">
                                <li class="list-group-item active">#</li>
                                    @foreach($array->slice($count-20, 10) as $data)
                                    <li class="list-group-item">{{$data->users_id}}</li>
                                    @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                <li class="list-group-item active">Name</li>
                                    @foreach($array->slice(($count-20), 10) as $data)
                                    <li class="list-group-item">{{$data->name}}</li>
                                    @endforeach
                                </ul>
                            </ul>
                            @if($page == $total && $isHalf-$half)
                            @else
                            <ul class="list-group list-group-horizontal float-right">
                                <ul class="list-group list-group-vertical">
                                <li class="list-group-item active">#</li>

                                @foreach($array->slice(($count-10), 10) as $data)
                                    <li class="list-group-item">{{$data->users_id}}</li>
                                @endforeach
                                </ul>
                                <ul class="list-group list-group-vertical">
                                <li class="list-group-item active">Name</li>
                                @foreach($array->slice(($count-10), 10) as $data)
                                    <li class="list-group-item">{{$data->name}}</li>
                                @endforeach
                                </ul>
                            @endif
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection