@extends('layouts.app')
@section('title','Búsqueda de Pacientes')
@section('content')
@isset($user)
	@component('components.navbar',['user' => $user,'person'=>$person])
	@endcomponent
	@component('components.sidebar',['user' => $user])
	@endcomponent
@endisset
    <div class="bg-white shadow">
					<div class="row no-gutters">
						<div class="col-lg-1  d-none d-sm-inline-block identifier-view-1"  style="">
						</div>
						<div class="col-lg-3  d-none d-sm-inline-block text-center identifier-view-2" style="">
							<span class="text-identifier-view"><strong>Búsqueda de Paciente</strong></span>
						</div>
						<div class="col-12  bg-white">
							<div class="card-body">
								<form action="{{route('search')}}" method="POST">
									@csrf
									<div class="form-row mt-2 mb-2">
										<div class="form-group col-md-2 col-lg-2">
										</div>

										<div class="form-group col-md-4 col-lg-4">
											<!-- <label for="nombre_menu">Ingrese un Dato</label> -->
											<div class="input-group">
												<input type="text" name="busqueda" class="form-control input-search-2" placeholder="Cedula o Nombre del Paciente" aria-label="Search" style="">
												<div class="input-group-append">
													<span class="input-group-text icon-search-2" style=""><i class="fas fa-fw fa-search" style="color: #5c92c8"></i></span>
												</div>
											</div>
										</div>		
									</div>
								</form>
							</div>
						</div>	
					</div>
				</div>
				<div class="container">
					  <div class="row mt-5 mb-2">
					  	<div class="col-sm-1 col-xl-1 col-lg-1 text-center"></div>
					  	<div class="col-sm-2 col-xl-2 col-lg-2 text-center"><strong class="text-p">Cédula </strong></div>
					  	<div class="col-sm-2 col-xl-2 col-lg-2 text-center"><strong class="text-p">Apellido, Nombre </strong></div>
					  	<div class="col-sm-2 col-xl-2 col-lg-2 text-center"><strong class="text-p">Sexo </strong></div>
					  	<div class="col-sm-2 col-xl-2 col-lg-2 text-center"><strong class="text-p">Edad </strong></div>
					  	<div class="col-sm-2 col-xl-2 col-lg-2 text-center"><strong class="text-p">Fecha de Nacimiento </strong></div>
					  	<div class="col-sm-1 col-xl-1 col-lg-1 text-center"></div>
					  </div>
						<div class="row">
							@isset($message)
								{{$message}}
							@endisset
							@isset($patients)
								@if ($patients)
									@foreach($patients as $patient)
										@component('components.search-person-card',['patient'=>$patient])
										@endcomponent
									@endforeach									
								@else
								<div class="alert alert-primary col mt-5">
									<div class="alert-message">
										<h1 class="text-center text-white font-weight-bold">Por favor introduzca los datos requeridos en el campo de búsqueda</h1>
									</div>
								</div>
									
										
								@endif
							@endisset
						</div> <!--end div row -->
				</div>
@endsection