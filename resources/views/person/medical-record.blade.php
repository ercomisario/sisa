
<h1 class="h3 mb-3 text-s"><strong>Historial del Registro Médico</strong></h1>
    <div class="container">
    	<div class="row">
    		<div class="col-sm-3 col-xl-3 col-lg-3">
				<strong class="text-p ml-3">Fecha - Hora </strong>
			</div>
			<div class="col-sm-2 col-xl-2 col-lg-2">
				<strong class="text-p ml-3">Patologia</strong>
			</div>
			<div class="col-sm-3 col-xl-3 col-lg-3">
			<strong class="text-p ml-3">Centro medico</strong>
			</div>
			<div class="col-sm-2 col-xl-2 col-lg-2">
				<strong class="text-p ml-3">Doctor</strong>
			</div>
    	</div>
        <div class="row">
                @isset($clinicalCases)
                        @foreach($clinicalCases as $clinicalCase)
                                @component('components.record-card',['clinicalCase'=>$clinicalCase, 'patient_id'=> isset($patient) ? $patient->id : $person->id])
                                @endcomponent
                        @endforeach
                @endisset
        </div>
</div>