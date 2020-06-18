@extends('layouts.app')
@section('title','Mi agenda')
@section('content')
	@component('components.navbar',['user'=>$user, 'person'=>$person, 'doctor'=>$doctor])
	@endcomponent
	@component('components.sidebar',['user' => $user])
	@endcomponent
    <main class="container-fluid padding-lateral-0 bg-white">
		<div class="bg-white shadow">
			<div class="row no-gutters">
				<div class="col-lg-1  d-none d-sm-inline-block identifier-view-1"  style="">
				</div>
				<div class="col-lg-3  d-none d-sm-inline-block text-center identifier-view-2" style="">
					<span class="text-identifier-view"><strong>Mi Agenda</strong></span>
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
                           <p class="text-p" style="font-size: 1rem"><strong>Dr. {{$person->name}}</strong></p>
													<p class="text-s"><strong>Especialidad: {{$doctor->speciality->name}}</strong></p>
												</div>
												<div class="col-lg-3">
                           <p class="text-s">C.I: {{$person->cedula}}</p>
													 <p class="text-s">Licencia: <strong> MPPS {{$doctor->license}} </strong></p>
												</div>
												<div class="col-lg-3">
                           <p class="text-s">Número Telefónico: {{$person->phone}}</p>
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
		<div class="" style="background-color: #eaf0f7">
			<div class="container">
				<div class="row justify-content-center">
					<div class="tab text-center tabs-tabs-diary mt-4" style="margin-bottom: 0rem;">
						<ul class="nav nav-tabs" role="tablist">

							<li class="nav-item nav-item-tabs-a"  onclick="" style="">
								<div class="mb-1"><strong>Lunes</strong></div>
								<a  class="nav-link  active text-center" href="#tabs-tabs-diary-lunes" id="lunes" data-toggle="tab" role="tab" aria-selected="true"> 
									<div class="text-center div-span-items-num"><span class="nav-item-tabs-num" id="num-lunes"> 01 </span></div>
								</a>
							</li>
							<li class="nav-item nav-item-tabs-a" onclick="" style=""><div class="mb-1"><strong>Martes</strong></div>
								<a id="martes" class="nav-link " href="#tabs-tabs-diary-martes" data-toggle="tab" role="tab" aria-selected="false">
									<div class="text-center"><span class="nav-item-tabs-num" id="num-martes"> 02 </span></div>
								</a>
							</li>
							<li class="nav-item nav-item-tabs-a" onclick="" style=""><div class="mb-1"><strong>Miércoles</strong></div>
								<a id="miercoles" class="nav-link " href="#tabs-tabs-diary-miercoles" data-toggle="tab" role="tab" aria-selected="false">
									<div class="text-center"><span class="nav-item-tabs-num" id="num-miercoles"> 03 </span></div>
								</a>
							</li>
							<li class="nav-item nav-item-tabs-a" onclick="" style=""><div class="mb-1"><strong>Jueves</strong></div>
								<a id="jueves" class="nav-link " href="#tabs-tabs-diary-jueves" data-toggle="tab" role="tab" aria-selected="false">
									<div class="text-center"><span class="nav-item-tabs-num" id="num-jueves"> 04 </span></div>
								</a>
							</li>
							<li class="nav-item nav-item-tabs-a" onclick="" style=""><div class="mb-1"><strong>Viernes</strong></div>
								<a id="viernes" class="nav-link " href="#tabs-tabs-diary-viernes" data-toggle="tab" role="tab" aria-selected="false">
									<div class="text-center"><span class="nav-item-tabs-num" id="num-viernes"> 05 </span></div>
								</a>
							</li>
							<li class="nav-item nav-item-tabs-a" onclick="" style=""><div class="mb-1"><strong>Sábado</strong></div>
								<a id="sabado" class="nav-link " href="#tabs-tabs-diary-sabado" data-toggle="tab" role="tab" aria-selected="false">
									<div class="text-center"><span class="nav-item-tabs-num" id="num-sabado"> 06 </span></div>
								</a>
							</li>
							<li class="nav-item nav-item-tabs-a" onclick="" style=""><div class="mb-1"><strong>Domingo</strong></div>
								<a id="domingo" class="nav-link " href="#tabs-tabs-diary-domingo" data-toggle="tab" role="tab" aria-selected="false">
									<div class="text-center"><span class="nav-item-tabs-num" id="num-domingo"> 07 </span></div>
								</a>
							</li>
						</ul>		
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
      <style type="text/css">
        

        .sw-theme-default .sw-toolbar-bottom{
          background: #fff !important;
          border-top: none !important;
        }

        .sw-container  {
            min-height: 400px !important;
            box-shadow: 0 0 0rem 0 rgba(0,0,0,.0);
            border-radius: 10px !important;
        }

        div.upload {
            background-color:#fff;
            border: 1px solid #ddd;
            border-radius:5px;
            padding:3px 40px 3px 3px;
            position:relative;
            width: auto;
        }

        div.upload:hover {
            opacity:0.95;
        }

        div.upload input[type="file"] {
            display: input-block;
            width: 100%;
            height: 30px;
            opacity: 0;
            cursor:pointer;
            position:absolute;
            left:0;
        }
        .uploadButton {
            background-color: #ff9d00;
            border: none;
            border-radius: 3px;
            color: #FFF;
            cursor:pointer;
            display: inline-block;
            height: 30px;
            margin-right:15px;
            width: auto;
            padding:0 20px;
            box-sizing: content-box;
        }

      </style>

			<div class="tab mt-5">

        <input type="hidden" id="PacienteConsultaID" value="">
        <input type="hidden" id="DoctorID" value="{{$doctor->id}}">

				<div class="tab-content tabs-principal-content" style="">

					<div class="tab-pane active" id="tabs-tabs-diary-lunes" role="tabpanel">
              <div class="container-fluid">
                <div class="row" >
                  <div class="col-sm-4 col-xl-4 col-lg-4">                                                          
                      <div class="list-date-diary">
                          <h4 class="mb-3 text-s ml-5"><strong>Consultas</strong></h4>
                          <div class="container-fluid" id="diary-lunes-users"> 
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-8 col-xl-8 col-lg-8">
                    <div class="sw-container" id="sw-lunes">
                      
                    </div>
                  </div>    
                </div>    
              </div>
					</div>

					<div class="tab-pane" id="tabs-tabs-diary-martes" role="tabpanel">
              <div class="container-fluid">
                  <div class="row" >
                  <div class="col-sm-4 col-xl-4 col-lg-4">                                                          
                      <div class="list-date-diary">
                        <h4 class="mb-3 text-s ml-5"><strong>Consultas</strong></h4>
                        <div class="container-fluid" id="diary-martes-users">
                           
                        </div>
                      </div>
                  </div>
	                  <div class="col-sm-8 col-xl-8 col-lg-8">
                      <div class="sw-container" id="sw-martes">
                        
                      </div>

	                      
	                  </div>    
                  </div>    
              </div>
					</div>

					<div class="tab-pane" id="tabs-tabs-diary-miercoles" role="tabpanel">
              <div class="container-fluid">
                  <div class="row" >
                  <div class="col-sm-4 col-xl-4 col-lg-4">                                                          
                      <div class="list-date-diary">
                          <h4 class="mb-3 text-s ml-5"><strong>Consultas</strong></h4>
                          <div class="container-fluid" id="diary-miercoles-users">
                              
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-8 col-xl-8 col-lg-8">
                    <div class="sw-container" id="sw-miercoles">
                      
                    </div>
                     
                  </div>    
                  </div>    
              </div>
					</div>

					<div class="tab-pane" id="tabs-tabs-diary-jueves" role="tabpanel">
              <div class="container-fluid">
                  <div class="row" >
                  <div class="col-sm-4 col-xl-4 col-lg-4">                                                          
                      <div class="list-date-diary">
                          <h4 class="mb-3 text-s ml-5"><strong>Consultas</strong></h4>
                          <div class="container-fluid" id="diary-jueves-users">
                          </div>
                      </div>
                  </div>
                    <div class="col-sm-8 col-xl-8 col-lg-8">
                      <div class="sw-container" id="sw-jueves">
                        
                      </div>
                       
                    </div>    
                  </div>    
              </div>
					</div>

					<div class="tab-pane" id="tabs-tabs-diary-viernes" role="tabpanel">
              <div class="container-fluid">
                  <div class="row" >
                  <div class="col-sm-4 col-xl-4 col-lg-4">                                                          
                      <div class="list-date-diary">
                          <h4 class="mb-3 text-s ml-5"><strong>Consultas</strong></h4>
                          <div class="container-fluid" id="diary-viernes-users">
                             
                          </div>
                      </div>
                  </div>
                      <div class="col-sm-8 col-xl-8 col-lg-8">
                        <div class="sw-container" id="sw-viernes">
                          
                        </div>
                          
                      </div>    
                  </div>    
              </div>
					</div>

					<div class="tab-pane" id="tabs-tabs-diary-sabado" role="tabpanel">
              <div class="container-fluid">
                  <div class="row" >
                  <div class="col-sm-4 col-xl-4 col-lg-4">                                                          
                      <div class="list-date-diary">
                          <h4 class="mb-3 text-s ml-5"><strong>Consultas</strong></h4>
                          <div class="container-fluid" id="diary-sabado-users">
                          </div>
                      </div>
                  </div>
                      <div class="col-sm-8 col-xl-8 col-lg-8">
                        <div class="sw-container" id="sw-sabado">
                          
                        </div>
                          
                      </div>    
                  </div>    
              </div>
					</div>

					<div class="tab-pane" id="tabs-tabs-diary-domingo" role="tabpanel">
                <div class="container-fluid">
                    <div class="row" >
                    <div class="col-sm-4 col-xl-4 col-lg-4">                                                          
                        <div class="list-date-diary">
                            <h4 class="mb-3 text-s ml-5"><strong>Consultas</strong></h4>
                            <div class="container-fluid" id="diary-domingo-users">
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-8 col-xl-8 col-lg-8">
                          <div class="sw-container" id="sw-domingo">
                            
                          </div>
                            
                        </div>    
                    </div>    
                </div>
					</div>

				</div>
			</div>
		</div>

    <script src="{{ asset('js/diary.js') }}" ></script>
    <script type="text/javascript">

        let asset_global='{{asset("/")}}';        
        $(document).ready(function () {
            let route='listAppointment';
            controlador(route, week,'POST',function(data){
                console.log(data);
                pintarListaCitas(data);
            });
            CargarDia();
        });

    </script>
	</main>
  
  @include('person.medical-order-modal')

@endsection

