@extends('layouts.side')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-12">
            <div class="card shadow-lg mb-5 bg-white rounded p-5">
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
                <footer class="page-footer font-small blue ml-3">
                    <a class="btn btn-primary text-white " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
            </footer>
            </div>
        </div>
    </div>
</div>
@endsection