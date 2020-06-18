@extends('layouts.app')
@section('title','Registro de Egreso')
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
							<span class="text-identifier-view"><strong>Egreso</strong></span>
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
								<div class="col-12">
									<input type="hidden" id="clinical_case_id" name="" value="{{$clinical_case->id}}">
									<input type="hidden" id="DoctorID" value="{{$doctor->id}}">
									<div class="card">
											<div class="card-body">
														<form id="Smartwizard" class="" action="javascript:void(0)" style="display: none;">
														    <ul>
														        <li><a href="#step-1" style="display: none;"><small>1</small></a></li>
														        <li><a href="#step-2" style="display: none;"><small>2</small></a></li>
														        <li><a href="#step-3" style="display: none;"><small>3</small></a></li>
														    </ul>

														    <div>
														        <div id="step-1" class="">
														            <div class="form-row ">   

														            	 <h4 class="ml-3 mt-3 text-p " style=""><strong>TIPO DE EGRESO</strong></h4>
														            	 <div class="form-row mt-3 mb-3 col-md-12 col-lg-12" style="justify-content:;">
														            	    <div class="form-inline ml-5 "> 
														            	      <label class="custom-control  custom-radio mr-4">
														            	        <input name="tipoEgreso" type="radio" class="custom-control-input" value="Curación">
														            	        <span class="custom-control-label">Curación</span>
														            	      </label>
														            	      <label class="custom-control  custom-radio mr-4">
														            	        <input name="tipoEgreso" type="radio" class="custom-control-input" value="Mejoría">
														            	        <span class="custom-control-label">Mejoría</span>
														            	      </label>
														            	      <label class="custom-control  custom-radio mr-4">
														            	        <input checked name="tipoEgreso" type="radio" class="custom-control-input" value="Muerte">
														            	        <span class="custom-control-label">Muerte</span>
														            	      </label>
														            	      <label class="custom-control  custom-radio mr-4">
														            	        <input checked name="tipoEgreso" type="radio" class="custom-control-input" value="Otros">
														            	        <span class="custom-control-label">Otros</span>
														            	      </label>
														            	     </div>
														            	  </div>     


														              <h4 class="ml-3 mt-3 text-p " style=""><strong>DIAGNÓSTICO FINAL</strong></h4>
														              <div class="form-group col-md-11 mt-3 ml-4">
														                <textarea id="diagnosticoEgreso" class="form-control required" placeholder="Descripción de la diagnóstico ..." rows="3" ></textarea>
														              </div>

														              <h4 class="ml-3 mt-3 text-p " style=""><strong>RESUMEN DEL CASO</strong></h4>
														              <div class="form-group col-md-11 mt-3 ml-4">
														                <textarea id="resumenEgreso" class="form-control required" placeholder="Descripción del resumen ..." rows="3" ></textarea>
														              </div>

														            
														            </div>
														        </div>
														         <div id="step-2" class="">
														            <h4 class="ml-3 mt-3 text-p" style=""><strong>ORDENES MÉDICAS</strong></h4>
														            <div class="form-row list-diary-ordenes">
														               <div class="form-group col-4 mt-4">
														                 <h5 class="ml-3 text-s" style="padding-right: 12px"><strong>Medicamentos</strong> <span class="btn-agg-order btn-floating" data-toggle="modal" data-target="#centeredModalMedicamentosConsulta" id="ClickModalMedicamentosConsulta"> <i class="align-middle fas fa-plus "></i> </span></h5>
														                 <br>
														                 <div id="DomOrderMedicationCardConsulta">
														                 </div>
														               </div>
														               <div class="form-group col-4 mt-4">
														                <h5 class="ml-3 text-s" style="padding-right: 12px"><strong>Cuidados</strong> <span class="btn-agg-order btn-floating" data-toggle="modal" data-target="#centeredModalCuidadosConsulta" id="ClickModalCuidadoConsulta"> <i class="align-middle fas fa-plus "></i> </span></h5>
														                <br>
														                 <div id="DomOrderCuidadoConsultaCard">
														                 </div>

														              </div>   

														              <div class="form-group col-4 mt-4">
														                <h5 class="ml-3 text-s" style="padding-right: 12px"><strong>Examenes</strong> <span class="btn-agg-order btn-floating" data-toggle="modal" data-target="#centeredModalExamenesConsulta" id="ClickModalExamenConsulta"> <i class="align-middle fas fa-plus "></i> </span></h5>

														                 <br>
														                 <div id="DomOrderExamenConsultaCard">
														                 </div>

														              </div>    

														            </div>
														        </div>
														        <div id="step-3" class="">
														        	<h4 class="ml-3 mt-3 text-p  text-left" style=""><strong>RAZÓN</strong></h4>
														         	<div class="form-group col-md-11 mt-3 ml-4">
														         	  <textarea id="razonEgreso" class="form-control" placeholder="Descripción de la razón ..." rows="3"></textarea>
														         	</div>  

														         	<h4 class="ml-3 mt-3 text-p  text-left" style=""><strong>JUSTIFICATIVO MÉDICO</strong></h4>
														         	<div class="form-group col-md-11 mt-3 ml-4">
														         	  <h5 class="text-s " style=""><strong>Tiempo del Justificativo Médico</strong></h5>
														         	  <input class="form-control" type="text" id="daterangeJustificativo" name="daterangeJustificativo" value="" style="max-width: 30%" />

														         	  <h5 class=" mt-3 text-s " style=""><strong>Descripción del Justificativo Médico</strong></h5>
														         	  <textarea id="descriptionJustificativo" class="form-control" placeholder="Descripción del justificativo ..." rows="3"></textarea>
														         	</div>        

														        </div>

														    </div>
														</form>

											</div>
									</div>

								</div>
						</div>						
				</div>

				<script src="{{ asset('js/diary.js') }}" ></script>
				<script src="{{ asset('js/discharge-order.js') }}" ></script>
				<script type="text/javascript">
					let asset_global='{{asset("/")}}';        
						$(document).ready(function () {
									
									// Validation
									var $validationForm = $("#Smartwizard");
									$validationForm.validate({
									  errorPlacement: function errorPlacement(error, element) {
									    $(element).parents(".form-group").append(
									      error.addClass("invalid-feedback small d-block")
									    )
									  },
									  highlight: function(element) {
									    $(element).addClass("is-invalid");
									  },
									  unhighlight: function(element) {
									    $(element).removeClass("is-invalid");
									  }
									});
									$validationForm
									  .smartWizard({
									    autoAdjustHeight: false,
									    backButtonSupport: false,
									    useURLhash: false,
									    showStepURLhash: false,
									    keyNavigation: false,
									    toolbarSettings: {
									    toolbarExtraButtons: [$("<button id=\"finishProceso\" class=\"btn btn-submit btn-warning none\" onclick=\"terminarEgreso()\" type=\"button\">Finalizar</button>")]
									    }
									  })
									  .on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
									    if (stepDirection === "forward") {
									      return $validationForm.valid();
									    }
									    return true;
									  });
									  $validationForm.find("#finishProceso").on("click", function() {
									  if (!$validationForm.valid()) {
									    return;
									  }
									  
									  return false;
									});


									$('.sw-btn-next').on('click', function () {
									  
									  console.log('.sw-btn-next');
									  if($("#step-3").is(":visible")){
									    $(".sw-btn-next").addClass('none');
									    $("#finishProceso").removeClass('none');
									  }else{      
									    if($(".sw-btn-next").hasClass('none')){
									      $(".sw-btn-next").removeClass('none');
									      $("#finishProceso").addClass('none');
									    }
									  }
									});

									$('.sw-btn-prev').on('click', function () {
									  
									  console.log('.sw-btn-prev');
									  if($("#step-3").is(":visible")){
									    $(".sw-btn-next").addClass('none');
									    $("#finishProceso").removeClass('none');
									  }else{      
									    if($(".sw-btn-next").hasClass('none')){
									      $(".sw-btn-next").removeClass('none');
									      $("#finishProceso").addClass('none');
									    }
									  }
									  
									});

									// Daterangepicker
									$("#daterangeJustificativo").daterangepicker({
									    opens: "center",
									    locale: {
									      format: 'DD/MM/YYYY'
									    }
									});

									// Daterangepicker
									$("#MedicamentoConsultaFechaRango").daterangepicker({
									    opens: "center",
									    locale: {
									      format: 'DD/MM/YYYY'
									    }
									});

									//Cargo input
									$('input[type=file]').change(function(e) {
									    $in = $(this);
									    $in.next().html($in.val());
									});
									  
									$("#Smartwizard").show() 
						})	

					
				</script>


				

			</main> 

			@include('person.medical-order-modal')

@endsection