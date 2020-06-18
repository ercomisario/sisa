@extends('layouts.app')
@section('title','Nueva Cita')
@section('content')
	@component('components.navbar',['user'=>$user, 'person'=>$person])
	@endcomponent
	@component('components.sidebar',['user' => $user])
	@endcomponent
	<main class="container-fluid px-0">
		<div class="bg-white shadow">
				<div class="row no-gutters">
					<div class="col-lg-1  d-none d-sm-inline-block identifier-view-1"  style="">
					</div>
					<div class="col-lg-3  d-none d-sm-inline-block text-center identifier-view-2" style="">
						<span class="text-identifier-view"><strong>Datos del Paciente</strong></span>
					</div>
					<div class="col-12  bg-white">
						<div class="col-sm-12 col-xl-12 col-lg-12">
							<div class="row no-gutters align-self-center  mt-3">
								<div class="col-sm-12 col-xl-12 col-lg-12">
									<div class="card-body">
										<div class="row no-gutters">
											<div class="col-sm-2 col-xl-2 col-lg-2 text-center mb-3 mt-1">
	                      <img src="{{asset('img/avatars/'.$person->cedula.'.jpg')}}" width="85" height="85" class="rounded-circle" alt="{{$person->name}}">
											</div>
											<div class="col-sm-10 col-xl-10 col-lg-10">
												<div class="row">
													<div class="col-lg-9">
	                           <p class="text-p" style="font-size: 1rem"><strong>{{$person->name}}</strong></p><p class="text-s"><strong>C.I:</strong> {{$person->cedula}}</p>
													</div>
													<div class="col-lg-3 btn-crear-cita align-items-center float-right">
														<a class="btn btn-danger shadow" href="{{url('patientForm')}}"><strong>Cancelar Cita</strong></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>	
				</div>
		</div>
		<!-- FORM DATOS DEL PACIENTE -->
		<div class="row mt-3 pt-2 pb-2 row-content">
			<div class="col-12 mb-3">
				<div class="text-s text-identifier-view"><span><strong>Datos Personales</strong></span></div>
			</div>
			<div class="col-12 col-content rounded-lg shadow">
				<i class='far fa-fw fa-edit icon-top-right' style='cursor:pointer'></i>
				<form action="" method="POST" class="patientDataForm">
					@csrf
					<div class="row mb-3">
						<div class="form-group col-4">
							<label for="cedula"><strong>Cédula</strong></label>
							<input type="phone" name="cedula" id="cedula" class="form-control" placeholder="Número de cédula..." disabled>
							<div class="helpCedula">
								<small class=""></small>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="form-group col-4">
							<label for="nombre-paciente"><strong>Nombres del Paciente</strong></label>
							<input type="text" name="nombre-paciente" id="nombre-paciente" class="form-control" placeholder="Ingrese los nombres..." disabled>
						</div>					
						<div class="form-group col-4">
							<label for="apellido-paciente"><strong>Apellidos del Paciente</strong></label>
							<input type="text" name="apellido-paciente" id="apellido-paciente" class="form-control" placeholder="Ingrese los apellidos..." disabled>
						</div>	
					</div>
					<div class="row mb-3 d-flex justify-content-between">
						<div class="form-group col-3">
							<label for="fecha-nacimiento"><strong>Fecha de Nacimiento</strong></label>
							<input type="date" name="fecha-nacimiento" id="fecha-nacimiento" class="form-control" disabled>
						</div>
						<div class="form-group col-3">
							<label for="sexo"><strong>Sexo</strong></label>
							<select name="sexo" id="sexo" class="form-control" disabled>
								<option value="">Seleccione</option>
								<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>
							</select>
						</div>
						<div class="form-group col-3">
							<label for="sangre"><strong>Tipo de Sangre</strong></label>
							<select name="sangre" id="sangre" class="form-control" disabled>
								<option value="">Seleccione</option>
								<option value="ORH+">ORH+</option>
							</select>
						</div>
					</div>
					<div class="row mb-3">
						<div class="form-group col">
							<label for="telefono"><strong>Teléfono del Paciente</strong></label>
							<input type="tel" name="telefono" id="telefono" placeholder="Ingrese el número de teléfono..." class="form-control" disabled>
						</div>
						<div class="form-group col">
							<label for="correo"><strong>Correo del Paciente</strong></label>
							<input type="email" name="correo" id="correo" class="form-control" placeholder="ejemplo@ejemplo.com" disabled>
						</div>
						<div class="form-group col">
							<label for="seguro"><strong>Seguro</strong></label>
							<input type="text" name="seguro" id="seguro" class="form-control" placeholder="Seguro..." disabled>
						</div>
					</div>
					<div class="location-form" hidden>
						<hr>			
						<div class="row mb-3">
							<div class="form-group col-6">
								<label for="estado"><strong>Estado</strong></label>
								<select name="estado" id="estado" class="form-control" disabled>
									<option value="">Seleccione...</option>
									<option value="Sucre">Sucre</option>
								</select>
							</div>
							<div class="form-group col-6">
								<label for="municipio"><strong>Municipio</strong></label>
								<select name="municipio" id="municipio" class="form-control" disabled>
									<option value="">Seleccione...</option>
									<option value="Sucre">Sucre</option>
								</select>
							</div>
							<div class="form-group col-6">
								<label for="ciudad"><strong>Ciudad</strong></label>
								<select name="ciudad" id="ciudad" class="form-control" disabled>
									<option value="">Seleccione..</option>
									<option value="Cumana">Cumana</option>
								</select>
							</div>
							<div class="form-group col-6">
								<label for="parroquia"><strong>Parroquia</strong></label>
								<select name="parroquia" id="parroquia" class="form-control" disabled>
									<option value="">Seleccione...</option>
									<option value="Altagracia">Altagracia</option>
								</select>
							</div>
							<div class="form-group col-6">
								<label for="sector"><strong>Sector</strong></label>
								<select name="sector" id="sector" class="form-control" disabled>
									<option value="">Seleccione...</option>
									<option value="Los Roques">Los Roques</option>
								</select>
							</div>
							<div class="form-group col-3">
								<label for="casa"><strong>Nº Casa / Apartamento</strong></label>
								<input type="text" name="casa" id="casa" class="form-control" placeholder="Número de casa o apartamento..." disabled>
							</div>
						</div>	
						</div>
					<div class="row d-flex justify-content-end mb-3">
						<div class="form-group col-2">
							<span class="continue-icon-span" >
								<div style="width:42px; height:42px; border-radius: 50px;" class="shadow">
									<i class="fas fa-arrow-circle-right fa-3x continue-icon" style="cursor:pointer;"></i>
								</div>
							</span>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--FORM DATOS DE LA CITA-->
		<div class="row mt-3 pt-2 row-content">
			<div class="col-12 mb-3">
				<div class="text-s text-identifier-view"><span><strong>Especialidad y Doctor</strong></span></div>
			</div>
			<div class="col-12 col-content rounded-lg shadow">
				<form action="" method="POST">
					@csrf
					<div class="row mb-3">
						<div class="form-group col-6">
							<label for="especialidad"><strong>Especialidad</strong></label>
							<select name="especialidad" id="especialidad" class="form-control">
								<option value="">Seleccione...</option>
							</select>
						</div>
						<div class="form-group col-3">
							<label for="fecha-hora"><strong>Fecha y Hora</strong></label>
							<input type="date" name="fecha-hora" id="fecha-hora" class="form-control">
						</div>
					</div>
					<div class="row mb-3">
						<div class="form-group col-6">
							<label for="doctores"><strong>Doctores Disponibles</strong></label>
							<select name="doctores" id="doctores" class="form-control">
								<option value="">Seleccione...</option>
							</select>
						</div>
						<div class="col-6">
							<div class="row border shadow rounded-lg py-3">
								<div class="col-3 d-flex align-content-center flex-wrap pl-5">
										<img src="" alt="" class="rounded-circle" style="background-color: #12375c; height:50px; width:50px;">
								</div>
								<div class="col">
									<span><strong>Dr Apellido, Nombre</strong></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<label for="motivo-consulta"><strong>Motivo de la Consulta</strong></label>
							<textarea name="motivo-consulta" id="motivo-consulta" class="form-control" placeholder="Ingrese el motivo de la consulta..."></textarea>
						</div>
					</div>
					<!-- BOTONES ATRAS ADELANTE -->
				</form>
			</div>
		</div>
	</main>
	<script>
		$(document).ready(function(){
			$('.icon-top-right').hide();
			$.get('stateSelect',function(response){
				console.log(response);	
			})
			$.get('municipalitySelect',function(response){
				console.log(response);	
			})
			$.get('citySelect',function(response){console.log(response);})
			$.get('parishSelect',function(response){console.log(response);})
			$.get('sectorSelect',function(response){console.log(response);})

			$('#cedula').removeAttr('disabled');
			$('#cedula').keyup(function(e){
			    if(e.keyCode == 13)
			    {
			        $(this).trigger("enterKey");
			    }
			});
			
			$('#cedula').focus();
			//Search on Enter Key
			$('#cedula').bind("enterKey",function(e){
			   $.get('patientFormSearch',{'cedula':$('#cedula').val()},function(response){
					var patientData = JSON.parse(response);
					if(patientData.success == true){ //if cedula is found
						//Remove and hide css classes on delete key
						$('#cedula').keyup(function(event) {
							
							$('.icon-top-right').hide('medium');
							if($('.helpCedula').hasClass('valid-feedback')){
								$('.helpCedula').hide();
								$('#cedula').removeClass('is-valid');
							}else{
								$('.helpCedula').hide();
								$('#cedula').removeClass('is-invalid');
							}
						});
						$('.icon-top-right').show('medium');
						$('#cedula').removeClass('is-invalid').addClass('is-valid');
						$('#cedula').removeClass('is-invalid').addClass('is-valid');
						$('.helpCedula small').text('Cédula Encontrada.');
						$('.helpCedula').removeClass('invalid-feedback').addClass('valid-feedback');
						$('.helpCedula').show();
						//Filling form
						patientData.message.forEach(function(patient){
							//console.log(patient.person_name);
							$('#fecha-nacimiento').val(patient.birthday);
							$('#nombre-paciente').val(patient.person_name);
							$('#apellido-paciente').val(patient.last_name);
							$('#correo').val(patient.email);
							$('#telefono').val(patient.phone);
							$('#seguro').val(patient.social_number);
							$('#sangre').val(patient.blood_type);
							$('#sexo').val(patient.sexo);

							$('#estado').val(patient.state).change();
							$('#municipio').val(patient.municipality).change();
							$('#parroquia').val(patient.parish).change();
							$('#ciudad').val(patient.city).change();
							$('#sector').val(patient.sector).change();
							$('#casa').val(patient.street);
						})//End filling form
						$('form.patientDataForm :input').each(function(){
							//$(this).attr('disabled',false);
						});
					}else{ //if cedula not found
						$('.icon-top-right').hide('medium');
						$('#cedula').removeClass('is-valid').addClass('is-invalid');
						$('.helpCedula small').text('Cédula No Encontrada.');
						$('.helpCedula').removeClass('valid-feedback').addClass('invalid-feedback');
						$('.helpCedula').show();
						$('#cedula').removeClass('is-indvalid');

						//Remove and hide css classes on delete key
						$('#cedula').keyup(function(event) {
						
							console.log('click');
							$('.icon-top-right').hide('medium');
							if($('.helpCedula').hasClass('valid-feedback')){
								$('.helpCedula').hide();
								$('#cedula').removeClass('is-valid');
							}else{
								$('.helpCedula').hide();
								$('#cedula').removeClass('is-invalid');
							}
						});
						console.log(patientData.message);
					}
				})
			});
		})
	</script>
	<style>
		.row-content{
    		padding-right: 100px;
    		padding-left: 100px;
    		margin-right:0px;
    		margin-left:0px;
    	}
    	.col-content{
    		padding-top: 20px;
    		padding-right: 50px;
    		padding-left: 50px;
    		background-color: white;
    	}
    	.btn-crear-cita{
    		position: absolute;
    		right: 0;
    		top:30px;
    	}
    	.icon-top-right{
    		color: #5c92c8;
    		position:absolute;
    		top:20px;
    		right:20px;
    	}
    	.continue-icon-span{
    		color:#24aaff;
    		-webkit-transition: color 200ms linear;
		    -ms-transition: color 200ms linear;
		    transition: color 200ms linear;
    	}
    	.continue-icon-span:hover{
    		color: #52bcff;
    		-webkit-transition: color 200ms linear;
		    -ms-transition: color 200ms linear;
		    transition: color 200ms linear;
    	}
	</style>
@endsection