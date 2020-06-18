@extends('layouts.clinical-case')
@section('title','Resumen del Caso')
@section('view-summary')
<div class="tab tabs-registry-clinical-secondary" id="">
  <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item nav-item-tabs-s" style=""><a class="nav-link active" href="#tab-informe-medico" data-toggle="tab" role="tab" aria-selected="true"><strong>INFORME MÉDICO</strong></a></li>
	  <li class="nav-item nav-item-tabs-s" style=""><a class="nav-link " href="#tab-resumen-caso" data-toggle="tab" role="tab" aria-selected="false"><strong>RESUMEN DEL CASO</strong></a></li>
	  <li class="nav-item nav-item-tabs-s" style=""><a class="nav-link " href="#tab-egreso" data-toggle="tab" role="tab" aria-selected="false"><strong>EGRESO</strong></a></li>
  </ul>
  <div class="tab-content" style="min-height: 400px; border-radius:0px; box-shadow: 0 .1rem .2rem rgba(0,0,0,.00);">
      <div class="tab-pane active" id="tab-informe-medico" role="tabpanel">
      	<h5 class="mt-3 text-p"><strong>DIAGNÓSTICO INICIAL</strong></h5>
      	<div class="card-body">
			  @isset($clinicalCases)
      		 	<div class="media d-block d-md-flex">
				   <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Fecha: <strong>{{date('d-m-y', strtotime($clinicalCaseActive->created_at))}}</strong><br>Hora: <strong>{{date('h-i-s', strtotime($clinicalCaseActive->created_at))}}</strong> <br> Dr. {{$clinicalCaseActive->doctor}}</p></div>
						<div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
							{{$clinicalCaseActive->diagnostic}}
					</div>
				</div>
				@endisset
      	</div>
      	<h5 class="mt-3 text-p"><strong>REFERIDO A</strong></h5>
      	<div class="card-body background-color-mobile">
      		 <div class="media d-block d-md-flex">
      		    <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Cirugia</p></div>
      		    <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
      		      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
      		      ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      		    </div>
      		  </div>
      	</div>
      	<div class="card-body">
      		 <div class="media d-block d-md-flex">
      		    <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Hospitalización</p></div>
      		    <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
      		      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
      		      ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      		    </div>
      		  </div>
      	</div>	
		<div class="card-body">
      		 <div class="media d-block d-md-flex">
      		    <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Consulta</p></div>
      		    <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
      		      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
      		      ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      		    </div>
      		  </div>
      	</div>
      	<h5 class="mt-3 text-p"><strong>ESTUDIO REALIZADOS</strong></h5>
      	<div class="card-body">
  	      <div class="media d-block d-md-flex">
  	         <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Informe</p></div>
  	         <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
  	           Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
  	           ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
  	           <div class="row mt-4">
					 @isset($estudio)
						
							@component('medical-test-summary',['estudio' => $estudio])
							@endcomponent
						
					@endisset
  	           </div>
  	         </div>
  	      </div>
  	    </div>
      </div>
      <div class="tab-pane" id="tab-resumen-caso" role="tabpanel">
        <h5 class="mt-3 text-p"><strong>RESUMEN</strong></h5>
      	<div class="card-body">
			  @isset($medicalDischarge)
      		 <div class="media d-block d-md-flex">
			   <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">{{$medicalDischarge->created_at}}<br> Dr. {{$doctor->name}}</p></div>
				  <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
					@isset($medicalDischarge)
						{{$medicalDischarge->summary}}
					@endisset
      		    </div>
				</div>
				@endisset
				
		  </div>
		  @isset($medicalDischarge->medical_test)
			<h5 class="mt-3 text-p"><strong>ESTUDIO REALIZADOS</strong></h5>
			<div class="card-body">
			<div class="media d-block d-md-flex">
				<div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Informe</p></div>
				<div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
				ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
				<div class="row mt-4">
						<div class="col-6">
							<img src="img/photos/unsplash-1.jpg" class="img-fluid">
						</div>
						<div class="col-6">
							<img src="img/photos/unsplash-1.jpg" class="img-fluid">
						</div>
				</div>
				</div>
			</div>
			</div>
		  @endisset
        <h5 class="mt-3 text-p"><strong>UBICACIÓN Y PERSONAL</strong></h5>        
        <div class="row mt-3 mb-5">
      		<div class="col ml-5">
      			<div class="media d-block d-md-flex">
      		    <div class="card" style="border-radius: 50%; margin-top: 3%; background-color: #12375c">
      		    	<p style="margin: 10px; padding: 10px; "></p>
      		    </div>
				  <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
					@isset($clinicalCaseActive)
						<p class="text-p"><strong>{{$clinicalCaseActive->medicalCenter}}</strong></p>
						<p class="text-s"><strong></strong></p>
				 	 @endisset
      		    </div>
      		  </div>	
      		</div>
        </div>
      	<div class="row mt-3">
      	    <div class="col-sm-4 col-xl-4 col-lg-4 text-center">
      	        <h4 class="tab-title text-p">Apellido, Nombre</h4>
      	    </div>
      	    <div class="col-sm-4 col-xl-4 col-lg-4 text-center">
      	        <h4 class="tab-title text-p">Especialidad</h4>
      	    </div>
      	    <div class="col-sm-4 col-xl-4 col-lg-4 text-center">
      	        <h4 class="tab-title text-p">N° M.S.D.S</h4>
      	    </div>
		  </div>
			  @isset($clinicalCaseActive)
					@component('components.summary-doctor-card',['doctor'=>$clinicalCaseActive->doctor , 'doctorLastName'=>$clinicalCaseActive->doctor_last_name,'doctorSpeciality'=>$clinicalCaseActive->specialty,'doctorLicense'=>$clinicalCaseActive->license])
					@endcomponent
			@endisset
			@isset($nurse)
				
					@component('components.summary-nurse-card',['nurse'=>$nurse])
					@endcomponent
				
			@endisset
      </div>
      <div class="tab-pane" id="tab-egreso" role="tabpanel">
      	<div class="row">
			  @isset($medicalDischarge)
				@isset($medicalDischarge->type)
						<h5 class="mt-3 text-p"><strong>TIPO DE EGRESO Y DIAGNÓSTICO FINAL</strong></h5>
					<div class="col-sm-12 col-xl-12 col-lg-12">
						<div class="card-body" style="padding: 0.25rem">
								<div class="media d-block d-md-flex">
								<div class="card shadow text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">{{$medicalDischarge->type}}</p></div>
								<div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
									{{$medicalDischarge->observation}}
								</div>
								</div>
						</div>
					</div>
				@endisset
			@endisset
            <h5 class="mt-3 text-p"><strong>RECIPE MEDICO Y ORDENES</strong></h5>
            <div class="col-sm-12 col-xl-12 col-lg-12">
            	<div class="card-body" style="padding: 0.25rem">
            		 <div class="media d-block d-md-flex">
            		    <div class="card shadow text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Terapia</p></div>
            		    <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
            		      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
            		      ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            		    </div>
            		  </div>
            	</div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
        	<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
        		<h4 class="tab-title text-p">Medicamento</h4>
        	</div>
        	<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
        		<h4 class="tab-title text-p">Dosis</h4>
        	</div>
        	<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
        		<h4 class="tab-title text-p">Frecuencia</h4>
        	</div>
        	<div class="col-sm-3 col-xl-3 col-lg-3 text-center">
        		<h4 class="tab-title text-p">Fecha de Inicio  -Fin</h4>
        	</div>
        	<div class="col-sm-3 col-xl-3 col-lg-3 text-right">
        		<h4 class="tab-title text-p">Asignado Por</h4>
        	</div>
        </div>
        <div class="row mt-3 mb-3  shadow">                                                   		
            <div class="col-sm-2 col-xl-2 col-lg-2 text-center">
            	<span class="tab-title text-p">Aspirina</span>
            </div>
            <div class="col-sm-2 col-xl-2 col-lg-2 text-center">
            	<span class="tab-title text-p">81mg</span>
            </div>
            <div class="col-sm-2 col-xl-2 col-lg-2 text-center">
            	<span class="tab-title text-p">1/d</span>
            </div>
            <div class="col-sm-3 col-xl-3 col-lg-3 text-center">
            	<span class="tab-title text-p">DD/MM/AAAA - DD/MM/AAAA</span>
            </div>
            <div class="col-sm-3 col-xl-3 col-lg-3 text-right">
            	<span class="tab-title text-p">Dr. Apellido,Nombre</span>
            </div>
        </div>
        <div class="row mt-3 mb-3  shadow">                                                   		
            <div class="col-sm-2 col-xl-2 col-lg-2 text-center">
            	<span class="tab-title text-p">Aspirina</span>
            </div>
            <div class="col-sm-2 col-xl-2 col-lg-2 text-center">
            	<span class="tab-title text-p">81mg</span>
            </div>
            <div class="col-sm-2 col-xl-2 col-lg-2 text-center">
            	<span class="tab-title text-p">1/d</span>
            </div>
            <div class="col-sm-3 col-xl-3 col-lg-3 text-center">
            	<span class="tab-title text-p">DD/MM/AAAA - DD/MM/AAAA</span>
            </div>
            <div class="col-sm-3 col-xl-3 col-lg-3 text-right">
            	<span class="tab-title text-p">Dr. Apellido,Nombre</span>
            </div>
        </div>
        <div class="row">
				  <h5 class="mt-3 text-p"><strong>JUSTIFICATIVO MÉDICO</strong></h5>				  
						<div class="col-sm-12 col-xl-12 col-lg-12">
							<div class="card-body" style="padding: 0.25rem">
                  
								<div class="media d-block d-md-flex">
									<div class="card shadow text-center" style="border-radius: 1rem">
										<p style="margin: 10px; padding: 10px; " class="text-p"> 
										  <strong>DESDE: {{$clinicalCaseActive->medical_justification->start_date}} <br> HASTA: {{$clinicalCaseActive->medical_justification->end_date}} <br></strong> Dr. {{$clinicalCaseActive->doctor}}
                    </p>
                    @if($clinicalCaseActive->medical_justification->qr_path != '')
                        <img src="{{ asset('/')}}{{$clinicalCaseActive->medical_justification->qr_path}}" width="200" height="150">
                    @endif
									</div>
									<div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
										<strong class="text-p"> Nro Justificativo: </strong>{{$clinicalCaseActive->medical_justification->id}}  <span class="btn-agg-order mt-1 ml-3" onclick="window.location='/medical-justification-print/{{$clinicalCaseActive->medical_justification->id}}'">  <i class="align-middle fas fa-print"></i> </span><br><br>
                    {{$clinicalCaseActive->medical_justification->description}}
									</div>
								</div>
							</div>
						</div>
					
			@isset($proximaVisita)
				<h5 class="mt-3 text-p"><strong>PROXIMA VISITA</strong></h5>
				<div class="col-sm-12 col-xl-12 col-lg-12">
					<div class="card-body" style="padding: 0.25rem">
						<div class="media d-block d-md-flex">
							<div class="card shadow text-center" style="border-radius: 1rem">
								<p style="margin: 10px; padding: 10px; " class="text-p"> 
									<strong>DD/MM/AAAA</strong><br> Dr. Apellido, Nombre</p>
							</div>
							<div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
							Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
							ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
							</div>
						</div>
					</div>
				</div>
			@endisset
        </div>
      </div>
  </div>
</div>
@endsection