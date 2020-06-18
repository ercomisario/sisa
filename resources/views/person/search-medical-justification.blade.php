@extends('layouts.app')
@section('title','Consultar Justificativo')
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
							<span class="text-identifier-view"><strong>Consultar Justificativo</strong></span>
						</div>
						<div class="col-12  bg-white">
							<div class="card-body">
								<form action="javascript:search()" method="POST">
									@csrf
									<div class="form-row mt-2 mb-2">
										<div class="form-group col-md-2 col-lg-2">
										</div>

										<div class="form-group col-md-4 col-lg-4">
											<!-- <label for="nombre_menu">Ingrese un Dato</label> -->
											<div class="input-group">
												<input type="text" name="busqueda" id="busqueda" class="form-control input-search-2" placeholder="Nro de Justificativo" aria-label="Search" style="">
												<div class="input-group-append">
													<span class="input-group-text icon-search-2" style=""><i class="fas fa-fw fa-search" style="color: #5c92c8"></i></span>
												</div>
											</div>
										</div>		
									</div>
								</form>
							</div>
						</div>	
					</div>
				</div>
				<div class="container">
						<div class="row mt-5 mb-5">
							@isset($message)
								{{$message}}
							@endisset
						</div> <!--end div row -->
				</div>
				<script type="text/javascript">
					function search(){
						let id = getD('busqueda');
						setD('busqueda','');
						window.location='/medical-justification/'+id;
					}
				</script>
@endsection