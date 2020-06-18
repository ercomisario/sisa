@extends('layouts.app')
@section('title','Seguimiento de Pacientes')
@section('content')
	@component('components.navbar',['user'=>$user, 'person'=>$person, 'doctor'=>$doctor])
	@endcomponent
	@component('components.sidebar',['user' => $user])
	@endcomponent
    <main class="container-fluid padding-lateral-0">
				<div class="bg-white shadow">
					<div class="row no-gutters">
						<div class="col-lg-1  d-none d-sm-inline-block identifier-view-1"  style="">
						</div>
						<div class="col-lg-3  d-none d-sm-inline-block text-center identifier-view-2" style="">
							<span class="text-identifier-view"><strong>Seguimiento de Paciente</strong></span>
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
													<div class="col-lg-3">
	                           <p class="text-p" style="font-size: 1rem"><strong>Dr. {{$person->last_name}}</strong></p>
														<p class="text-s"><strong>Especialidad: {{$doctor->speciality->name}}</strong></p>
													</div>
													<div class="col-lg-3">
	                           <p class="text-s">C.I: {{$person->cedula}}</p>
														 <p class="text-s">Licencia: <strong> MPPS {{$doctor->license}} </strong></p>
													</div>
													<div class="col-lg-3">
	                           <p class="text-s">Número Telefónico: {{$person->phone}}</p>
													</div>
													<div class="col-lg-3">
	                           <button class="btn-floating btn btn-warning none" id="btnPacientTracking" onclick="btnPacientTracking()" style="margin-top: -6px">Listados de pacientes</button>
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
	         	  <style type="text/css">
	         	  	.easy-autocomplete.eac-2{
	         	  			width: 100% !important;
	         	  	}

	         	  	.easy-autocomplete.eac-2 input {
			         	  		width: 100% !important;
			         	  		border: 1px solid #ced4da !important;
			         	  		color: #000000 !important;
			         	  		background: #ffffff !important;
	         	  	}
	         	  </style>
				<div class="container mt-5">
					<input type="hidden" id="clinical_case_id" name="" value="">
					<input type="hidden" id="doctor_id" name="" value="{{$doctor->id}}">
					<input type="hidden" id="PersonaID" name="" value="">

					<div class="row" id="DomPatientTracking">
						<div class="col-sm-4 col-xl-4 col-lg-4">                                                          
						    <div class="list-date-diary">
						        <h4 class="mb-3 text-s ml-5"><strong>Paciente</strong></h4>
						        <div class="container-fluid" id="diary-users"> 

						        	

						        </div>
						    </div>
						</div>
						<div class="col-sm-8 col-xl-8 col-lg-8">
						  <div class="sw-container" id="sw-container">
						    
						  </div>
						</div>  
					</div>	
				</div>

				<script src="{{ asset('js/diary.js') }}" ></script>
				<script type="text/javascript">
					let asset_global='{{asset("/")}}';
				    $(document).ready(function () {
				        let route='listPatient';
				        controlador(route, null,'GET',function(data){
				            console.log(data);
				            pintarListaPatient(data);
				        });

				    });

				</script>

			</main>
@endsection