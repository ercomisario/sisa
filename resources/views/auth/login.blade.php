@extends('layouts.app')
@section('title','Iniciar Sesión - S.I.S.A.')
@section('content')
<main class="container-fluid padding-lateral-0">
				<div class="row no-gutters">
					<div class="d-none d-md-block col-xl-6 col-lg-6 vh-100 bg-primary">
						<div class="d-flex align-items-center justify-content-center h-100">
						  <div class="d-flex flex-column">
						    <div style="">
						         <h1 class="text-center title-primary-1" style="">
						         	<strong> S.I.S.A.</strong>
						         </h1>
						         <h2 class="title-primary-2" style="">Sistema Integral <br>de Salud Asistencial</h2>
						    </div>
						  </div>
						</div>
					</div>
					<div class="col-sm-6 col-xl-6 col-lg-6 vh-100" style="position:relative">
						<div class="mobile-navbar d-xs-block d-sm-none d-flex align-items-center justify-content-center" style="top:0; width:100vw; height:50px;">
							<div class="mobile-navbar-tab text-center">
								<h1 style="margin-top:5px; color:#12375C; font-weight:bolder;">S.I.S.A.</h1>
								<span>Sistema de Información de Salud Asistencial</span>
							</div>
						</div>
						<div class="d-flex align-items-center justify-content-center vh-100">
						  <div class="d-flex flex-column" style="width: 80% !important">
						         <h1 class="text-p" style=""><strong> Inicia sesión </strong></h1>
						         <h2 class="text-s" style="">para continuar al sistema</h2>
						         <form method="POST" action="{{ route('login') }}">
									@csrf
						         	<div class="form-group">
						         		<input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" placeholder="Correo" value="{{ old('email') }}" required autocomplete="email" autofocus />
										 @error('email')
										 <span class="invalid-feedback" role="alert">
											 <strong>{{ $message }}</strong>
										 </span>
									 	@enderror
									</div>
						         	<div class="form-group">
						         		<input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" placeholder="Contraseña" required autocomplete="current-password" />
										 @error('password')
										 <span class="invalid-feedback" role="alert">
											 <strong>{{ $message }}</strong>
										 </span>
									 	 @enderror 
									   <small>
					                     <!-- <a href="#">¿Olvidó su contraseña?</a> -->
					                     <a href="/search-medical-justification">¿Deseas consultar un Justificativo?</a>
					                   </small>
						         	</div>
						         	<div class="text-right mt-3">
						         		<button class="btn btn-primario" type="submit "style="width: 250px; background-color: #FF9D00"> <strong>Iniciar Sesión</strong></button>
						         	</div>
						         </form>
						  </div>
						</div>
					</div>
				</div>
			</main>
@endsection