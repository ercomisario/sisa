<div class="tab tabs-registry-clinical-secondary" id="">
  <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item nav-item-tabs-s" style=""><a class="nav-link active" href="#tab-medicamento" data-toggle="tab" role="tab" aria-selected="true"><strong>MEDICAMENTOS</strong></a></li>
				<li class="nav-item nav-item-tabs-s" style=""><a class="nav-link " href="#tab-interconsulta" data-toggle="tab" role="tab" aria-selected="false"><strong>INTERCONSULTAS</strong></a></li>
				<li class="nav-item nav-item-tabs-s" style=""><a class="nav-link " href="#tab-cuidados" data-toggle="tab" role="tab" aria-selected="false"><strong>CUIDADOS</strong></a></li>
				<li class="nav-item nav-item-tabs-s" style=""><a class="nav-link " href="#tab-examenes" data-toggle="tab" role="tab" aria-selected="false"><strong>EXAMENES</strong></a></li>
  </ul>
  <div class="tab-content" style="min-height: 400px; border-radius:0px; box-shadow: 0 .1rem .2rem rgba(0,0,0,.00);">
      <div class="tab-pane active" id="tab-medicamento" role="tabpanel">
      	<div class="row mt-3 mb-3">
      		<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
      			<h4 class="tab-title text-s">Medicamento</h4>
      		</div>
      		<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
      			<h4 class="tab-title text-s">Dosis</h4>
      		</div>
      		<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
      			<h4 class="tab-title text-s">Frecuencia</h4>
      		</div>
      		<div class="col-sm-3 col-xl-3 col-lg-3 text-center">
      			<h4 class="tab-title text-s">Fecha de Inicio  -Fin</h4>
      		</div>
      		<div class="col-sm-3 col-xl-3 col-lg-3 text-right">
      			<h4 class="tab-title text-s">Asignado Por</h4>
      		</div>
      	</div>
      	<div class="accordion" id="accordionExample">
					
			@isset($clinicalCaseActive->medications)
				@foreach($clinicalCaseActive->medications as $medication)
						@component('components.summary-order-medication', ['medication'=>$medication])
						@endcomponent
				@endforeach
			@endisset
		</div>

      </div>
      <div class="tab-pane" id="tab-interconsulta" role="tabpanel">
		  

      	<div class="accordion" id="accordionExample">
			@isset($clinicalCaseActive->referrals)
			  @if(count($clinicalCaseActive->referrals) == 0)
				  <p>Este Caso Clínico no posee Interconsultas</p>
				@else
				    <div class="row mt-3 mb-3">
						<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
							<h4 class="tab-title text-s">Motivo</h4>
						</div>
						<div class="col-sm-3 col-xl-3 col-lg-3 text-center">
							<h4 class="tab-title text-s">SolicitadoPor</h4>
						</div>
						<div class="col-sm-3 col-xl-3 col-lg-3 text-center">
							<h4 class="tab-title text-s">Solicitado A</h4>
						</div>
						<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
							<h4 class="tab-title text-s">Fecha Emitido</h4>
						</div>
						<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
							<h4 class="tab-title text-s">Fecha Realizada</h4>
						</div>
      				</div>
					@foreach($clinicalCaseActive->referrals as $referal)
						@component('components.summary-order-referal',['referal'=>$referal])	
						@endcomponent
					@endforeach
				@endif
		  @endisset
      	</div>
      </div>
      <div class="tab-pane" id="tab-cuidados" role="tabpanel">
			@isset($clinicalCaseActive->healthCares)
				@if(count($clinicalCaseActive->healthCares) == 0)
					<p>Este Caso Clinico no posee Cuidados</p>
				@else
					<div class="row mb-3 mt-3">
						<div class="ml-3 col-sm-3 col-xl-2 col-lg-1 text-center">
							<h5 class="text-s">Fecha Y Hora</h5>
						</div>
						<div class="col-sm-3 col-xl-2 col-lg-2 text-center">
							<h5 class="text-s">Descripción del Cuidado</h5>
						</div>
					</div>
					@foreach($clinicalCaseActive->healthCares as $healthcare)
						@component('components.summary-order-healthcare',['healthcare'=>$healthcare])
						@endcomponent
					@endforeach
				@endif
			@endisset
      </div>
      <div class="tab-pane" id="tab-examenes" role="tabpanel">
		  @isset($clinicalCaseActive->medicalTests)
			  @if(count($clinicalCaseActive->medicalTests)==0)
				  <p>Este Caso Clínico no posee exámenes</p>
				@else
					<div class="row mb-3 mt-3">
						<div class="col-sm-3 col-xl-3 col-lg-3 text-center">
							<h5 class="text-s">Tipo De Examen</h5>
						</div>
						<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
							<h5 class="text-s">Motivo</h5>
						</div>
						<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
							<h5 class="text-s">Fecha Solicitado</h5>
						</div>
						<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
							<h5 class="text-s">Fecha Realizado</h5>
						</div>
						<div class="col-sm-3 col-xl-3 col-lg-3 text-center">
							<h5 class="text-s">Solicitado Por</h5>
						</div>
					</div>
					<div class="accordion" id="accordionExample">
					@foreach($clinicalCaseActive->medicalTests as $medicalTest)
						@component('components.summary-order-medical-test',['medicalTest'=>$medicalTest])
						@endcomponent
					@endforeach
					</div>
				@endif
		  @endisset
      </div>
  </div>
</div>