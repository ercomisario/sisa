<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#12375C"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link href="{{ asset('fonts/Montserrat-Medium.ttf') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/classic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
            <main class="container-fluid padding-lateral-0">
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
                                <span class="text-identifier-view"><strong>Perfil del Paciente</strong></span>
                            </div>
                            <div class="col-12  bg-white">
                                <div class="col-sm-12 col-xl-12 col-lg-12">
                                    <div class="row no-gutters align-self-center  mt-3">
                                        <div class="col-sm-7 col-xl-7 col-lg-7">
                                            <div class="card-body">
                                                <div class="row no-gutters">
                                                    <div class="d-none d-sm-block col-sm-3 col-xl-3 col-lg-3 text-center mb-3">
                                                        <img src="{{isset($patient) ? asset("img/avatars/".$patient->cedula.".jpg") : asset("img/avatars/".$person->cedula.".jpg")}}" width="80" height="80" class="rounded-circle" alt="{{isset($patient) ? $patient->name : $person->name}}">
                                                    </div>
                                                    <div class="col-sm-9 col-xl-9 col-lg-9">
                                                        @isset($person)
                                                            <div class="row">
                                                                <div class="col ml-4 d-none d-sm-block">
                                                                <p class="text-p" style="font-size: 1rem"><strong>{{isset($patient) ? $patient->name : $person->name}}</strong></p>
                                                                    <p class="text-s">{{isset($patient) ? $patient->birthday : $person->birthday}} años de edad</p>
                                                                </div>
                                                                <div class="col ml-4 d-none d-sm-block">
                                                                <p class="text-s">C.I: {{isset($patient) ? $patient->cedula : $person->cedula}}</p>
                                                                <p class="text-s">Tipo de Sangre: {{isset($patient) ? $patient->blood_type : $person->blood_type}}</p>


                                                                </div>
                                                                <div class="col ml-5 d-none d-sm-block">
                                                                    <form action="{{route('patient')}}" method="post">
                                                                        @csrf
                                                                        <input hidden name="patient_id" value="{{$patient->id}}">
                                                                        <button class="btn  btn-warning" style=""> Regresar</button>    
                                                                    </form>   
                                                                </div>
                                                            </div>
                                                        @endisset
                                                        </div>
                                                        <!-- mobile view-->
                                                            
                                                                <div class="col-6 d-block d-sm-none">
                                                                    <img src="img/avatars/avatar-3.jpg" width="80" height="80" class="rounded-circle" alt="Angelica Ramos">
                                                                </div>
                                                                <div class="col-6 d-block d-sm-none background-color-mobile mobile-name-age-block">
                                                                    <p class="text-p" style="font-size: 1rem"><strong>Apellido, Nombre</strong></p>
                                                                    <p class="text-s age-text text-right">20 años de edad</p>
                                                                    <p class="text-s text-right">Tipo de Sangre: <strong>O+</strong></p>
                                                                    <!-- <p class="text-s text-right">C.I: 20202020</p> -->
                                                                </div>
                                                            
                                                        <!--end mobile view-->  
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- @isset($user)
                                            @if($user->role_id !=2)
                                                
                                            @else
                                                <div class="col-sm-4 col-xl-4 col-lg-4 align-self-center  text-center ">
                                                    <form action="/doctor/medical-discharge" method="POST">
                                                         @csrf
                                                        <input name="patient_id" hidden value="{{$patient->id}}">
                                                        <button class="btn  btn-warning" style="width: 250px; margin-top: -20px">Egreso Médico</button>
                                                    </form> 
                                                    
                                                </div>
                                            @endif
                                        @endisset -->
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xl-12 col-lg-12 d-none d-sm-block">
                                    <div class="row justify-content-center mb-2">
                                        <div class="tab text-center tabs-principal">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <!-- <li class="nav-item nav-item-tabs-p" style=""><a class="nav-link " href="{{ url('/medical-history')}}"  role="tab" aria-selected="true"><strong>ANTECEDENTES MÉDICOS</strong></a></li> -->
												<!-- <li class="nav-item nav-item-tabs-p" style=""><a class="nav-link active" href="{{ url('/medical-history#tab-registro-medico') }}"  role="tab" aria-selected="false"><strong>REGISTRO MÉDICO</strong></a></li> -->
												<!-- <li class="nav-item nav-item-tabs-p" style=""><a class="nav-link " href="{{ url('/medical-history#tab-ordenes-medicos')}}"  role="tab" aria-selected="false"><strong>ORDENES MÉDICAS</strong></a></li> -->
                                            </ul>		
                                        </div>
                                    </div>
                                </div>
                                <!--mobile menu -->
                                <div class="d-block d-sm-none">
                                    <div class="row mb-2 justify-content-center">
                                        <div class="tab  tabs-principal">
                                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                                <li class="nav-item nav-item-tabs-p col-3 container-width" style=""><a class="nav-link text-center" href="{{ url('/medical-history')}}"  role="tab" aria-selected="true"><strong>ANTECEDENTES</strong></a></li>
												<li class="nav-item nav-item-tabs-p col-3 container-width" style=""><a class="nav-link active text-center" href="{{ url('/medical-history#tab-registro-medico') }}"  role="tab" aria-selected="false"><strong>REGISTROS</strong></a></li>
												<!-- <li class="nav-item nav-item-tabs-p col-3 container-width" style=""><a class="nav-link text-center" href="{{ url('/medical-history#tab-ordenes-medicos')}}"  role="tab" aria-selected="false"><strong>ORDENES</strong></a></li> -->
                                            </ul>		
                                        </div>
                                    </div>
                                </div>
                                <!--end mobile menu -->
                            </div>	
                        </div>
                    </div>
                    <h1 class="h3 mb-5 mt-5 ml-5 text-s d-none d-sm-block"><strong>Registro de Historias Clínicas</strong></h1>

                    <!-- mobile title -->
                    <h1 class="h3 mb-5 mt-5 ml-2 text-s col-12 d-block d-sm-none"><strong>Registro de Historias Clínicas</strong></h1>
                    <!-- end mobile title -->

			<div class="container">
				<div class="row">
					<!-- <div class="col-sm-2 col-xl-2 col-lg-2">
							<form class="d-none d-sm-inline-block shadow" style="width: 100%">
								@csrf
								<input class="form-control form-control-no-border input-date-search" type="date" placeholder="Search projects..." aria-label="Search" style="">
							</form>                                      
							<div class="list-date-search shadow">
								@isset($clinicalCases)
									@foreach($clinicalCases as $clinicalCase)
										@component('components.summary-clinical-case-card',['clinicalCase' => $clinicalCase])
										@endcomponent
									@endforeach
								@endisset
						</div>
					</div> -->
					<div class="col-sm-12 col-xl-12 col-lg-12">
					<div class="tab tabs-registry-clinical" id="">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item"><a class="nav-link" href="#tab-signos-vitales" data-toggle="tab" role="tab" aria-selected="false">Signos Vitales</a></li>
							<li class="nav-item"><a class="nav-link active" href="#tab-resumen" data-toggle="tab" role="tab" aria-selected="true">Resumen</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab-anamnesis" data-toggle="tab" role="tab" aria-selected="false">Anamnesis</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab-ordenes" data-toggle="tab" role="tab" aria-selected="false">Ordenes</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab-evoluciones" data-toggle="tab" role="tab" aria-selected="false">Evoluciones</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab-reporte-enfermeria" data-toggle="tab" role="tab" aria-selected="false">Reporte Enfermeria</a></li>
						</ul>
						<div class="tab-content" style="min-height: 400px">
						<div class="tab-pane active" id="tab-resumen" role="tabpanel">
								@yield('view-summary')
						</div>
						<div class="tab-pane" id="tab-anamnesis" role="tabpanel">
								@include('person.anamnesis')
						</div>
						<div class="tab-pane" id="tab-ordenes" role="tabpanel">
								@include('person.summary-order')
						</div>
						<div class="tab-pane" id="tab-evoluciones" role="tabpanel">
								@include('person.evolution')
						</div>
						<div class="tab-pane" id="tab-signos-vitales" role="tabpanel">
								@include('person.vital-sign')
						</div>
						<div class="tab-pane" id="tab-reporte-enfermeria" role="tabpanel">
								@include('person.nurse-report')
						</div>
						</div>
					</div>
					</div>
				</div>
			</div>
            </main>
            <script src="{{ asset('js/jquery-3.2.1.min.js') }}" ></script>
            <script src="{{ asset('js/compressed.js') }}" ></script>
            <script src="{{ asset('js/settings.js') }}" ></script>
            <script src="{{ asset('js/expander/jquery.expander.js') }}" ></script>
            <script src="{{ asset('js/jquery.nicescroll.min.js') }}" ></script>
            <script src="{{ asset('js/main.js') }}" ></script>
            <script src="{{ asset('js/anamnesis.js') }}" ></script>        
</body>
</html>