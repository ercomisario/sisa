function terminarEgreso(){


	let route='SetDischarge';
	let datos={
	    "clinical_case_id":getD('clinical_case_id'),
	    "doctor_id":getD('DoctorID'),
	    "json_medicamento":JSON_MEDICAMENTO_CONSULTA,
	    "json_cuidado":JSON_CUIDADO_CONSULTA,
	    "json_examen":JSON_EXAMEN_CONSULTA,
	    "tipoEgreso":getOption('tipoEgreso'),
	    "diagnosticoEgreso":getD('diagnosticoEgreso'),
	    "resumenEgreso":getD('resumenEgreso'),
	    "razonEgreso":getD('razonEgreso'),
	    "daterangeJustificativo":getD('daterangeJustificativo'),
	    "descriptionJustificativo":getD('descriptionJustificativo'),
	    
	};
        
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
	    //console.log(datos);
	    controlador(route, datos,'POST',function(data){
	        console.log(data);          
	        window.location='/doctor';

	    });
	  }
	}) 

}

function pintarListaPacienteId(data) {
    // body...
    console.log(data);
    $("#CardPacieteName").empty().html(`<strong>${data.users.name}, ${data.users.last_name}</strong>`);
    $("#CardPacieteEdad").empty().html(`${data.users.edad} años de edad`);
    $("#CardPacieteAvatars").empty().html(`<img src="${asset_global}img/avatars/${data.users.cedula}.jpg" class="rounded-circle mr-2" alt="${data.users.name}" width="45" height="45">`);


    let htmlMedications='';
    let htmlCuidado='';
    let htmlExamen='';
    // if (data.medications.length>0 ) {
    //   for (var i = 0; i < data.medications.length; i++) {      
    //     var arrayFechaInicio = data.medications[i].start_time.split(' ');
    //     var fecha_inicio = arrayFechaInicio[0].trim();
    //     var arrayFechaFin = data.medications[i].end_time.split(' ');
    //     var fecha_fin = arrayFechaFin[0].trim();
    //     htmlMedications +=`
    //         <div class="card shadow card-mb-5 card-border" id="pintarCardMedicamento${data.id}">
    //           <div class="card-body">
    //             <div class="row">
    //               <div class="col-6"><h5 class="card-title mb-0 text-p">${data.medications[i].name}</h5></div>
    //               <div class="col-6"><h5 class="mb-0 text-p">${data.medications[i].dose} mg <span class="ml-3 text-s"> ${data.medications[i].frequency}/d</span></h5></div>
    //               <div class="col-12 padding-0 text-right"><span class="btn-floating float-right text-p">${data.medications[i].administer_route}</span></div>
    //               <div class="col-12 text-right"><span class="btn-floating float-right text-p">${formatdatei(fecha_inicio)} - ${formatdatei(fecha_fin)}</span></div>
    //             </div>
    //           </div>
    //         </div>
    //     `;
    //   }
    // }

    if (data.health_cares.length>0 ) {
      for (var i = 0; i < data.health_cares.length; i++) {      
        htmlCuidado +=`
          <div class="card shadow card-mb-5 card-border" id="pintarCardCuidado${data.health_cares[i].id}">
            <div class="card-body">
                <div class="row">
                    <div class="col-12"><h5 class="card-title mb-0 text-p">${data.health_cares[i].description}</h5></div>
                </div>
            </div>
          </div>
        `;
      }
    }

    if (data.medical_tests.length>0 ) {
      for (var i = 0; i < data.medical_tests.length; i++) {      
        htmlExamen +=`
           <div class="card shadow card-mb-5 card-border" id="pintarCardExamen${data.medical_tests[i].id}">
              <div class="card-body">
                  <div class="row">
                      <div class="col-12"><h5 class="card-title mb-0 text-p">${data.medical_tests[i].test_type}</h5></div>
                      <div class="col-12 text-right"><span class="btn-floating float-right text-p">${data.medical_tests[i].reason}</span></div>
                  </div>
              </div>
          </div>
        `;
      }
    }

	$("#CardPacieteEgreso").empty().append(`
	   <div class="row">
	      <div class="col-sm-12 col-xl-12 col-lg-12">
	        <div class="card-body mt-3 ml-3 ml-3" style="padding: 0.25rem">
				
				<div class="col-12 mb-3">	           	 
	           	 <button class="float-right btn btn-warning" onclick="terminarEgresoNurse('${data.egreso.clinical_case_id}')" style="">Dar egresos</button>
	           	</div>

	           	<div class="col-12">
	           		<h5 class="text-p"><strong>TIPO DE EGRESO</strong></h5>
	           		<div class="">
       		        	${data.egreso.type}       		        	
       		        </div>

	           	</div>

	           	<div class="col-12">
	           		<h5 class="mt-4 text-p"><strong>DIAGNOSTICO FINAL</strong></h5>
	           		<div class="">
       		        	${data.egreso.final_diagnostic}
       		        </div>

	           	</div>

	           	<div class="col-12">
	           		<h5 class="mt-4 text-p"><strong>RESUMEN DEL CASO</strong></h5>
	           		<div class="">
       		        	${data.egreso.summary}
       		        </div>

	           	</div>

				  <h5 class="ml-3 mt-4 text-p" style=""><strong>ORDENES MÉDICAS</strong></h5>
                  <div class="form-row list-diary-ordenes">
                   <div class="form-group col-4 mt-2">
                     <h5 class="ml-3 text-s" style="padding-right: 12px"><strong>Medicamentos</strong> </h5>
                     <br>
                     <div id="DomOrderMedicationCard">
                        ${htmlMedications}
                     </div>
                   </div>
                   <div class="form-group col-4 mt-4">
                     <h5 class="ml-3 text-s" style="padding-right: 12px"><strong>Cuidados</strong></h5>
                     <br>
                     <div id="DomOrderCuidadoCard">
                        ${htmlCuidado}
                     </div>

                    </div>   

                    <div class="form-group col-4 mt-4">
                    <h5 class="ml-3 text-s" style="padding-right: 12px"><strong>Examenes</strong></h5>

                     <br>
                     <div id="DomOrderExamenCard">
                        ${htmlExamen}
                     </div>

                  </div>    

                </div> 


                <!--
	           	<div class="col-12 mb-5">
	           		<h5 class="text-p" style=""><strong>JUSTIFICATIVO MÉDICO</strong></h5>
		            
		              <h5 class="text-s " style=""><strong>Tiempo del Justificativo Médico</strong></h5>
		              TIEMPO

		              <h5 class=" mt-3 text-s " style=""><strong>Descripción del Justificativo Médico</strong></h5>
		              Descripción del justificativo ...
	           	</div>
	           	-->




	        </div>
	      </div>
	  </div>
	`);
   

}

function pintarListaPaciente(data) {
    // body...

    for (var i = 0; i < data.length; i++) {
      $("#DomListadoPaciente").append(`
          <a href="javascript:;" onclick="cargarEgresoId('${data[i].clinical_case_id}','${data[i].person_id}')" id="pintarListaPaciente${data[i].person_id}">
            <div class="row mb-3 " style=""> 
              <div class="col-12" style="border-left: 6px solid #ff9d00; border-radius: 5px; background-color: #fff">
                <div class="media padding-superior-10" style="">
                  <img src="${asset_global}img/avatars/${data[i].cedula}.jpg" class="rounded-circle mr-2" alt="${data[i].name}" width="45" height="45">
                  <div class="media-body ml-3">                  
                    <span class="text-p" style=""><strong>${data[i].name}, ${data[i].last_name}</strong></span><br>
                    <span class="text-p" style=""> ${data[i].edad} años de edad</span>
                  </div>
                </div>  
              </div>
            </div>              
          </a>
      `);        
    }
}




function cargarEgresoId(clinical_case_id,person_id) {
  // body...
  setD('CardPacieteCasoClinico','');
  setD('CardPacieteCasoClinico',clinical_case_id);

  let route='GetListadoPacienteEgresoId';
  let datos = {
    "clinical_case_id":clinical_case_id,
    "person_id":person_id   
  }
  controlador(route, datos,'GET',function(data){
      pintarListaPacienteId(data);
  });
}


function terminarEgresoNurse(clinical_case_id){

  let nurse_id = getD('CardPacieteIdEnf');
	let route='NurseDischargeOrder';

	let datos={
	    "clinical_case_id":clinical_case_id,
      "nurse_id":nurse_id    
	};
	       
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
	    controlador(route, datos,'POST',function(data){
	        window.location='/nurse/patient-discharge';

	    });
	  }
	}) 	
}