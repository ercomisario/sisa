<style type="text/css">
	.easy-autocomplete input{
		width: 251px !important;
		border: 1px solid #5c92c8 !important;
		border-right: none !important;
		background: #214a72 !important;
		color: #fff !important;
	}
</style>

<nav class="navbar navbar-expand navbar-light" style=" background-color: #12375c">
	<a class="sidebar-toggle d-flex mr-2">
        <i class="hamburger align-self-center" style=""></i>
      </a>
	<div class="search-world" id="search-input-global">
		@isset($user)
			@if($user->role_id != 2)
			
			@else
				<form action="{{route('search')}}" method="POST" role="search" class="form-inline d-none d-sm-inline-block">
					@csrf
					<div class="input-group">
						<input id= "patient" type="text" class="form-control input-search" name="busqueda" placeholder="Buscar..." aria-label="Search" style="">
						<div class="input-group-append">
							<span class="input-group-text icon-search" style=""><i class="fas fa-fw fa-search" style="color: #5c92c8"></i></span>
						</div>
					</div>
				</form>
			@endif
		@endisset
	</div>
	<div class="navbar-collapse collapse">
		<ul class="navbar-nav ml-auto">
			<!--
			<li class="nav-item dropdown" style="padding-right: 0px">
				<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
					<div class="position-relative">
						<i class="align-middle" data-feather="bell" style="color: #5c92c8"></i>
						<span class="indicator">4</span>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
					<div class="dropdown-menu-header">
						4 New Notifications
					</div>
					<div class="list-group">
						<a href="#" class="list-group-item">
							<div class="row no-gutters align-items-center">
								<div class="col-2">
									<i class="text-danger" data-feather="alert-circle"></i>
								</div>
								<div class="col-10">
									<div class="text-dark">Update completed</div>
									<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
									<div class="text-muted small mt-1">2h ago</div>
								</div>
							</div>
						</a>
						<a href="#" class="list-group-item">
							<div class="row no-gutters align-items-center">
								<div class="col-2">
									<i class="text-warning" data-feather="bell"></i>
								</div>
								<div class="col-10">
									<div class="text-dark">Lorem ipsum</div>
									<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
									<div class="text-muted small mt-1">6h ago</div>
								</div>
							</div>
						</a>
						<a href="#" class="list-group-item">
							<div class="row no-gutters align-items-center">
								<div class="col-2">
									<i class="text-primary" data-feather="home"></i>
								</div>
								<div class="col-10">
									<div class="text-dark">Login from 192.186.1.1</div>
									<div class="text-muted small mt-1">8h ago</div>
								</div>
							</div>
						</a>
						<a href="#" class="list-group-item">
							<div class="row no-gutters align-items-center">
								<div class="col-2">
									<i class="text-success" data-feather="user-plus"></i>
								</div>
								<div class="col-10">
									<div class="text-dark">New connection</div>
									<div class="text-muted small mt-1">Anna accepted your request.</div>
									<div class="text-muted small mt-1">12h ago</div>
								</div>
							</div>
						</a>
					</div>
					<div class="dropdown-menu-footer">
						<a href="#" class="text-muted">Show all notifications</a>
					</div>
				</div>
			</li>

		-->
			<li class="nav-item dropdown">		
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" style="color: #5c92c8">
					@isset($person)
						<img src="{{asset('img/avatars/'.$person->cedula.'.jpg')}}" class="avatar rounded-circle mr-1" alt="{{$person->name}} avatar" /> 
					@endisset
          <div class="d-none d-sm-inline-block text-center">
			  @isset($user)
				<span class="text-light"> 
					@if($user->role_id==2)
						Dr. {{$person->last_name}}
					@else
						{{$person->last_name}}
					@endif
				</span>				                		  
			  @endisset
          </div>
        </a>
				<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="/person/@isset($user){{$person->id}}"@endisset><i class="align-middle mr-1" data-feather="user"></i>Mi Perfil</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{url('/logout')}}">Salir</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
<!--inicio codigo para autocompletado-->
<form id="form1" action="{{route('patient')}}" method="POST" style="display:none">
	@csrf
	<input id="patient_id" type='hidden' name='patient_id' value=""/>
</form>
<script type="text/javascript">
		
		$(document).ready(function(){
			var options = {
				url: function(search) {
	       			return "{{route('patient.search')}}?search=" + search;
	   			},
	 
	   			getValue: function(patient) {
							return patient.name+" C.I.:"+patient.cedula;
				},
				
				list: {
	        		onChooseEvent: function() {
	            	var selectedPatient ;
					selectedPatient = $("#patient").getSelectedItemData().id;
					$( "#patient_id" ).val( selectedPatient );
					$("#form1").submit();
				
					}
	        	}
			};
			$("#patient").easyAutocomplete(options);
		});

</script>
<!--fin codigo para autocompletado-->	