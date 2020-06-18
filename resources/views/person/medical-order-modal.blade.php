    <!-- MODAL ORDENES -->
<!-- Medicamento modal -->
<div class="modal fade" id="centeredModalMedicamentos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1100px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-s mt-2 ml-4"><strong id="TitleModalMedicamento">Medicamento</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="CloseModalMedicamentos">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <div class="modal-body mt-0 mr-4 ml-4 mb-4">
                <div class="row">
                    <div class="col-5">
                        <div class="text-justify">
                            <p class="text-p"><strong>Enfermedades base</strong></p>
                            <span class="text-s" id="centeredModalMedicamentosEnfermdadBase"> </span>
                        </div>
                        <br>
                        <div class="text-justify">
                            <p class="text-p"><strong>Alergias</strong></p>
                            <span class="text-s"  id="centeredModalMedicamentosAlergias"> </span>
                        </div>
                    </div>
                    <div class="col-7">
                        <form method="POST" action="javascript:ModalGuardarMedicamento()">
                            @csrf
                            <input type="hidden" class="form-control" id="MedicamentoId" value="">
                            <input type="hidden" class="form-control" id="MedicamentoPresentation_Id" value="">
                            <div class="form-row">
                                
                                <div class="form-group col-md-7 col-lg-7">
                                    <label for="MedicamentoCompuesto" class="text-s"><strong>Compuesto</strong></label>
                                    <input required="" type="text" class="form-control" id="MedicamentoCompuesto" placeholder="Nombre del Compuesto">
                                </div>
                                <div class="form-group col-md-2 col-lg-2">
                                    <label  for="MedicamentoDosis" class="text-s"><strong>Dosis</strong></label>
                                    <input required="" type="text" class="form-control" id="MedicamentoDosis" placeholder="cantidad" onkeypress="return solo_numeric(event)">
                                </div>
                                <div class="form-group col-md-1 col-lg-1" style="padding-top: 12px; padding-left: 10px;"><br>
                                    <span id="Unidad">mg</span>
                                </div>
                                <div class="form-group col-md-2 col-lg-2">
                                    <label for="MedicamentoFrecuencia" class="text-s"><strong>Frecuencia</strong></label>
                                    <input required="" type="text" class="form-control" id="MedicamentoFrecuencia" placeholder="1/h" onkeypress="return solo_numeric(event)">
                                </div>
                                <div class="form-group col-lg-12 col-md-12">
                                    <div class="accordion" id="accordionExample">
                                        <div class="">
                                            <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <div class="" id="headingOne">
                                                    <h5 class="my-2">
                                                        <label for="" class="text-s"><strong>Información</strong></label>
                                                    </h5>
                                                </div>
                                            </a>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="">
                                                    
                                                    <div class="col-md-12 col-lg-12">
                                                        <h5 class="ml-3 mt-3 text-p " style=""><strong>Descripción </strong></h5>
                                                        <p class="text-s text-justify" id="Descripcion"></p>
                                                        
                                                    </div>
                                                    <div class="col-md-12 col-lg-12">
                                                        <h5 class="ml-3 mt-3 text-p" style=""><strong>Indicaciones </strong></h5>
                                                        <p class="text-s text-justify" id="Indicaciones"></p>
                                                        
                                                    </div>
                                                    <div class="col-md-12 col-lg-12">                                                      
                                                        <h5 class="ml-3 mt-3 text-p " style=""><strong>Contraindicaciones </strong></h5>
                                                        <p class="text-s text-justify" id="Contraindicaciones"></p>
                                                    
                                                     </div>


                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="MedicamentoConsultaTipoPresentacion" class="text-s"><strong>Tipo de Presentacion</strong></label>
                                    <span id="TipoPresentacion" class="form-control">Tipo de Presentacion</span>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="MedicamentoConsultaAdministerRoute" class="text-s"><strong>Vía de administración</strong></label>
                                    <span id="AdministerRoute" class="form-control">Via de Administracion</span>
                                </div>
                                <div class="form-group col-md-12 col-lg-12">
                                    <label for="MedicamentoObservacion" class="text-s"><strong>Observaciones</strong></label>
                                    <textarea  required="" class="form-control" rows="2" id="MedicamentoObservacion" placeholder="Observaciones"></textarea>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="MedicamentoFechaRango" class="text-s"><strong>Fecha Inicio - Fecha Fin</strong></label>
                                    <input required="" class="form-control" type="text" id="MedicamentoFechaRango" value="" />
                                </div>
                                <div class="form-group col-md-6 col-lg-6 text-right">
                                    <button type="submit" class="btn btn-warning" style="margin-top: 28px" onclick=""><strong>Aceptar</strong></button>
                                </div>
                            </div>
                        </form>  
                    </div>
                    
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><strong>Aceptar</strong></button>
            </div> -->
        </div>
    </div>
</div>
<!-- END Medicamento modal -->

<!-- Cuidados modal -->
<div class="modal fade" id="centeredModalCuidados" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-s mt-2 ml-4"><strong>Cuidado</strong></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="CloseModalCuidados">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body mt-0 mr-4 ml-4 mb-4">
                <form method="POST" action="javascript:ModalGuardarCuidado()">
                    @csrf
                    <input type="hidden" class="form-control" id="CuidadoId" value="">
                    <div class="form-row">
                        <div class="form-group col-md-7 col-lg-7">
                            <label for="CuidadoDescripcion" class="text-s"><strong>Descripción del cuidado</strong></label>
                            <textarea required="" class="form-control" rows="4" id="CuidadoDescripcion" placeholder="Descripción"></textarea>
                        </div>
                        <div class="form-group col-md-5 col-lg-5">
                            <!-- <div class="form-group col-md-12 col-lg-12">
                                <label for="frecuencia" class="text-s"><strong>Fecha Inicio - Fecha Fin</strong></label>
                                <input class="form-control" type="text" id="CuidadoFechaRango" value="" />
                            </div> -->
                            <div class="form-group col-md-12 col-lg-12 text-right">
                                <button type="submit" class="btn btn-warning" style="margin-top: 28px" onclick=""><strong>Aceptar</strong></button>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal"><strong>Aceptar</strong></button>
			</div> -->
		</div>
	</div>
</div>
<!-- END Cuidados modal -->

<!-- Interconsulta modal -->
<div class="modal fade" id="centeredModalInterconsulta" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-s mt-2 ml-4"><strong>Interconsulta</strong></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="CloseModalInterconsulta">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body mt-0 mr-4 ml-4 mb-4">
                <form method="POST" action="javascript:ModalGuardarInterconsulta()">
                    @csrf
                    <input type="hidden" class="form-control" id="InterconsultaId" value="">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="InterconsultaEspecialidad" class="text-s"><strong>Especialidad</strong></label>
                            <input required="" type="text" class="form-control" id="InterconsultaEspecialidad" placeholder="Nombre de la Especialidad">
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="InterconsultaDoctor" class="text-s"><strong>Doctor Solicitado</strong></label>
                            <!-- <input type="text" class="form-control" id="InterconsultaDoctor" placeholder="Dr. Apellido, Nombre"> -->
                            <select id="InterconsultaDoctor" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-md-8 col-lg-8">
                            <label for="InterconsultaMotivo" class="text-s"><strong>Motivo de Solicitud</strong></label>
                            <textarea required="" class="form-control" rows="4" id="InterconsultaMotivo" placeholder="Motivo de la Solicitud ..."></textarea>
                        </div>
                        <div class="form-group col-md-4 col-lg-4 text-right align-self-end">
                            <button type="submit" class="btn btn-warning" style="margin-top: 28px" onclick=""><strong>Aceptar</strong></button>
                        </div>
                    </div>
                </form>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal"><strong>Aceptar</strong></button>
			</div> -->
		</div>
	</div>
</div>
<!-- END Interconsulta modal -->

<!-- Examen modal -->
<div class="modal fade" id="centeredModalExamen" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-s mt-2 ml-4"><strong>Examen</strong></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="CloseModalExamen">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body mt-0 mr-4 ml-4 mb-4">
                <form method="POST" action="javascript:ModalGuardarExamen()">
                    @csrf
                    <input type="hidden" class="form-control" id="ExamenId" value="">
                    <div class="form-row">
                        <div class="form-group col-md-5 col-lg-5">
                            <label for="ExamenTipo">Tipo de Examen</label>
                            <select required="" id="ExamenTipo" class="form-control">
                                <option selected value="">seleccione ... </option>
                                <option value="Ácido úrico">Ácido úrico</option>
                                <option value="Ácido láctico">Ácido láctico</option>
                                <option value="Adenovirus ">Adenovirus </option>
                                <option value="Aglutininas">Aglutininas</option>
                                <option value="Albumina">Albumina</option>
                                <option value="Alt">Alt</option>
                                <option value="Aldolasa">Aldolasa</option>
                                <option value="Aldosterona">Aldosterona</option>
                                <option value="Afp">Afp</option>
                                <option value="Amilasa sérica">Amilasa sérica</option>
                                <option value="Amilasa urinaria ">Amilasa urinaria </option>
                                <option value="Benzoadiazepina">Benzoadiazepina</option>
                                <option value="Beta 2">Beta 2</option>
                                <option value="Bilirrubina">Bilirrubina</option>
                                <option value="Calcio sérico">Calcio sérico</option>
                                <option value="Calcio en orina">Calcio en orina</option>
                                <option value="Colesterol">Colesterol</option>
                                <option value="C3 ">C3 </option>
                                <option value="C4">C4</option>
                                <option value="Creatinina">Creatinina</option>
                                <option value="Dengue igg-igm">Dengue igg-igm</option>
                                <option value="Digoxina">Digoxina</option>
                                <option value="Drepanocitos">Drepanocitos</option>
                                <option value="Eosinofilos">Eosinofilos</option>
                                <option value="Electrolitos">Electrolitos</option>
                                <option value="Estradiol">Estradiol</option>
                                <option value="Folato">Folato</option>
                                <option value="Fosfatasa at">Fosfatasa at</option>
                                <option value="Fosfatasa ap">Fosfatasa ap</option>
                                <option value="Fosfatasa">Fosfatasa</option>
                                <option value="Fosforo">Fosforo</option>
                                <option value="Fsh">Fsh</option>
                                <option value="Hcg">Hcg</option>
                                <option value="Ggt">Ggt</option>
                                <option value="Gota gruesa">Gota gruesa</option>
                                <option value="Globulinas ">Globulinas </option>
                                <option value="Glucosa sérica ">Glucosa sérica </option>
                                <option value="Helicobacter">Helicobacter</option>
                                <option value="Hematología completa ">Hematología completa </option>
                                <option value="Hemocultivo">Hemocultivo</option>
                                <option value="Herpes simplex">Herpes simplex</option>
                                <option value="Hierro sérico">Hierro sérico</option>
                                <option value="Hgh">Hgh</option>
                                <option value="Acth">Acth</option>
                                <option value="Hdl colesterol">Hdl colesterol</option>
                                <option value="Hdl electroforesis">Hdl electroforesis</option>
                                <option value="Inmunoglobulinas a">Inmunoglobulinas a</option>
                                <option value="Inmunoglobulinas e">Inmunoglobulinas e</option>
                                <option value="Inmunoglobulinas g">Inmunoglobulinas g</option>
                                <option value="Inmunoglobulinas m ">Inmunoglobulinas m </option>
                                <option value="Insulina basal">Insulina basal</option>
                                <option value="Ldh">Ldh</option>
                                <option value="Lh ">Lh </option>
                                <option value="Lipasa sérica">Lipasa sérica</option>
                                <option value="Lipasa urinaria">Lipasa urinaria</option>
                                <option value="Litio">Litio</option>
                                <option value="Magnesio sérico">Magnesio sérico</option>
                                <option value="Marcadores hepatitis a-b-c">Marcadores hepatitis a-b-c</option>
                                <option value="Mioglobina">Mioglobina</option>
                                <option value="Micoplasma pneumoniae">Micoplasma pneumoniae</option>
                                <option value="Microalbuminuria">Microalbuminuria</option>
                                <option value="Monotest">Monotest</option>
                                <option value="Nitrogeno ureico">Nitrogeno ureico</option>
                                <option value="Orina">Orina</option>
                                <option value="Osmolaridad en orina">Osmolaridad en orina</option>
                                <option value="Osmolaridad en suero">Osmolaridad en suero</option>
                                <option value="Osteocalcina">Osteocalcina</option>
                                <option value="Potasio sérico">Potasio sérico</option>
                                <option value="Progesterona">Progesterona</option>
                                <option value="Prolactina">Prolactina</option>
                                <option value="Péptido c">Péptido c</option>
                                <option value="Proteínas en orina">Proteínas en orina</option>
                                <option value="Recuento minutado">Recuento minutado</option>
                                <option value="Renina plasmática">Renina plasmática</option>
                                <option value="Reticulocitos">Reticulocitos</option>
                                <option value="Retracción del coagulo">Retracción del coagulo</option>
                                <option value="Rotavirus">Rotavirus</option>
                                <option value="Rubéola">Rubéola</option>
                                <option value="Serología para amibas">Serología para amibas</option>
                                <option value="Serología para hongos">Serología para hongos</option>
                                <option value="Serología para leptospira">Serología para leptospira</option>
                                <option value="Serología para tuberculosis">Serología para tuberculosis</option>
                                <option value="Serología para plasmodium vivax">Serología para plasmodium vivax</option>
                                <option value="Serología para plasmodium falciparum">Serología para plasmodium falciparum</option>
                                <option value="Sodio">Sodio</option>
                                <option value="T3 libre">T3 libre</option>
                                <option value="T4 libre">T4 libre</option>
                                <option value="T4 neonatal">T4 neonatal</option>
                                <option value="Teofilina">Teofilina</option>
                                <option value="Toxoplasma gondii">Toxoplasma gondii</option>
                                <option value="Triglicéridos ">Triglicéridos </option>
                                <option value="Testosterona">Testosterona</option>
                                <option value="Tiempo de coagulación tc">Tiempo de coagulación tc</option>
                                <option value="Tiempo de protombina pt">Tiempo de protombina pt</option>
                                <option value="Ppt ">Ppt </option>
                                <option value="Ts">Ts</option>
                                <option value="Troponina">Troponina</option>
                                <option value="Urocultivo">Urocultivo</option>
                                <option value="Vsg">Vsg</option>
                                <option value="Hiv">Hiv</option>
                                <option value="Vdrl">Vdrl</option>
                                <option value="Vldl">Vldl</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 col-lg-8">
                            <label for="ExamenDescripcion" class="text-s"><strong>Motivo de Solicitud</strong></label>
                            <textarea required="" class="form-control" rows="4" id="ExamenDescripcion" placeholder="Motivo de la Solicitud ..."></textarea>
                        </div>
                        <div class="form-group col-md-4 col-lg-4 text-right align-self-end">
                            <button type="submit" class="btn btn-warning" style="margin-top: 28px" onclick=""><strong>Aceptar</strong></button>
                        </div>
                    </div>
                </form>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-warning" data-dismiss="modal"><strong>Aceptar</strong></button>
			</div> -->
		</div>
	</div>
</div>
<!-- END Examen modal -->

<script type="text/javascript">
    $(document).ready(function () {
        //funcion mala
        //GetDoctorInterconsulta();
    })
</script>

    <!-- MODAL ORDENES CONSULTA -->
<!-- Medicamento Consulta modal -->
<div class="modal fade" id="centeredModalMedicamentosConsulta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 1100px !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-s mt-2 ml-4"><strong id="TitleModalMedicamentoConsulta">MedicamentoConsulta</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="CloseModalMedicamentoConsultas">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mt-0 mr-4 ml-4 mb-4">
                <div class="row">
                    <div class="col-5">
                        <div class="text-justify">
                            <p class="text-p"><strong>Enfermedades base</strong></p>
                            <span class="text-s" id="centeredModalMedicamentosConsultaEnfermdadBase"> </span>
                        </div>
                        <br>
                        <div class="text-justify">
                            <p class="text-p"><strong>Alergias</strong></p>
                            <span class="text-s"  id="centeredModalMedicamentosConsultaAlergias"> </span>
                        </div>
                    </div>
                    <div class="col-7">
                        <form method="POST" action="javascript:ModalGuardarMedicamentoConsulta()">
                            @csrf
                            <input type="hidden" class="form-control" id="presentation_Id" value="">
                            <input type="hidden" class="form-control" id="MedicamentoConsultaId" value="">
                            <div class="form-row">
                                
                                <div class="form-group col-md-7 col-lg-7">
                                    <label for="MedicamentoConsultaCompuesto" class="text-s"><strong>Compuesto</strong></label>
                                    <input required="" type="text" class="form-control" id="MedicamentoConsultaCompuesto" placeholder="Nombre del Compuesto">
                                </div>
                                <div class="form-group col-md-2 col-lg-2">
                                    <label  for="MedicamentoConsultaDosis" class="text-s"><strong>Dosis</strong></label>
                                    <input required="" type="text" class="form-control" id="MedicamentoConsultaDosis" placeholder="cantidad" onkeypress="return solo_numeric(event)">
                                </div>
                                <div class="form-group col-md-1 col-lg-1" style="padding-top: 12px; padding-left: 10px;"><br>
                                    <span id="MedicamentoConsultaUnidad">mg</span>
                                </div>
                                <div class="form-group col-md-2 col-lg-2">
                                    <label for="MedicamentoConsultaFrecuencia" class="text-s"><strong>Frecuencia</strong></label>
                                    <input required="" type="text" class="form-control" id="MedicamentoConsultaFrecuencia" placeholder="1/h" onkeypress="return solo_numeric(event)">
                                </div>
                                <div class="form-group col-lg-12 col-md-12">
                                    <div class="accordion" id="accordionExample">
                                        <div class="">
                                            <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <div class="" id="headingOne">
                                                    <h5 class="my-2">
                                                        <label for="" class="text-s"><strong>Información</strong></label>
                                                    </h5>
                                                </div>
                                            </a>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="">
                                                    
                                                    <div class="col-md-12 col-lg-12">
                                                        <h5 class="ml-3 mt-3 text-p " style=""><strong>Descripción </strong></h5>
                                                        <p class="text-s text-justify" id="MedicamentoConsultaDescripcion"></p>
                                                        
                                                    </div>
                                                    <div class="col-md-12 col-lg-12">
                                                        <h5 class="ml-3 mt-3 text-p" style=""><strong>Indicaciones </strong></h5>
                                                        <p class="text-s text-justify" id="MedicamentoConsultaIndicaciones"></p>
                                                        
                                                    </div>
                                                    <div class="col-md-12 col-lg-12">                                                      
                                                        <h5 class="ml-3 mt-3 text-p " style=""><strong>Contraindicaciones </strong></h5>
                                                        <p class="text-s text-justify" id="MedicamentoConsultaContraindicaciones"></p>
                                                    
                                                     </div>


                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="MedicamentoConsultaTipoPresentacion" class="text-s"><strong>Tipo de Presentacion</strong></label>
                                    <span id="MedicamentoConsultaTipoPresentacion" class="form-control">Tipo de Presentacion</span>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="MedicamentoConsultaAdministerRoute" class="text-s"><strong>Vía de administración</strong></label>
                                    <span id="MedicamentoConsultaAdministerRoute" class="form-control">Via de Administracion</span>
                                </div>
                                <div class="form-group col-md-12 col-lg-12">
                                    <label for="MedicamentoConsultaObservacion" class="text-s"><strong>Observaciones</strong></label>
                                    <textarea  required="" class="form-control" rows="2" id="MedicamentoConsultaObservacion" placeholder="Observaciones"></textarea>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="MedicamentoConsultaFechaRango" class="text-s"><strong>Fecha Inicio - Fecha Fin</strong></label>
                                    <input required="" class="form-control" type="text" id="MedicamentoConsultaFechaRango" value="" />
                                </div>
                                <div class="form-group col-md-6 col-lg-6 text-right">
                                    <button type="submit" class="btn btn-warning" style="margin-top: 28px" onclick=""><strong>Aceptar</strong></button>
                                </div>
                            </div>
                        </form>  
                    </div>
                    
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><strong>Aceptar</strong></button>
            </div> -->
        </div>
    </div>
</div>
<!-- END Medicamento Consulta modal -->
<script  type="text/javascript">
    $(document).ready(function(){
        var option = {
            url: function(search) {
	       			return "{{route('presentation')}}?search=" + search;
	   			    },
            theme:"2",
            getValue: function(presentation) {
						return presentation.component+" "+presentation.presentationType;
				      },
				
			list: {
	        		onChooseEvent: function() {
	            	var selectedPresentation ;
					selectedPresentation = $("#MedicamentoConsultaCompuesto").getSelectedItemData();
					$('#presentation_Id').val(selectedPresentation.id);
                    $('#MedicamentoConsultaUnidad').text(selectedPresentation.unit_measurement);
					$('#MedicamentoConsultaDescripcion').text(selectedPresentation.description);
                    $('#MedicamentoConsultaIndicaciones').text(selectedPresentation.indication);
                    $('#MedicamentoConsultaContraindicaciones').text(selectedPresentation.contraindication);
                    $('#MedicamentoConsultaTipoPresentacion').text(selectedPresentation.presentationType);
                    $('#MedicamentoConsultaAdministerRoute').text(selectedPresentation.administerRoute);             
				
					}
	        	}
        };
        $('#MedicamentoConsultaCompuesto').easyAutocomplete(option);

         var option1 = {
            url: function(search) {
                    return "{{route('presentation')}}?search=" + search;
                    },
            theme:"2",
            getValue: function(presentation) {
                        return presentation.component+" "+presentation.presentationType;
                      },
                
            list: {
                    onChooseEvent: function() {
                    var selectedPresentation ;
                    selectedPresentation = $("#MedicamentoCompuesto").getSelectedItemData();
                    $('#MedicamentoPresentation_Id').val(selectedPresentation.id);
                    $('#Unidad').text(selectedPresentation.unit_measurement);
                    $('#Descripcion').text(selectedPresentation.description);
                    $('#Indicaciones').text(selectedPresentation.indication);
                    $('#Contraindicaciones').text(selectedPresentation.contraindication);
                    $('#TipoPresentacion').text(selectedPresentation.presentationType);
                    $('#AdministerRoute').text(selectedPresentation.administerRoute);             
                
                    }
                }
        };
        $('#MedicamentoCompuesto').easyAutocomplete(option1);

    });

</script>

<!-- Cuidados Consulta modal -->
<div class="modal fade" id="centeredModalCuidadosConsulta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-s mt-2 ml-4"><strong>Cuidado</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="CloseModalCuidadoConsulta">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mt-0 mr-4 ml-4 mb-4">
                <form method="POST" action="javascript:ModalGuardarCuidadoConsulta()">
                    @csrf
                    <input type="hidden" class="form-control" id="CuidadoConsultaId" value="">
                    <div class="form-row">
                        <div class="form-group col-md-7 col-lg-7">
                            <label for="CuidadoConsultaDescripcion" class="text-s"><strong>Descripción del cuidado</strong></label>
                            <textarea  required="" class="form-control" rows="4" id="CuidadoConsultaDescripcion" placeholder="Descripción"></textarea>
                        </div>
                        <div class="form-group col-md-5 col-lg-5">
                            <!-- <div class="form-group col-md-12 col-lg-12">
                                <label for="frecuencia" class="text-s"><strong>Fecha Inicio - Fecha Fin</strong></label>
                                <input class="form-control" type="text" id="CuidadoConsultaFechaRango" value="" />
                            </div> -->
                            <div class="form-group col-md-12 col-lg-12 text-right">
                                <button type="submit" class="btn btn-warning" style="margin-top: 28px" onclick=""><strong>Aceptar</strong></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><strong>Aceptar</strong></button>
            </div> -->
        </div>
    </div>
</div>
<!-- END Cuidados Consulta modal -->

<!-- Examen modal -->
<div class="modal fade" id="centeredModalExamenesConsulta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-s mt-2 ml-4"><strong>Examen</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="CloseModalExamenConsulta">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mt-0 mr-4 ml-4 mb-4">
                <form method="POST" action="javascript:ModalGuardarExamenConsulta()">
                    @csrf
                    <input type="hidden" class="form-control" id="ExamenConsultaId" value="">
                    <div class="form-row">
                        <div class="form-group col-md-5 col-lg-5">
                            <label for="ExamenTipoConsulta">Tipo de Examen</label>
                            <select required="" id="ExamenTipoConsulta" class="form-control">
                                <option selected value="">seleccione ... </option>
                                <option value="ácido úrico">ácido úrico</option>
                                <option value="ácido láctico">ácido láctico</option>
                                <option value="adenovirus ">adenovirus </option>
                                <option value="aglutininas">aglutininas</option>
                                <option value="albumina">albumina</option>
                                <option value="alt">alt</option>
                                <option value="aldolasa">aldolasa</option>
                                <option value="aldosterona">aldosterona</option>
                                <option value="afp">afp</option>
                                <option value="amilasa sérica">amilasa sérica</option>
                                <option value="amilasa urinaria ">amilasa urinaria </option>
                                <option value="benzoadiazepina">benzoadiazepina</option>
                                <option value="beta 2">beta 2</option>
                                <option value="bilirrubina">bilirrubina</option>
                                <option value="calcio sérico">calcio sérico</option>
                                <option value="calcio en orina">calcio en orina</option>
                                <option value="colesterol">colesterol</option>
                                <option value="c3 ">c3 </option>
                                <option value="c4">c4</option>
                                <option value="creatinina">creatinina</option>
                                <option value="dengue igg-igm">dengue igg-igm</option>
                                <option value="digoxina">digoxina</option>
                                <option value="drepanocitos">drepanocitos</option>
                                <option value="eosinofilos">eosinofilos</option>
                                <option value="electrolitos">electrolitos</option>
                                <option value="estradiol">estradiol</option>
                                <option value="folato">folato</option>
                                <option value="fosfatasa at">fosfatasa at</option>
                                <option value="fosfatasa ap">fosfatasa ap</option>
                                <option value="fosfatasa">fosfatasa</option>
                                <option value="fosforo">fosforo</option>
                                <option value="fsh">fsh</option>
                                <option value="hcg">hcg</option>
                                <option value="ggt">ggt</option>
                                <option value="gota gruesa">gota gruesa</option>
                                <option value="globulinas ">globulinas </option>
                                <option value="glucosa sérica ">glucosa sérica </option>
                                <option value="helicobacter">helicobacter</option>
                                <option value="hematología completa ">hematología completa </option>
                                <option value="hemocultivo">hemocultivo</option>
                                <option value="herpes simplex">herpes simplex</option>
                                <option value="hierro sérico">hierro sérico</option>
                                <option value="hgh">hgh</option>
                                <option value="acth">acth</option>
                                <option value="hdl colesterol">hdl colesterol</option>
                                <option value="hdl electroforesis">hdl electroforesis</option>
                                <option value="inmunoglobulinas a">inmunoglobulinas a</option>
                                <option value="inmunoglobulinas e">inmunoglobulinas e</option>
                                <option value="inmunoglobulinas g">inmunoglobulinas g</option>
                                <option value="inmunoglobulinas m ">inmunoglobulinas m </option>
                                <option value="insulina basal">insulina basal</option>
                                <option value="ldh">ldh</option>
                                <option value="lh ">lh </option>
                                <option value="lipasa sérica">lipasa sérica</option>
                                <option value="lipasa urinaria">lipasa urinaria</option>
                                <option value="litio">litio</option>
                                <option value="magnesio sérico">magnesio sérico</option>
                                <option value="marcadores hepatitis a-b-c">marcadores hepatitis a-b-c</option>
                                <option value="mioglobina">mioglobina</option>
                                <option value="micoplasma pneumoniae">micoplasma pneumoniae</option>
                                <option value="microalbuminuria">microalbuminuria</option>
                                <option value="monotest">monotest</option>
                                <option value="nitrogeno ureico">nitrogeno ureico</option>
                                <option value="orina">orina</option>
                                <option value="osmolaridad en orina">osmolaridad en orina</option>
                                <option value="osmolaridad en suero">osmolaridad en suero</option>
                                <option value="osteocalcina">osteocalcina</option>
                                <option value="potasio sérico">potasio sérico</option>
                                <option value="progesterona">progesterona</option>
                                <option value="prolactina">prolactina</option>
                                <option value="péptido c">péptido c</option>
                                <option value="proteínas en orina">proteínas en orina</option>
                                <option value="recuento minutado">recuento minutado</option>
                                <option value="renina plasmática">renina plasmática</option>
                                <option value="reticulocitos">reticulocitos</option>
                                <option value="retracción del coagulo">retracción del coagulo</option>
                                <option value="rotavirus">rotavirus</option>
                                <option value="rubéola">rubéola</option>
                                <option value="serología para amibas">serología para amibas</option>
                                <option value="serología para hongos">serología para hongos</option>
                                <option value="serología para leptospira">serología para leptospira</option>
                                <option value="serología para tuberculosis">serología para tuberculosis</option>
                                <option value="serología para plasmodium vivax">serología para plasmodium vivax</option>
                                <option value="serología para plasmodium falciparum">serología para plasmodium falciparum</option>
                                <option value="sodio">sodio</option>
                                <option value="t3 libre">t3 libre</option>
                                <option value="t4 libre">t4 libre</option>
                                <option value="t4 neonatal">t4 neonatal</option>
                                <option value="teofilina">teofilina</option>
                                <option value="toxoplasma gondii">toxoplasma gondii</option>
                                <option value="triglicéridos ">triglicéridos </option>
                                <option value="testosterona">testosterona</option>
                                <option value="tiempo de coagulación tc">tiempo de coagulación tc</option>
                                <option value="tiempo de protombina pt">tiempo de protombina pt</option>
                                <option value="ppt ">ppt </option>
                                <option value="ts">ts</option>
                                <option value="troponina">troponina</option>
                                <option value="urocultivo">urocultivo</option>
                                <option value="vsg">vsg</option>
                                <option value="hiv">hiv</option>
                                <option value="vdrl">vdrl</option>
                                <option value="vldl">vldl</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8 col-lg-8">
                            <label for="ExamenConsultaDescripcion" class="text-s"><strong>Motivo de Solicitud</strong></label>
                            <textarea class="form-control" rows="4" required="" id="ExamenConsultaDescripcion" placeholder="Motivo de la Solicitud ..."></textarea>
                        </div>
                        <div class="form-group col-md-4 col-lg-4 text-right align-self-end">
                            <button type="submit" class="btn btn-warning" style="margin-top: 28px" onclick=""><strong>Aceptar</strong></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><strong>Aceptar</strong></button>
            </div> -->
        </div>
    </div>
</div>
<!-- END Examen modal -->
