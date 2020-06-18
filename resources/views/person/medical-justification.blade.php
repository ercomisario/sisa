@extends('layouts.app')
@section('title','Justificativo Medico')
@section('content')
	
	<nav class="navbar navbar-expand navbar-light" style=" background-color: #12375c">
		
		
		<div class="navbar-collapse collapse mt-5">
			<ul class="navbar-nav ml-auto">
			
			</ul>
		</div>
	</nav>

		        <div class="bg-white shadow">
					<div class="row no-gutters">
						<div class="col-lg-1  d-none d-sm-inline-block identifier-view-1"  style="">
						</div>
						<div class="col-lg-3  d-none d-sm-inline-block text-center identifier-view-2" style="">
							<span class="text-identifier-view"><strong>Justificativo Medico</strong></span>
						</div>
						<div class="col-12  bg-white">
							<div class="row m-5">
										<div class="col-sm-2 col-xl-2 col-lg-2 text-center mb-3">
                      						<img src="{{asset('img/avatars/'.$justificativo->person->cedula.'.jpg')}}" width="64" height="64" class="rounded-circle" alt="">
										</div>
										<div class="col-sm-10 col-xl-10 col-lg-10">
											<div class="row">
												<div class="col-12">
                           							<p class="text-p" style="font-size: 1rem"><strong>{{$justificativo->person->last_name}},{{$justificativo->person->name}}</strong></p>
												</div>
												<div class="col-12">
                           							 <p class="text-s"><strong>C.I:  {{$justificativo->person->cedula}}</strong></p>
													 
												</div>
											</div>
										</div>
									</div>
						</div>	
					</div>
				</div>
				<div class="container">
					<div class="row mt-5 mb-5" style="margin-right: 10px; margin-left: 10px;">


						<div class="card shadow" style="width: 100%">
							<div class="card-body">
								<div class="row">
									<div class="col-12">

										 <h4 class="mb-3 text-p" style="padding-right: 12px"><strong>Dr. </strong> {{$justificativo->doctor->last_name}},{{$justificativo->doctor->name}} <span class="btn-agg-order btn-floating float-right" onclick="window.location='/medical-justification-print/{{$justificativo->id}}'">  <i class="align-middle fas fa-print"></i> </span></h4>

										<p class="text-p"><strong>Feha</strong> {{$justificativo->start_date}} - {{$justificativo->end_date}}</p>
									</div>
									<div class="col-12">
											<p class="text-p text-justify"> {{$justificativo->description}}</p>
									</div>
									
								</div>
							</div>
						</div>

					</div> <!--end div row -->
				</div>
@endsection