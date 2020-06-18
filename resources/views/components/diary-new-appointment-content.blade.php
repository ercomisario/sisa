<h1 class="h3 mb-3 text-s ml-4 mb-4"><strong>Informe Médico</strong></h1>
<div class="col-12">
  <div class="card" style="min-height: 466px">
  	<div class="card-body shadow ">
    		<form>
    			<div class="form-row ">
    				<h4 class="ml-3 mt-3 text-p " style=""><strong>DIAGNÓSTICO DE LA CONSULTA</strong></h4>
    				<div class="form-group col-md-11 mt-3 ml-4">
							<textarea class="form-control" placeholder="Descriptión del Diagnóstico ..." rows="4"></textarea>
						</div>
						<h4 class="ml-3 mt-3 text-p  text-left" style=""><strong>ESTUDIO REALIZADOS</strong></h4>
						<div class="form-group col-md-11 mt-3 ml-4">
							<button class="btn  btn-warning" style=""><i class="align-middle mr-2" data-feather="arrow-up-circle"></i></i> Adjuntar Archivo</button>
						  <h5 class=" mt-3 text-s " style=""><strong>HALLAZGOS DE EXÁMENES</strong></h5>
							<textarea class="form-control" placeholder="Descriptión de hallazgos ..." rows="4"></textarea>
						</div>
						<div class="form-group col-md-11 mt-3 ml-4">
							<hr>
						</div>
						<h4 class="ml-3 mt-3 text-p " style=""><strong>ORDENES MÉDICAS</strong></h4>
    				<div class="form-group col-md-11 mt-3 ml-4">
							<h5 class="ml-3 text-s" style="padding-right: 12px"><strong>Medicamentos</strong> <span class="btn-agg-order btn-floating" data-toggle="modal" data-target="#centeredModalMedicamentos"> <i class="align-middle fas fa-plus "></i> </span></h5>
							<div class="card shadow card-mb-5 card-border ml-5" style="max-width: 55%">
							  <div class="card-body">
							   	<div class="row">
							   		<div class="col-6"><h5 class="card-title mb-0 text-p">Aspirina</h5></div>
							   		<div class="col-6 text-right"><span class="" onclick="" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
							   		<div class="col-6"><h5 class="mb-0 text-p">81 mg <span class="ml-3 text-s"> 1/d</span></h5></div>
							   		<div class="col-6 text-right"><span class="btn-floating float-right text-p">Inicio - Fin</span></div>
							   		<div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr Apellido, Nombre</h5></div>
							   	</div>
							  </div>
							</div>

							<h5 class="ml-3 mt-5 text-s" style="padding-right: 12px"><strong>Interconsultas</strong> <span class="btn-agg-order btn-floating "  data-toggle="modal" data-target="#centeredModalInterconsulta"> <i class="align-middle fas fa-plus "></i> </span></h5>
							<div class="card shadow card-mb-5 card-border  ml-5" style="max-width: 55%">
							  <div class="card-body">
							   	<div class="row">
							   		<div class="col-6"><h5 class="card-title mb-0 text-p">Motivo</h5></div>
							   		<div class="col-6 text-right"><span class="" onclick="" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
							   		<div class="col-12 text-right"><span class="btn-floating float-right text-p">Inicio - Fin</span></div>
							   		<div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr Apellido, Nombre</h5></div>
							   	</div>
							  </div>
							</div>

							<h5 class="ml-3 mt-5 text-s" style="padding-right: 12px"><strong>Exámenes</strong> <span class="btn-agg-order btn-floating" data-toggle="modal" data-target="#centeredModalExamen"> <i class="align-middle fas fa-plus "></i> </span></h5>											 
						  <div class="card shadow card-mb-5 card-border ml-5" style="max-width: 55%">
							  <div class="card-body">
							   	<div class="row">
							   		<div class="col-6"><h5 class="card-title mb-0 text-p">Motivo</h5></div>
							   		<div class="col-6 text-right"><span class="" onclick="" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
							   		<div class="col-12 text-right"><span class="btn-floating float-right text-p">Inicio - Fin</span></div>
							   		<div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr Apellido, Nombre</h5></div>
							   	</div>
							  </div>
							</div>

						</div>

						<div class="form-group mt-3 col-md-12 col-lg-12">
							<div class="form-inline ml-5 "> 
								<label class="custom-control  custom-radio mr-4">
				          <input name="nivel_modulo" type="radio" class="custom-control-input" id="id_padre_p" value="PRINCIPAL">
				          <span class="custom-control-label">Revisión de Exámenes</span>
				        </label>
								<label class="custom-control  custom-radio mr-4">
				          <input name="nivel_modulo" type="radio" class="custom-control-input" id="id_padre_s" value="SUBMENU">
				          <span class="custom-control-label">Hospitalización</span>
				        </label>
				       </div>
						</div>

						<div class="form-group col-md-11 mt-3 ml-4">
							<hr>
						</div>

						<h4 class="ml-3 mt-3 text-p  text-left" style=""><strong>JUSTIFICATIVO MÉDICO</strong></h4>
						<div class="form-group col-md-11 mt-3 ml-4">
							<h5 class="text-s " style=""><strong>Tiempo del Justificativo Médico</strong></h5>
							<input class="form-control" type="text" name="daterange" value="01/01/2018 - 01/15/2018" style="max-width: 30%" />

						  <h5 class=" mt-3 text-s " style=""><strong>Descriptión del Justificativo Médico</strong></h5>
							<textarea class="form-control" placeholder="Descriptión del justificativo ..." rows="4"></textarea>
						</div>
    			</div>
    		</form>	
  	</div>
  </div>
</div>