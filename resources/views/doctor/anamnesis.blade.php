@extends('layouts.app')
@section('title','Registro de Anamnesis')
@section('content')
@isset($user,$person)
	@component('components.navbar',['user'=>$user , 'person'=>$person])	
	@endcomponent
	@component('components.sidebar',['user'=>$user , 'person'=>$person])
@endcomponent
@endisset
			<main class="container-fluid padding-lateral-0">
				<div class="bg-white shadow">
					<div class="row no-gutters">
						<div class="col-lg-1  d-none d-sm-inline-block identifier-view-1"  style="">
						</div>
						<div class="col-lg-3  d-none d-sm-inline-block text-center identifier-view-2" style="">
							<span class="text-identifier-view"><strong>Regristro de anamnesis</strong></span>
						</div>
						<div class="col-12  bg-white">
							<div class="col-sm-12 col-xl-12 col-lg-12">
								<div class="row no-gutters align-self-center  mt-3">
									<div class="col-sm-12 col-xl-12 col-lg-12">
										<div class="card-body">
											<div class="row no-gutters">
												<div class="col-sm-2 col-xl-2 col-lg-2 text-center mb-3 mt-1">
		                      <img src="{{asset('img/avatars/'.$patient->cedula.'.jpg')}}" width="85" height="85" class="rounded-circle" alt="{{$patient->name}}">
												</div>
												<div class="col-sm-10 col-xl-10 col-lg-10">
													<div class="row">
															<div class="col-lg-3">
																<p class="text-p" style="font-size: 1rem"><strong>Nombre. {{$patient->name}}</strong></p>
															</div>
															<div class="col-lg-3">
																<p class="text-s">C.I: {{$patient->cedula}}</p>
															</div>
															<div class="col-lg-3">
																<p class="text-s">Número Telefónico: {{$patient->phone}}</p>
															</div>	
															<div class="col-lg-3">
																<button class="btn-floating btn btn-warning none" id="DoctorAgenda" onclick="window.location='/doctor'" style="margin-top: -6px">Regresar a la agenda</button>
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
				
				<div class="container">
						<div class="row justify-content-center mt-3 mb-3" >
							<div class="col-lg-2 text-center">
								<strong><span class="text-p" id="TitleAnalisisSubjetivo" >ANÁLISIS SUBJETIVO</span></strong>
							</div>
							<div class="col-lg-2 text-center">
								<strong><span class="text-s" id="TitleAnalisisObjetivo" >EXAMEN FÍSICO</span></strong>
							</div>
							<div class="col-lg-2 text-center">
								<strong><span class="text-s" id="TitleOrdenes">ORDENES</span></strong>
							</div>
						</div>
						<div class="row justify-content-center mb-4">
							<div class="col-lg-6 text-center" style="padding-right: 0px; padding-left: 0px">
								<div class="progress mb-3">
										<div class="progress-bar" role="progressbar" style="width: 0.00%; background-color: #ff9d00"  aria-valuemin="0" aria-valuemax="100"><!-- <span class="progress-bar-text">0%</span> --></div>
									</div>
							</div>
						</div>

						<input type="hidden" id="clinical_case_id" name="" value="{{$clinical_case->id}}">
						<input type="hidden" id="doctor_id" name="" value="{{$doctor->id}}">
						<div class="row justify-content-center mt-3 mb-3" id="DomAnamnesis">

							<div class="col-6 text-center">
								<style type="text/css">
									.subjetivo-step .nav-tabs {
										border-bottom: 0px solid #fff
									}

									.subjetivo-step .sw-toolbar-bottom {
									    background: #fff;
									    border-top: 0px solid #fff !important;

									}

									.subjetivo-step .sw-container  {
										  min-height: 417px !important;
											box-shadow: 0 0 0rem 0 rgba(0,0,0,.0);
									}

									.custom-control-label:before{
									  background-color:#fafafa;
									  border-color: grey;
									}
									.custom-checkbox .custom-control-input:checked~.custom-control-label::before{
									  background-color:#5c92c8;
									}
									.custom-checkbox .custom-control-input:focus~.custom-control-label::before{
								      box-shadow: 0 0 0 0px #fff, 0 0 0 0.0rem #5c92c8; 
								    }


								</style>
								<div class="">
									<div id="" class="subjetivo-step wizard wizard-success mb-4" style="box-shadow: 0 0 .875rem 0 rgba(53, 64, 82, .05);"> 
										<br>
										<!-- <a class="" href="javascript:;" onclick="shwoNavegacion()">
											<h4 class="text-center text-s"> Navegacion</h4>	
										</a> -->
										
										<ul id="printAnalysisGroups" style="display: none;">

										</ul>											

										<div id="printItemGroups">
											
											
										</div>

									</div>
								</div>
							</div>
							<div class="col-6 text-center">
								<div class="card" style="min-height: 466px">
									<div class="card-body">
										<h4 class="text-center text-s">Observaciones</h4>
										
										<div class="row list-observations-history">
											<div id="observacionesCheckbox">
												
											</div>			
											<div class="col-12" style="display: none;" id="divTextareaDesc">
												<textarea class="form-control" rows="2" placeholder="Textarea" onchange="" id="TextareaCheckboxSelection" style="width: 98%" autofocus></textarea>
												<div class="text-right mt-1" style="">
														<button class="btn btn-warning" onclick="getTextDesc()"> guardar</button>
												</div>
											</div>												
										</div>

									</div>
								</div>
							</div>
						</div>
				</div>

				
				
				<script src="{{ asset('js/anamnesis.js') }}" ></script>
				<script type="text/javascript">
						let JSON_VARIABLES = [];
						let JSON_VARIABLES_IMPORTANT = [];
						let ID_ACTUAL = '';
						let VALOR_ACTUAL = '';
						let CONT_SIG = 0;

						$(document).ready(function () {
								

								
								let route='GetItemsAnamnesis';
								controlador(route,null,'GET',function(data){

									start(data);
									
									$(".subjetivo-step").smartWizard({
									    theme: "default",
									    showStepURLhash: false,
									    keyNavigation: false,
									    toolbarSettings: {
									        toolbarExtraButtons: [$("<button id=\"finishProceso\" class=\"btn btn-submit btn-warning none\" onclick=\"terminar()\" type=\"button\">Finalizar</button>")]
									    }
									});
									


									let porProgressBar = 0;
									$('.sw-btn-next').on('click', function () {
									    getTextDesc();
									    let porsentaje = (porProgressBar + 1.85);
									    porProgressBar = porsentaje;
									    porsentaje += "%";


									    if(CONT_SIG==17){
									    	$("#TitleAnalisisSubjetivo").removeClass('text-p');
									    	$("#TitleAnalisisSubjetivo").addClass('text-s');

									    	$("#TitleAnalisisObjetivo").removeClass('text-s');
									    	$("#TitleAnalisisObjetivo").addClass('text-p');
									    }

									    if(CONT_SIG < 37){
										    console.log(porsentaje);
										    $(".progress-bar").css("width", porsentaje);
										    $(".progress-bar-text").empty().text(porsentaje);

										    CONT_SIG++;

									    }else{
									    	$("#finishProceso").removeClass('none');
									    	$(".sw-btn-next").addClass('none');
									    	CONT_SIG++;
									    }
										  console.log(CONT_SIG);
									    
									});

									let porProgressBarPrev = 0;
									$('.sw-btn-prev').on('click', function () {
									    if ( CONT_SIG > 0 ) {
									    	    getTextDesc();
									    	    let porsentaje = (porProgressBar - 1.85);
									    	    porProgressBar = porsentaje;
									    	    porsentaje += "%";
									    	    CONT_SIG --;

									    	    if(CONT_SIG==17){
									    	    	$("#TitleAnalisisSubjetivo").removeClass('text-s');
									    	    	$("#TitleAnalisisSubjetivo").addClass('text-p');

									    	    	$("#TitleAnalisisObjetivo").removeClass('text-p');
									    	    	$("#TitleAnalisisObjetivo").addClass('text-s');
									    	    }

									    	    $(".progress-bar").css("width", porsentaje);
										    	$(".progress-bar-text").empty().text(porsentaje);

										    	if ($("#finishProceso").is(":visible")) {
										    		$("#finishProceso").addClass('none');
										    		$(".sw-btn-next").removeClass('none');
										    	}
									    }
										console.log(CONT_SIG);
									});


								});
						})	
				</script>

			</main>  
@endsection