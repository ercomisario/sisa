function pintarListaPaciente(data) {
    // body...

    for (var i = 0; i < data.length; i++) {
      $("#DomListadoPaciente").append(`
          <a href="javascript:;" onclick="cargarMedicamentoId('${data[i].medication_id}','${data[i].person_id}')" id="pintarListaPaciente${data[i].person_id}">
              <div class="row mb-3 " style=""> 
                  <div class="col-4 ">
                    <div style="" class="border-dashed text-center">
                        <span class="text-s">${data[i].hora}</span>
                    </div>
                    </div>
                    <div class="col-8" style="border-left: 6px solid #fc3f5a; border-radius: 5px; background-color: #fff">
                    <div class="media padding-superior-10" style="">
                        <div class="row">
                            <div class="col-12"><h5 class="card-title mb-0 text-p">${data[i].last_name}, ${data[i].name}</h5></div>
                            <div class="col-6"><h5 class="card-title mb-0 text-p">${data[i].medicamento}</h5></div>
                            <div class="col-6"><h5 class="mb-0 text-p">${data[i].frecuencia} mg <span class="ml-3 text-s"> ${data[i].dosis}/d</span></h5></div>
                            <div class="col-12 text-right"><span class=" text-p">${formatdatei(data[i].fecha_inicio)} - ${formatdatei(data[i].fecha_fin)}</span></div>
                            <div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr ${data[i].doctor_name}</h5></div>
                        </div>
                    </div>  
                  </div>
              </div>
          </a>
      `);        
    }
}

function cargarMedicamentoId(medication_id,person_id){

  setD('CardPacieteMedicamento','');
  setD('CardPacieteMedicamento',medication_id);

  let route='GetListadoPacienteMedicamentoId';
  let datos = {
    "medication_id":medication_id,
    "person_id":person_id   
  }
  controlador(route, datos,'GET',function(data){
      console.log(data);
      pintarListaPacienteId(data);
  });

}

function pintarListaPacienteId(data) {
    // body...
    $("#CardPacieteName").empty().html(`<strong>${data.users.name}, ${data.users.last_name}</strong>`);
    $("#CardPacieteEdad").empty().html(`${data.users.edad} años de edad`);
    $("#CardPacieteAvatars").empty().html(`<img src="${asset_global}img/avatars/${data.users.cedula}.jpg" class="rounded-circle mr-2" alt="${data.users.name}" width="45" height="45">`);

    $("#CardPacieteMedicamentoDescID").empty().html(`
        <div class="col-12">
          <div class="col-6"><h5 class="card-title mb-0 text-p">${data.medicationID.medicamento} - Hora ${data.medicationID.hora}</h5></div>
          <div class="col-6"><h5 class="mb-0 text-p">${data.medicationID.frecuencia} mg - <span class="ml-3 text-s">${data.medicationID.dosis}/d</span></h5></div>
            <div class="row no-gutters">
              <div class="col-8"><span class="ml-3 text-p">Vía de administración: ${data.medicationID.administer_route}</span></div>
              <div class="col-4 text-right"><span class=" text-p">Fecha Inicio - Fecha Fin</span></div>
            </div>
           <div class="col-12 text-right"><span class=" text-p">${formatdatei(data.medicationID.fecha_inicio)} - ${formatdatei(data.medicationID.fecha_fin)}</span></div>
          <div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr ${data.medicationID.last_name},${data.medicationID.name}</h5></div>
        </div>
        <div class="col-12"> <hr> </div>
    `);


    $("#CardPacieteMedicamentoHistorico").empty();
    for (var i = 0; i < data.medicationReg.length; i++) {
      pintarRegMedicamento(data.medicationReg[i]);
    }
}

function pintarRegMedicamento(data) {

  $("#CardPacieteMedicamentoHistorico").append(`
     <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
          <div class="card-body" style="padding: 0.25rem">
             <div class="media d-block d-md-flex">
                <div class="card shadow text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; "> ${formatdatei(data.fecha)} <br> ${data.hora} <br> Enf. ${data.last_name}, ${data.name}</p></div>
                <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
                  ${data.observation}
                </div>
              </div>
          </div>
        </div>
    </div>
  `);

  $(".list-date-health-care").scrollTop($(document).height());
}


function guardarMedicamento(){

  let route='setMedication';
  let datos={
    "observation":getD("descripcion"),
    "aplicado":getOption("aplicadoMedicamento"),
    "nurse_id":getD("CardPacieteIdEnf"),
    "medication_id":getD("CardPacieteMedicamento")
  };
  console.log(datos);

  if (getD('CardPacieteMedicamento') != '' && getD('CardPacieteMedicamento') != null && getD('CardPacieteMedicamento') !='undefined'){
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
            console.log(data);
            pintarRegMedicamento(data);
            limpiarInput();
        });
      }
    })
  }else{
     swal({
      type: 'error',
      title: 'Oops...',
      html: 'Seleccione un medicamento'
    })
  }
}



function limpiarInput() {

  // body...
  setD('descripcion','');
  setOption('aplicadoMedicamento','');

}