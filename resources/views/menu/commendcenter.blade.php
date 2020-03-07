@extends('layouts.app')

@section('content')
<div class="containers mt-5">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card p-5 shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-header">Commend Center</div>
        <div class="card-body my-5">
          <ul style="list-style: none;">
            <li>

              <label class="customcheck" for="option">
                <input type="checkbox" id="option">
                Semua
                <span class="checkmark"></span>
              </label>

              <input type="checkbox" id="cbx" style="display: none;">

              <ul style="list-style: none;" class="ml-5">
                <li><label class="customcheck"><input type="checkbox" class="subOption">User<span class="checkmark"></span></label></li>
                <li><label class="customcheck"><input type="checkbox" class="subOption">Biro<span class="checkmark"></span></label></li>
                <li><label class="customcheck"><input type="checkbox" class="subOption">Lokasi Perangkat<span class="checkmark"></span></label></li>
                <li><label class="customcheck"><input type="checkbox" class="subOption">Gate<span class="checkmark"></span></label></li>
                <li><label class="customcheck"><input type="checkbox" class="subOption">Point Of Sale Desktop<span class="checkmark"></span></label></li>
                <li><label class="customcheck"><input type="checkbox" class="subOption">Lokasi Perangkat<span class="checkmark"></span></label></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection