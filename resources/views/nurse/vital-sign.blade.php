@extends('layouts.app')
@section('title','Carga de Signos Vitales')
@section('content')
@isset($person)
    @component('components.navbar',['user' => $user,'person'=>$person])
	@endcomponent
	@component('components.sidebar',['user' => $user])
	@endcomponent
@endisset
    <main class="container-fluid padding-lateral-0">
				<div class="bg-white shadow">
					<div class="row no-gutters">
						<div class="col-lg-1  d-none d-sm-inline-block identifier-view-1"  style="">
						</div>
						<div class="col-lg-3  d-none d-sm-inline-block text-center identifier-view-2" style="">
							<span class="text-identifier-view"><strong>Signos Vitales</strong></span>
						</div>
						<div class="col-12  bg-white">
							<div class="col-sm-12 col-xl-12 col-lg-12">
								<div class="row no-gutters align-self-center  mt-3">
									<div class="col-sm-12 col-xl-12 col-lg-12">
										@isset($person)
										<div class="card-body">
											<div class="row no-gutters">
												<div class="col-sm-2 col-xl-2 col-lg-2 text-center mb-3">
													<img src="{{asset('img/avatars/'.$person->cedula.'.jpg')}}" width="64" height="64" class="rounded-circle" alt="{{$person->name}}">
												</div>
												<div class="col-sm-10 col-xl-10 col-lg-10">
													<div class="row">
														<div class="col-lg-3">
														<p class="text-p" style="font-size: 1rem"><strong>{{$person->last_name}},{{$person->name}}</strong></p>
															<!--<p class="text-s">Especialidad</p>-->
														</div>
														<div class="col-lg-3">
															<p class="text-s">C.I: {{$person->cedula}}</p>
															<p class="text-s">Nº de Matricula: {{$nurse->license}}</p>
														</div>
														<div class="col-lg-3">
															<p class="text-s">Tlf: {{$person->phone}}</p>
														</div>	
													</div>
												</div>
											</div>
										</div>
										@endisset
									</div>	
								</div>
							</div>
						</div>	
					</div>
				</div>
				<div class="container-fluid">
						<div class="container mt-5">
						  <div class="row">
						    <div class="col-sm-4 col-xl-4 col-lg-4">                                                          
										<h1 class="h3 mb-3 text-s ml-5 mb-4"><strong>Paciente en Piso</strong></h1>
						        <div class="list-date-diary">
						          <div class="container" id="DomListadoPaciente">
						            
						          </div>
						        </div>
						    </div>
						    <div class="col-sm-8 col-xl-8 col-lg-8">
						    		<h1 class="h3 mb-3 text-s ml-5 mb-4"><strong>Datos del Paciente</strong></h1>
						    		<div class="col-12">
			                <div class="card shadow card-border card-mb-10">
			                	<div class="card-body">
			                		<div class="row">
			                				<div class="col-2 text-center" id="CardPacieteAvatars">
			                				</div>
			                				<div class="col-10">
			                					<span class="text-p" style="" id="CardPacieteName"></span><br>
												<span class="text-p" style="" id="CardPacieteEdad"></span>
												<input type="hidden" id="CardPacieteId" value="">
												<input type="hidden" id="CardPacieteCasoClinico" value="">
												<input type="hidden" id="CardPacieteIdEnf" value="{{$nurse->id}}">
			                				</div>
			                		</div>
			                	</div>
		                	</div>  
					          </div>
					          <div class="col-12">
					          	<div class="row no-gutters">
					          		<div class="col-3"></div>
					          		<div class="col-2 text-center"><span class="text-s"><strong>Temp. (ºC)</strong></span></div>
					          		<div class="col-2 text-center"><span class="text-s"><strong>Pulso (ppm)</strong></span></div>
					          		<div class="col-2 text-center"><span class="text-s"><strong>Resp. (rpm)</strong></span></div>
					          		<div class="col-3 text-center"><span class="text-s"><strong>T.A. (mmHg)</strong></span></div>
					          	</div>
						          <div class="card shadow card-border card-mb-10">
	    									<div class="card-body">
	    										<div class="row">
	    											<div class="col-12 list-date-vital-sign" id="CardPacieteVitalSign"> 
	    												  

	    											</div>  
	    										</div>
	    									</div>
	    								</div>
	    								<div class="card shadow card-border card-mb-10">
	    									<div class="card-body">
	    										<form method="POST" action="javascript:guardarVitalSign()">
	    											@csrf
		    										<div class="row no-gutters">
		    											<div class="col-3 align-self-center">
												  			<p style="" class="text-center text-p" id="CardPacieteInfo"> </p>
												  		</div>
								          		<div class="col-2  align-self-center">
								          			<div class="form-group" style="margin-left: 20%; width: 50%">
																	<input required onkeypress="return solo_numeric(event)" type="text" class="form-control" id="InputTemp" placeholder="ºC">
																</div>
								          		</div>
								          		<div class="col-2 text-center align-self-center">
								          			<div class="form-group" style="margin-left: 20%; width: 50%">
								          				<input required onkeypress="return solo_numeric(event)" type="text" class="form-control" id="InputPulso" placeholder="ppm">
								          			</div>
								          		</div>
								          		<div class="col-2 text-center align-self-center">
								          			<div class="form-group" style="margin-left: 20%; width: 50%">
								          				<input required onkeypress="return solo_numeric(event)" type="text" class="form-control" id="InputResp" placeholder="rpm">
								          			</div>
								          		</div>
								          		<div class="col-3 text-center align-self-center">
								          			<div class="row no-gutters ">
								          				<div class="col-6">
								          					
											          			<div class="form-group" style="width: 100%">
											          				<input required onkeypress="return solo_numeric(event)" type="text" class="form-control" id="InputTAmax" placeholder="MAX">
											          			</div>
								          				</div>
								          				<div class="col-6">
								          						
											          			<div class="form-group" style="width: 100%">
											          				<input required onkeypress="return solo_numeric(event)" type="text" class="form-control" id="InputTAmin" placeholder="MIN">
											          			</div>
								          				</div>
								          			</div>
								          		</div>
															<div class="col-12 text-right"> 
																<button type="submit" class="btn btn-warning" style="" onclick=""><strong>Guardar</strong></button>
															</div>
		    										</div>
	    										</form>
	    									</div>
	    								</div>
					          </div>						       
						    </div>
						  </div>
						</div>
				</div>

				<script src="{{ asset('js/vitalsign.js') }}" ></script>
				<script type="text/javascript">

						let asset_global='{{asset("/")}}';
						
						$(document).ready(function () {

								cargarInfoRegSignVital();
								let route='GetListadoPaciente';
								controlador(route, null,'GET',function(data){
								    console.log(data);
								    pintarListaPaciente(data);
								});

						});

				</script>
			</main>
@endsection