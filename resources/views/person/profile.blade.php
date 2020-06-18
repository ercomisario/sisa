@extends('layouts.app')
@section('title','Perfil Personal')
@section('content')
@isset($user)
	@component('components.navbar',['user' => $user,'person'=>$person])
	@endcomponent
	@component('components.sidebar',['user' => $user])
	@endcomponent
@endisset
	<main class="container-fluid padding-lateral-0">
					<div class="bg-white shadow">
						<div class="row no-gutters">
							<div class="col-lg-1  d-none d-sm-inline-block identifier-view-1"  style="">
							</div>
							<div class="col-lg-3  d-none d-sm-inline-block text-center identifier-view-2" style="">
								<span class="text-identifier-view"><strong>
									@isset($paciente)										
										Perfil del Paciente
									@endisset
									@isset($user)
										@if($user->role->name == 'doctor')
										Perfil del Doctor	
										@else
											@if ($user->role->name == 'nurse')
												Perfil de Enfermera
											@else
											 	Perfil de Paciente 
											@endif
											
										@endif
									@endisset
									
								</strong></span>
							</div>
							<div class="col-12  bg-white">
								<div class="col-sm-12 col-xl-12 col-lg-12">
									<div class="row no-gutters align-self-center  mt-3">
										<div class="col-sm-12 col-xl-12 col-lg-12">
											<div class="card-body">
												<div class="row no-gutters">
													<div class="col-sm-3 col-xl-3 col-lg-3 text-center mb-3">
														<img src="{{asset('img/avatars/'.$person->cedula.'.jpg')}}" width="150" height="150" class="rounded-circle" alt="{{$person->name}}">
													</div>
													<div class="col-sm-5 col-xl-5 col-lg-5 mt-3">
														<p class="text-p " style="font-size: 1rem"><strong>
															@isset($user)
																@if($user->rolde_id == 2)
																	Dr. {{$doctor->last_name.','.$doctor->name}}
																@elseif($user->role_id == 3)
																	Enf. {{$person->last_name.','.$person->name}}
																@else
																	{{$person->last_name.','.$person->name}}
																@endif
															@endisset
														</strong></p>
														@isset($user)
															@if($user->role_id == 2)
																<p class="text-p">{{$doctor->speciality}}</p>
																<p class="text-p"><strong>Nº Médico {{$doctor->license}}</strong></p>
															@endif
														@endisset
													</div>
													<div class="col-sm-4 col-xl-4 col-lg-4 align-self-center  text-center">
														<button class="btn  btn-warning" onclick="window.location='/person'" style="width: 250px; margin-top: -20px"><i class="align-middle mr-2" data-feather="edit-3"></i><strong> Registro Médico</strong></button>
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
						<div class="row mt-5">
								<div class="col-6">
									<h4 class="mb-3 text-s"><strong>Datos Personales</strong> <!-- <i class="align-middle ml-2" data-feather="edit-3"></i> --></h4>
								<p></p>
								@isset($user)
									<div class="card shadow">
										<div class="card-body">
											<div class="row m-4">
												<div class="col-5 text-right">
													<p class="text-p"><strong>Nombre Completo</strong></p>
													<p class="text-p"><strong>C.I</strong></p>
													<p class="text-p"><strong>Fecha de Nacimiento</strong></p>
													<p class="text-p"><strong>Edad</strong></p>
													<p class="text-p"><strong>Tipo de Sangre</strong></p>
													<p class="text-p"><strong>Seguro Social</strong></p>
												</div>
												<div class="col-7">
													<p class="text-p">{{$person->name}} {{$person->last_name}}</p>
													<p class="text-p">{{$person->cedula}}</p>
													<p class="text-p">{{$person->birthday}}</p>
													<p class="text-p">{{$person->age}} años</p>
													<p class="text-p">{{$person->blood_type}}</p>
													<p class="text-p">{{$person->social_number}}</p>
												</div>
												<div class="col-12"> <hr> </div>
												<div class="col-5 text-right">
													<p class="text-p"><strong>Correo Electrónico</strong></p>
													<p class="text-p"><strong>Número de Telefono</strong></p>
													<p class="text-p"><strong>Dirección</strong></p>
												</div>
												<div class="col-7">
													<p class="text-p">{{$user->email}}</p>
													<p class="text-p">{{$person->phone}}</p>
													<p class="text-p">{{$person->location}}</p>
												</div>
											</div>
										</div>
									</div>
								@endisset
									<h4 class="mb-3 text-s"><strong>Parentesco</strong></h4>
										<div class="row mb-5">
											<!-- <div class="col-12">
											<div class="card shadow card-border card-mb-10">
												<div class="card-body">
													<div class="row">
															<div class="col-2 text-center">
																<img src="img/avatars/avatar-5.jpg" class="rounded-circle mr-2" alt="Ashley Briggs" width="45" height="45">
															</div>
															<div class="col-7">
																<span class="text-p" style="">Apellido,Nombre</span><br>
																<span class="text-p" style="">Tlf 123-456-7890</span>
															</div>
															<div class="col-3 text-right">
																<span class="text-p" style=""><strong>Madre</strong></span>
															</div>
													</div>
												</div>
											</div>  
											</div>
											<div class="col-12">
											<div class="card shadow card-border card-mb-10">
												<div class="card-body">
													<div class="row">
															<div class="col-2 text-center">
																<img src="img/avatars/avatar-5.jpg" class="rounded-circle mr-2" alt="Ashley Briggs" width="45" height="45">
															</div>
															<div class="col-7">
																<span class="text-p" style="">Apellido,Nombre</span><br>
																<span class="text-p" style="">Tlf 123-456-7890</span>
															</div>
															<div class="col-3 text-right">
																<span class="text-p" style=""><strong>Madre</strong></span>
															</div>
													</div>
												</div>
											</div>  
											</div>
											<div class="col-12">
											<div class="card shadow card-border card-mb-10">
												<div class="card-body">
													<div class="row">
														<div class="col-2 text-center">
															<img src="img/avatars/avatar-5.jpg" class="rounded-circle mr-2" alt="Ashley Briggs" width="45" height="45">
														</div>
														<div class="col-7">
															<span class="text-p" style="">Apellido,Nombre</span><br>
															<span class="text-p" style="">Tlf 123-456-7890</span>
														</div>
														<div class="col-3 text-right">
															<span class="text-p" style=""><strong>Madre</strong></span>
														</div>
													</div>
												</div>
											</div>  
											</div> -->
										</div>
								</div>
								<div class="col-6">
									<h4 class="mb-3 text-s"><strong>Último Registro</strong></h4>
										<div class="card shadow" style="">
												<div class="card-body">
													<div class="row m-2">
											@if($clinicalCases)
														<div class="col-12">
																<p class="text-p text-justify"> <strong>Dr. </strong>{{$clinicalCases->doctor_last_name}}, {{$clinicalCases->doctor}}</p>
														</div>
														<div class="col-6">
															<p class="text-p"><strong>Fecha de Ingreso</strong><br> {{$clinicalCases->created_at}}</p>
														</div>
														<div class="col-6">
															<p class="text-p"><strong>Fecha de Egreso</strong><br> DD/MM/AAAA</p>
														</div>
														<div class="col-12">
																<p class="text-p text-justify"> <strong>Patologia: </strong>{{$clinicalCases->pathology}}</p>
														</div>
														<div class="col-12">
																<p class="text-p text-justify"> <strong>Diagnostico: </strong>{{$clinicalCases->diagnostic}}</p>
														</div>
														<div class="col-12">
																<p class="text-p text-justify"> <strong>Descripción: </strong>{{$clinicalCases->medical_consultation->description	}}</p>
														</div>
														<div class="col-12">
																<p class="text-p text-justify"> <strong>Centro medico: </strong>{{$clinicalCases->medicalCenter}}</p>
														</div>
											@endif
													</div>
												</div>
										</div>
										<h4 class="mb-3 text-s"><strong>Alergias</strong></h4>
										<!-- <div class="row m-3">
											<div class="shadow card text-center text-p mr-3" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Ligma</p></div>
											<div class="shadow card text-center text-p mr-3" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Ligma 1</p></div>
											<div class="shadow card text-center text-p mr-3" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Ligma</p></div>
											<div class="shadow card text-center text-p mr-3" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Ligmavallz</p></div>
										</div> -->
								</div>
						</div>
					</div>
			</main>
@endsection