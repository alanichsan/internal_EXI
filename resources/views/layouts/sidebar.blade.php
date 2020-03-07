<div class="sb" id="sb">
	<input type="button" value="&#9776" ID="BTN" onClick="sidebar()"></input>
	<input type="button" value="&times" ID="BTNn" onClick="sidebarr()"></input>
	<section class="sec">
		<ul class="sidebar">
			<li><a href="/formuser">Form User</a></li>
			<li><a href="/commendcenter"> Command Center</a></li>
			<li><a href="/formproject">Form Project</a></li>
		</ul>
	</section>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-8"> @guest
					@if (Route::has('register'))
					@endif
					@else
					<li class="nav-item dropdown" style="list-style: none;">
						<a id="navbarDropdown" class="btn btn-info dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->users_information[0]->name }} <span class="caret"></span>
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
				</div>
			</div>
		</div>
	</div>
</div>