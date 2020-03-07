@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded p-5">
                <ul class="navbar-nav ml-2">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('register'))
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="btn btn-info dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
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