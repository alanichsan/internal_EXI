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
                        You are logged in!<br>
                    </div>
                    <br> <a href="/commendCenter" class="btn btn-primary float-right">Go to home <span class="my-3">&#8250;</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection