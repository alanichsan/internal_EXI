<div class="sb" id="sb">
	<input type="button" value="&#9776" ID="BTN" onClick="sidebar()"></input>
	<input type="button" value="&times" ID="BTNn" onClick="sidebarr()"></input>
	<center>
		<img src="{{ asset('favicon_exi.png') }}" alt="" style="margin-top:30px; margin-bottom:50px">
	</center>

	<section class="sec">
		<ul class="sidebar">
			<li><a href="/listuser">List User</a></li>
			<li><a href="/listproject">List Project</a></li>
			<li><a href="/calendar">Daily Report</a></li>
			<li><a href="/commandcenter">Command Center</a></li>
			<li><a href="/list_dev_request">Developer Request</a></li>
			<li><a href="/projecttimeline">Project Timeline</a></li>
		</ul>
	</section>
	<footer class="page-footer font-small blue">
		<div class="side-footer py-3">
					<a class="btn btn-primary text-white " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST">
						@csrf
					</form>
				</div>
	</footer>
</div>