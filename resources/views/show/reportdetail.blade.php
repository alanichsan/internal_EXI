@php( $data = \App\Report::where('id', $report)->get())
@extends('layouts.app')

@section('content')
@php( $users = \App\User::where('id', $data[0]->user_id)->get())
<h1>{{$data[0]->id}}</h1>
<h1>{{$data[0]->title}}</h1>
<h1>{{$users[0]->users_information[0]->name}}</h1>
<h1>{{$data[0]->content}}</h1>
<h1>{{$data[0]->start}}</h1>
<h1>{{$data[0]->end}}</h1>
@endsection