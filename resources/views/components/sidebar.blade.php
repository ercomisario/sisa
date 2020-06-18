<nav id="sidebar" class="sidebar sidebar-collapsed toggled" style="position: absolute; z-index:5;">
	<div class="sidebar-content">
		<a class="sidebar-brand" href="{{url('/home')}}">
			<i class="align-middle" data-feather="box" style="color: #5c92c8"></i>
			<span class="" lass="align-middle">S.I.S.A.</span>
		</a>
			
		@isset($user)	
			<ul class="sidebar-nav">
			@if($user->role_id==1)
				<li class="sidebar-item">
					<a href="#nav-paciente" data-toggle="collapse" class="sidebar-link collapsed">
						<i class="align-middle fas fa-fw fa-bed"></i> <span class="align-middle">Persona</span>
					</a>
					<ul id="nav-paciente" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="{{url('/person')}}">Mis Registros</a></li>
						<!-- <li class="sidebar-item"><a class="sidebar-link" href="{{url('/medical-history')}}">Mis Registros</a></li> -->
						<!--<li class="sidebar-item"><a class="sidebar-link" href="#">Mis Citas</a></li>-->
					</ul>
				</li>
			@elseif($user->role_id==4)
				<!--<li class="sidebar-item">
					<a href="#nav-secretaria" data-toggle="collapse" class="sidebar-link collapsed">
						<i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Secretaria</span>
					</a>
					<ul id="nav-secretaria" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="#">tabs-diary</a></li>
					</ul>
				</li>-->
			@elseif($user->role_id==2)
				<li class="sidebar-item">
					<a href="#nav-paciente" data-toggle="collapse" class="sidebar-link collapsed">
						<i class="align-middle fas fa-fw fa-bed"></i> <span class="align-middle">Persona</span>
					</a>
					<ul id="nav-paciente" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="{{url('/person')}}">Mis Registros</a></li>
						<!-- <li class="sidebar-item"><a class="sidebar-link" href="{{url('/medical-history')}}">Mis Registros</a></li> -->
						<!--<li class="sidebar-item"><a class="sidebar-link" href="#">Mis Citas</a></li>-->
					</ul>
				</li>
				<li class="sidebar-item">
					<a href="#nav-medico" data-toggle="collapse" class="sidebar-link collapsed">
						<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Médico</span>
					</a>
					<ul id="nav-medico" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="{{url('/doctor')}}">Mi Agenda</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="{{url('/patient-tracking')}}">Seguimiento de Paciente</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="{{route('search')}}">Búsqueda de Pacientes</a></li>
					</ul>
				</li>
			@elseif($user->role_id==3)
				<li class="sidebar-item">
					<a href="#nav-paciente" data-toggle="collapse" class="sidebar-link collapsed">
						<i class="align-middle fas fa-fw fa-bed"></i> <span class="align-middle">Persona</span>
					</a>
					<ul id="nav-paciente" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="{{url('/person')}}">Mis Registros</a></li>
						<!-- <li class="sidebar-item"><a class="sidebar-link" href="{{url('/medical-history')}}">Mis Registros</a></li> -->
						<!--<li class="sidebar-item"><a class="sidebar-link" href="#">Mis Citas</a></li>-->
					</ul>
				</li>
				<li class="sidebar-item">
					<a href="#nav-enfermera" data-toggle="collapse" class="sidebar-link collapsed">
						<i class="align-middle" data-feather="users"></i> <span class="align-middle">Enfermera</span>
					</a>
					<ul id="nav-enfermera" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="{{url('nurse/health-care')}}">Aplicar Cuidados</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="{{url('nurse/medication')}}">Aplicar Medicaciones</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="{{url('nurse/vital-sign')}}">Carga de Signos Vitales</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="{{url('nurse/patient-evolution')}}">Evolución de Pacientes</a></li>	
						<li class="sidebar-item"><a class="sidebar-link" href="{{url('nurse/patient-discharge')}}">Egresos</a></li>						
						<!--<li class="sidebar-item"><a class="sidebar-link" href="{{url('nurse/patient-tracking')}}">Seguimiento de Pacientes</a></li>-->
					</ul>
				</li>
				<!--<li class="sidebar-item">
					<a href="#nav-estadisticas" data-toggle="collapse" class="sidebar-link collapsed">
						<i class="align-middle far fa-fw fa-chart-bar"></i> <span class="align-middle">Estadisicas</span>
					</a>
					<ul id="nav-estadisticas" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="#">Enfermedades</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="#">Medicamentos</a></li>						
						<li class="sidebar-item"><a class="sidebar-link" href="#">Paciente</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="#">Centro Medico</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="#">Adminsion</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="#">Ordenes</a></li>
					</ul>
				</li>-->
				<!--<li class="sidebar-item">
					<a href="#nav-configuracion" data-toggle="collapse" class="sidebar-link collapsed">
						<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Configuración</span>
					</a>
					<ul id="nav-configuracion" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="configuracionModulos.php"><i class="align-middle mr-2" data-feather="server"></i> Modulos</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="#"><i class="align-middle mr-2 fas fa-fw fa-male"></i> Roles</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="#"><i class="align-middle mr-2 fas fa-fw fa-sitemap"></i> Acceso Rol</a></li>			
						<li class="sidebar-item"><a class="sidebar-link" href="#"><i class="align-middle mr-2 fas fa-fw fa-users-cog"></i> Usuarios</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="#">Horario</a></li>							
						<li class="sidebar-item"><a class="sidebar-link" href="#">Medicamentos</a></li>							
						<li class="sidebar-item"><a class="sidebar-link" href="#">Enfermedades</a></li>							
					</ul>
				</li>-->
				@elseif($user->role_id==5)
				<li class="sidebar-item">
					<a href="#nav-paciente" data-toggle="collapse" class="sidebar-link collapsed">
						<i class="align-middle fas fa-fw fa-bed"></i> <span class="align-middle">Persona</span>
					</a>
					<ul id="nav-paciente" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="{{url('/person')}}">Mis Registros</a></li>
						<!-- <li class="sidebar-item"><a class="sidebar-link" href="{{url('/medical-history')}}">Mis Registros</a></li> -->
						<!--<li class="sidebar-item"><a class="sidebar-link" href="#">Mis Citas</a></li>-->
					</ul>
				</li>
				<li class="sidebar-item">
					<a href="#nav-medico" data-toggle="collapse" class="sidebar-link collapsed">
						<i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Médico</span>
					</a>
					<ul id="nav-medico" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="{{route('search')}}">Búsqueda de Pacientes</a></li>
					</ul>
				</li>
			@endif
		@endisset
		</ul>
	</div>
</nav>