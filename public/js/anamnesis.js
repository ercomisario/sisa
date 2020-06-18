

function CheckboxSelection(input,valor) {
    console.log(valor, "valor");
    console.log(input.value, "value");
    console.log(input.checked, "checkbox");
    VALOR_ACTUAL = valor;

    getTextDesc();

    VALOR_ACTUAL = valor;
    var id = input.value;
    var label = '';
    var id_checked = input.checked;



    if (id_checked) {

        if (valor=='NO_IMPORTANTE') {
            for (var i = JSON_VARIABLES.length - 1; i >= 0; i--) {
                if (JSON_VARIABLES[i].id == id) {
                    label = JSON_VARIABLES[i].label;
                    ID_ACTUAL = id;
                }
            }            
        }else{
            for (var i = JSON_VARIABLES_IMPORTANT.length - 1; i >= 0; i--) {
                if (JSON_VARIABLES_IMPORTANT[i].id == id) {
                    label = JSON_VARIABLES_IMPORTANT[i].label;
                    ID_ACTUAL = id;
                }
            }            
        }

        var html = `
				<div class="col-12 mb-3" id="bloqueObservacion${id+valor}">					  
					<div class="row">
							<div class="text-left" style="padding-right: 15px; padding-left: 15px;">
								<div class="shadow" style="border-radius: 10rem; ">
								 	<strong><p style="margin: 10px;" class="text-s" id="TituloObsChecked${id+valor}">${label}</p></strong>
								 </div>
							</div>
								
							<div class="col-12">
								<div class="text-justify" style="">
									<span class="text-s" id="DesObsChecked${id+valor}">
										  
									</span>
								</div>
							</div>
					</div>
				</div>
			`;

        $("#observacionesCheckbox").append(html);
        $("#divTextareaDesc").show();
        $(".list-observations-history").scrollTop($(document).height());

    } else {
        console.log("eliminar seccion del dom");

        $("#bloqueObservacion" + id+valor).remove();
        $("#TextareaCheckboxSelection").val('');
        $("#divTextareaDesc").hide();

        if (valor=='NO_IMPORTANTE') {
            for (var i = JSON_VARIABLES.length - 1; i >= 0; i--) {
                if (JSON_VARIABLES[i].id == id) {
                    JSON_VARIABLES[i].descripcion = '';
                    JSON_VARIABLES[i].checked = '';
                    ID_ACTUAL = '';
                    VALOR_ACTUAL = '';
                    break;
                }
            }
        }else{
            for (var i = JSON_VARIABLES_IMPORTANT.length - 1; i >= 0; i--) {
                if (JSON_VARIABLES_IMPORTANT[i].id == id) {
                    JSON_VARIABLES_IMPORTANT[i].descripcion = '';
                    JSON_VARIABLES_IMPORTANT[i].checked = '';
                    ID_ACTUAL = '';
                    VALOR_ACTUAL = '';
                    break;
                }
            }
        }
        ID_ACTUAL = '';
        VALOR_ACTUAL = '';
    } 
}

function getTextDesc() {
    console.log('getTextDesc',VALOR_ACTUAL);
    let text = $("#TextareaCheckboxSelection").val();
    $("#DesObsChecked" + ID_ACTUAL+VALOR_ACTUAL).text(text);
    $("#TextareaCheckboxSelection").val('');
    $("#divTextareaDesc").hide();

    if (VALOR_ACTUAL=='NO_IMPORTANTE') {        
        for (var i = JSON_VARIABLES.length - 1; i >= 0; i--) {
            if (JSON_VARIABLES[i].id == ID_ACTUAL) {
                JSON_VARIABLES[i].descripcion = text;
                JSON_VARIABLES[i].checked = true;
                break;
            }
        }
    }else{
        for (var i = JSON_VARIABLES_IMPORTANT.length - 1; i >= 0; i--) {
            if (JSON_VARIABLES_IMPORTANT[i].id == ID_ACTUAL) {
                JSON_VARIABLES_IMPORTANT[i].descripcion = text;
                JSON_VARIABLES_IMPORTANT[i].checked = true;
                break;
            }
        }
    }
    ID_ACTUAL = '';
    VALOR_ACTUAL = '';

}


function start(data){
    $("#printAnalysisGroups").empty();
    //pinto los ul necesario printAnalysisGroups para el smartWizard
    //"Análisis Subjetivo"
    for (var i = 0; i < data.analysisTypes[0].analysisGroups.length; i++) {
            $("#printAnalysisGroups").append(`<li style=''><a href='#subjetivo-step-${data.analysisTypes[0].analysisGroups[i].id}'> ${(i+1)}.</a></li>`);

    }

    var htmlItems='';
    var htmlItems1='';
    var htmlItems2='';
    var cantItem=0;
    for (var i = 0; i < data.analysisTypes[0].analysisGroups.length; i ++) {
        for (var j = 0; j < data.analysisTypes[0].analysisGroups[i].itemGroups.length; j ++) {

              var datos = {
                "id": data.analysisTypes[0].analysisGroups[i].itemGroups[j].id,
                "label": data.analysisTypes[0].analysisGroups[i].itemGroups[j].name,
                "descripcion": "",
                "checked":""
            }
            JSON_VARIABLES.push(datos);

            if(cantItem == 0){
                htmlItems+=`
                         <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[0].analysisGroups[i].itemGroups[j].id}" onchange="CheckboxSelection(this,'NO_IMPORTANTE')">
                        <span class="custom-control-label"> ${data.analysisTypes[0].analysisGroups[i].itemGroups[j].name} </span>
                      </label>
                `;
                cantItem++;
            }else if(cantItem == 1){
                htmlItems1+=`
                         <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[0].analysisGroups[i].itemGroups[j].id}" onchange="CheckboxSelection(this,'NO_IMPORTANTE')">
                        <span class="custom-control-label"> ${data.analysisTypes[0].analysisGroups[i].itemGroups[j].name} </span>
                      </label>
                `;
                cantItem++;
            }else if(cantItem == 2){
                htmlItems2+=`
                         <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[0].analysisGroups[i].itemGroups[j].id}" onchange="CheckboxSelection(this,'NO_IMPORTANTE')">
                        <span class="custom-control-label"> ${data.analysisTypes[0].analysisGroups[i].itemGroups[j].name} </span>
                      </label>
                `;
                cantItem++;

            }else{
                cantItem=0;
                htmlItems+=`
                         <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[0].analysisGroups[i].itemGroups[j].id}" onchange="CheckboxSelection(this,'NO_IMPORTANTE')">
                        <span class="custom-control-label"> ${data.analysisTypes[0].analysisGroups[i].itemGroups[j].name} </span>
                      </label>
                `;
                cantItem++;
            }


        }
        cantItem=0;
        for (var j = 0; j < data.analysisTypes[0].analysisGroups[i].itemGroupsImportant.length; j ++) {

              var datos = {
                "id": data.analysisTypes[0].analysisGroups[i].itemGroupsImportant[j].id,
                "label": data.analysisTypes[0].analysisGroups[i].itemGroupsImportant[j].name,
                "descripcion": "",
                "checked":""
            }
            JSON_VARIABLES_IMPORTANT.push(datos);

            if(cantItem == 0){
                htmlItems+=`
                         <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[0].analysisGroups[i].itemGroupsImportant[j].id}" onchange="CheckboxSelection(this,'IMPORTANTE')">
                        <span class="custom-control-label"> ${data.analysisTypes[0].analysisGroups[i].itemGroupsImportant[j].name} </span>
                      </label>
                `;
                cantItem++;
            }else if(cantItem == 1){
                htmlItems1+=`
                         <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[0].analysisGroups[i].itemGroupsImportant[j].id}" onchange="CheckboxSelection(this,'IMPORTANTE')">
                        <span class="custom-control-label"> ${data.analysisTypes[0].analysisGroups[i].itemGroupsImportant[j].name} </span>
                      </label>
                `;
                cantItem++;
            }else if(cantItem == 2){
                htmlItems2+=`
                         <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[0].analysisGroups[i].itemGroupsImportant[j].id}" onchange="CheckboxSelection(this,'IMPORTANTE')">
                        <span class="custom-control-label"> ${data.analysisTypes[0].analysisGroups[i].itemGroupsImportant[j].name} </span>
                      </label>
                `;
                cantItem++;

            }else{
                cantItem=0;
                htmlItems+=`
                         <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[0].analysisGroups[i].itemGroupsImportant[j].id}" onchange="CheckboxSelection(this,'IMPORTANTE')">
                        <span class="custom-control-label"> ${data.analysisTypes[0].analysisGroups[i].itemGroupsImportant[j].name} </span>
                      </label>
                `;
                cantItem++;
            }


        }
                

        $("#printItemGroups").append(`
            <div id="subjetivo-step-${data.analysisTypes[0].analysisGroups[i].id}" class="">
                <h4 class="text-center text-s"> ${(i+1)}. ${data.analysisTypes[0].analysisGroups[i].name}</h4>

                <div class="row">
                  <div class="col">
                        ${htmlItems}
                    </div>
                    <div class="col">
                        ${htmlItems1}
                    </div>
                    <div class="col">
                        ${htmlItems2}
                    </div>

                </div>

            </div>
        `);
        htmlItems='';
        htmlItems1='';
        htmlItems2='';

    }
    
    //"Análisis Objetivo"
    for (var i = 0; i < data.analysisTypes[1].analysisGroups.length; i++) {

            $("#printAnalysisGroups").append(`<li style=''><a href='#subjetivo-step-${data.analysisTypes[1].analysisGroups[i].id}'> ${(i+1)}</a></li>`);

    }

    var htmlItems='';
    var htmlItems1='';
    var htmlItems2='';
    var cantItem=0;

    for (var i = 0; i < data.analysisTypes[1].analysisGroups.length; i ++) {
        for (var j = 0; j < data.analysisTypes[1].analysisGroups[i].itemGroups.length; j ++) {

                var datos = {
                "id": data.analysisTypes[1].analysisGroups[i].itemGroups[j].id,
                "label": data.analysisTypes[1].analysisGroups[i].itemGroups[j].name,
                "descripcion": "",
                "checked":""
            }
            JSON_VARIABLES.push(datos);

                if(cantItem == 0){
                    htmlItems+=`
                             <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[1].analysisGroups[i].itemGroups[j].id}" onchange="CheckboxSelection(this,'NO_IMPORTANTE')">
                            <span class="custom-control-label"> ${data.analysisTypes[1].analysisGroups[i].itemGroups[j].name} </span>
                          </label>
                    `;
                    cantItem++;
                }else if(cantItem == 1){
                    htmlItems1+=`
                             <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[1].analysisGroups[i].itemGroups[j].id}" onchange="CheckboxSelection(this,'NO_IMPORTANTE')">
                            <span class="custom-control-label"> ${data.analysisTypes[1].analysisGroups[i].itemGroups[j].name} </span>
                          </label>
                    `;
                    cantItem++;
                }else if(cantItem == 2){
                    htmlItems2+=`
                             <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[1].analysisGroups[i].itemGroups[j].id}" onchange="CheckboxSelection(this,'NO_IMPORTANTE')">
                            <span class="custom-control-label"> ${data.analysisTypes[1].analysisGroups[i].itemGroups[j].name} </span>
                          </label>
                    `;
                    cantItem++;

                }else{
                    cantItem=0;
                    htmlItems+=`
                             <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[1].analysisGroups[i].itemGroups[j].id}" onchange="CheckboxSelection(this,'NO_IMPORTANTE')">
                            <span class="custom-control-label"> ${data.analysisTypes[1].analysisGroups[i].itemGroups[j].name} </span>
                          </label>
                    `;
                    cantItem++;
                }


        }

        for (var j = 0; j < data.analysisTypes[1].analysisGroups[i].itemGroupsImportant.length; j ++) {

                var datos = {
                "id": data.analysisTypes[1].analysisGroups[i].itemGroupsImportant[j].id,
                "label": data.analysisTypes[1].analysisGroups[i].itemGroupsImportant[j].name,
                "descripcion": "",
                "checked":""
            }
            JSON_VARIABLES_IMPORTANT.push(datos);

                if(cantItem == 0){
                    htmlItems+=`
                             <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[1].analysisGroups[i].itemGroupsImportant[j].id}" onchange="CheckboxSelection(this,'IMPORTANTE')">
                            <span class="custom-control-label"> ${data.analysisTypes[1].analysisGroups[i].itemGroupsImportant[j].name} </span>
                          </label>
                    `;
                    cantItem++;
                }else if(cantItem == 1){
                    htmlItems1+=`
                             <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[1].analysisGroups[i].itemGroupsImportant[j].id}" onchange="CheckboxSelection(this,'IMPORTANTE')">
                            <span class="custom-control-label"> ${data.analysisTypes[1].analysisGroups[i].itemGroupsImportant[j].name} </span>
                          </label>
                    `;
                    cantItem++;
                }else if(cantItem == 2){
                    htmlItems2+=`
                             <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[1].analysisGroups[i].itemGroupsImportant[j].id}" onchange="CheckboxSelection(this,'IMPORTANTE')">
                            <span class="custom-control-label"> ${data.analysisTypes[1].analysisGroups[i].itemGroupsImportant[j].name} </span>
                          </label>
                    `;
                    cantItem++;

                }else{
                    cantItem=0;
                    htmlItems+=`
                             <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="${data.analysisTypes[1].analysisGroups[i].itemGroupsImportant[j].id}" onchange="CheckboxSelection(this,'IMPORTANTE')">
                            <span class="custom-control-label"> ${data.analysisTypes[1].analysisGroups[i].itemGroupsImportant[j].name} </span>
                          </label>
                    `;
                    cantItem++;
                }


        }


                

        $("#printItemGroups").append(`
            <div id="subjetivo-step-${data.analysisTypes[1].analysisGroups[i].id}" class="">
                <h4 class="text-center text-s"> ${(i+1)}. ${data.analysisTypes[1].analysisGroups[i].name}</h4>

                <div class="row">
                  <div class="col">
                        ${htmlItems}
                    </div>
                    <div class="col">
                        ${htmlItems1}
                    </div>
                    <div class="col">
                        ${htmlItems2}
                    </div>

                </div>

            </div>
        `);
        htmlItems='';
        htmlItems1='';
        htmlItems2='';

    }
}


function terminar() {
    
    swal({
    title: 'CONFIRMACIÓN',
    text: "¿Seguro que desea enviar este formulario?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#ff9d00',
    cancelButtonColor: '#828282',
    confirmButtonText: 'Si, seguro!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.value) {
        let clinical_case_id = getD('clinical_case_id');
        
        let route='SetItemsAnamnesis';
        let datos={
            "json":JSON_VARIABLES,
            "json_important":JSON_VARIABLES_IMPORTANT,
            "clinical_case_id":clinical_case_id,
        };

        controlador(route, datos,'POST',function(data){
            console.log(data);
        });

        $("#DomAnamnesis").empty().load("/medical_order_anamnesis", function(){
            console.log('Vista Completa');
            $("#DoctorAgenda").removeClass('none');
            $("#TitleAnalisisObjetivo").removeClass('text-p');
            $("#TitleAnalisisObjetivo").addClass('text-s');

            $("#TitleOrdenes").removeClass('text-s');
            $("#TitleOrdenes").addClass('text-p');

            $(".progress-bar").css("width",'100%');
            // $(".progress-bar-text").empty().text(porsentaje);
            

            // Daterangepicker
            $("#MedicamentoFechaRango").daterangepicker({
                opens: "center",
                locale: {
                  format: 'DD/MM/YYYY'
                }
            });

            let route='GetOrdenesMedicas';
            let datos={"id":clinical_case_id};

            controlador(route, datos,'POST',function(data){
                console.log(data);
            });

        });
    }
  })

}

function shwoNavegacion(){
    if($("#printAnalysisGroups").is(":visible") == false){
        $("#printAnalysisGroups").show();
    }else{
        $("#printAnalysisGroups").hide();
    }
}


/*
      3 -> 100 = 33,33
*/