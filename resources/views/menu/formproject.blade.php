@extends('layouts.app')

@section('content')
<div class="containers mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">Form User</div>
                <form method="POST" action="{{ url('/students')}}" enctype="multipart/form-data" class="my-5">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Project</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"" id=" name" placeholder="Input Name" name="nama" value="">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Perusahaan">Perusahaan</label>
                        <input type="text" class="form-control @error('Perusahaan') is-invalid @enderror" id="Perusahaan" placeholder="Input Perusahaan" name="Perusahaan" value="">
                        @error('Perusahaan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Status">Status Project</label>
                        <select class="form-control @error('Status') is-invalid @enderror" id="Status" placeholder="Input Status Project">
                            <option>Potensial</option>
                            <option>Quotation Letter (Penawaran Harga)</option>
                            <option>BRD (Customer dari Customer Atau Kita)</option>
                            <option>PO (Purchase Order)</option>
                            <option>Development</option>
                            <option>Testing</option>
                            <option>Live</option>
                            <option>Maintenance</option>
                            <option>Finished (Project Selesai dikerjakan dan seluruh administrasi sudah clear)</option>
                            <option>Passed (Tidak dapet Projectnya)</option>
                        </select>
                        @error('Role')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection