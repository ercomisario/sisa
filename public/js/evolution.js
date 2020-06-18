function pintarListaPaciente(data) {
    // body...

    for (var i = 0; i < data.length; i++) {
      $("#DomListadoPaciente").append(`
          <a href="javascript:;" onclick="cargarReporteId('${data[i].clinical_case_id}','${data[i].person_id}')" id="pintarListaPaciente${data[i].person_id}">
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

function cargarReporteId(clinical_case_id,person_id) {
  // body...
  setD('CardPacieteCasoClinico','');
  setD('CardPacieteCasoClinico',clinical_case_id);

  let route='GetListadoPacienteReporteId';
  let datos = {
    "clinical_case_id":clinical_case_id,
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

    $("#CardPacieteReporteHistorico").empty();
    for (var i = 0; i < data.reporte.length; i++) {
      pintarRegEvolucion(data.reporte[i]);
    }

}

function cargarInfoEnfermera() {

  let route='GetDatosEnfermera';
  let datos={
    "id_enfermera": getD('CardPacieteIdEnf')
  };

  controlador(route, datos,'GET',function(data){
      console.log(data);
      $("#CardEnfermeraInfo").empty().html(`<p style="margin: 5px; padding: 5px; ">Enf. ${data.last_name}, ${data.name}<br><strong> ${formatdatei(data.fecha)}  ${data.hora}</strong> </p>`);

  });
}

function gudarRepEnfermeria(){


  let route='setEvolution';
  let datos={
    "descripcion":getD('descripcion'),
    "id_caso_clinico":getD('CardPacieteCasoClinico'),
    "id_enfermera":getD('CardPacieteIdEnf')
  };
  console.log(datos);

  if (getD('CardPacieteCasoClinico') != '' && getD('CardPacieteCasoClinico') != null && getD('CardPacieteCasoClinico') !='undefined'){
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
            pintarRegEvolucion(data);
            cargarInfoEnfermera();
            limpiarInput();
        });
      }
    })
  }else{
     swal({
      type: 'error',
      title: 'Oops...',
      html: 'Seleccione un paciente'
    })
  }

}

function limpiarInput(){
  setD('descripcion',''); 
}
function pintarRegEvolucion(data) {

  $("#CardPacieteReporteHistorico").append(`
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
