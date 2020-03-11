@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded p-5">
                <div class="header mt-4">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="alert alert-success" role="alert">
                    Hello 
                    {{ Auth::user()->users_information[0]->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection