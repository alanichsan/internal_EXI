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
                    <a class="btn btn-primary text-white " href="{{ route('logout') }}" data-toggle="modal" data-target="#exampleModalCenter">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </footer>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="modal-body">
                                    <center>
                                        <i class="fa fa-exclamation-circle" style="font-size:100px;color:red"></i>
                                        <h4 class="mt-4"><b>Are you sure?</b></h4>
                                        <h6>You won't be able to revert this!</h6>
                                    </center>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Yes, insert it!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    //Modal
                    $('#myModal').on('shown.bs.modal', function() {
                        $('#myInput').trigger('focus')
                    })
                </script>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection