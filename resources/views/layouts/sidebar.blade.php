<div class="sb" id="sb">
	<input type="button" value="&#9776" ID="BTN" onClick="sidebar()"></input>
	<input type="button" value="&times" ID="BTNn" onClick="sidebarr()"></input>
	<section class="sec">
		<ul class="sidebar">
			<li><a href="/listuser">List User</a></li>
			<li><a href="/listproject">List Project</a></li>
			<li><a href="/calendar">Daily Report</a></li>
			<li><a href="/commandcenter">Command Center</a></li>
			<li><a href="/list_dev_request">Developer Request</a></li>
		</ul>
	</section>
	<center>
		<div class="footer" id="myDIV">
			<li class="nav-item dropdown" style="list-style: none;">
				<a id="navbarDropdown" class="btn btn-info text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{ Auth::user()->users_information[0]->name }} <span class="caret"></span>
				</a>

				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>
		</div>
	</center>
	</div>