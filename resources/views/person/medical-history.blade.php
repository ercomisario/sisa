@extends ('layouts.app')
@section('title','Antecedentes Médicos')
@section('content')
    @isset($user)
        @component('components.navbar',['user' => $user,'person'=>$person])
        @endcomponent
        @component('components.sidebar',['user' => $user])
        @endcomponent
    @endisset
    <main class="container-fluid padding-lateral-0"> <!-- ANTECEDENTES PERSONALES -->
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
                                                    <div class="col-sm-3 col-xl-3 col-lg-3 text-center mb-3">
                                                    <img src="{{isset($patient) ? asset("img/avatars/".$patient->cedula.".jpg") : asset("img/avatars/".$person->cedula.".jpg")}}" width="64" height="64" class="rounded-circle" alt="{{isset($patient) ? $patient->name : $person->name}} avatar">
                                                    </div>
                                                    <div class="col-sm-9 col-xl-9 col-lg-9">
                                                        <div class="row">
                                                            @isset($user)
                                                                <div class="col">
                                                                <p class="text-p" style="font-size: 1rem"><strong>{{isset($patient) ? $patient->name : $person->name}}</strong></p>                                    
                                                                <p class="text-s">{{isset($patient) ? $patient->age : $person->age}} años de edad</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="text-s">C.I: {{isset($patient) ? $patient->cedula : $person->cedula}}</p>
                                                                    <p class="text-s">Tipo de Sangre: {{isset($patient) ? $patient->blood_type : $person->blood_type}}</p>
                                                                </div>
                                                            @endisset
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-4 col-xl-4 col-lg-4 align-self-center  text-center ">
                                            @isset($user)
                                                @if($user->role_id == 2)    
                                                    <button class="btn  btn-warning" style="width: 250px; margin-top: -20px"><i class="align-middle mr-2" data-feather="edit-3"></i> Nueva Atencion</button>
                                                @else
                                                
                                                @endif
                                            @endisset
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xl-12 col-lg-12 ">
                                    <div class="row justify-content-center mb-2">
                                        <div class="tab text-center tabs-principal">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item nav-item-tabs-p" style=""><a class="nav-link " href="#tab-antecedentes-medicos" data-toggle="tab" role="tab" aria-selected="true"><strong>ANTECEDENTES MÉDICOS</strong></a></li>
                                                <li class="nav-item nav-item-tabs-p" style=""><a class="nav-link " href="#tab-registro-medico" data-toggle="tab" role="tab" aria-selected="false"><strong>REGISTRO MÉDICO</strong></a></li>
                                               <!--  @isset($user)
                                                    @if($user->role_id != 2)
                                                
                                                    @else
                                                        <li class="nav-item nav-item-tabs-p" style=""><a class="nav-link " href="#tab-ordenes-medicos" data-toggle="tab" role="tab" aria-selected="false"><strong>ORDENES MÉDICAS</strong></a></li>
                                                    @endif
                                                @endisset -->
                                            </ul>		
                                        </div>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                    <div class="container">
                        <div class="tab mt-5">
                            <div class="tab-content tabs-principal-content" style="">
                                    @include('person.medical-background')
                                <div class="tab-pane" id="tab-registro-medico" role="tabpanel"> <!-- REGISTROS MEDICOS -->
                                    @include('person.medical-record')
                                </div>
                                <div class="tab-pane" id="tab-ordenes-medicos" role="tabpanel">
                                    @include('person.medical-order')
                                </div>
                            </div>
                        </div>
                    </div>
			</main>    
@endsection