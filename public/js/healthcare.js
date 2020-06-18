function pintarListaPaciente(data) {
    // body...

    for (var i = 0; i < data.length; i++) {
      $("#DomListadoPaciente").append(`
          <a href="javascript:;" onclick="cargarCuidadosId('${data[i].health_care_id}','${data[i].person_id}')" id="pintarListaPaciente${data[i].person_id}">
              <div class="row mb-3 " style=""> 
                  <div class="col-4 ">
                      <div style="" class="border-dashed text-center">
                          <span class="text-s">${data[i].hora}</span>
                      </div>
                  </div>
                   <div class="col-8" style="border-left: 6px solid #62d137; border-radius: 5px; background-color: #fff">
                     <div class="media padding-superior-10" style="">
                          <div class="row">
                                <div class="col-12"><h5 class="card-title mb-0 text-p">${data[i].last_name}, ${data[i].name}</h5></div>
                              <div class="col-12">
                                  <h5 class="card-title mb-0 text-p">${ data[i].description.length>20?data[i].description.substr(0,20)+" ...":data[i].description}</h5>
                              </div>
                                  <div class="col-12">
                                  <span class=" text-p">${formatdatei(data[i].fecha)} - ${data[i].hora}</span>
                              </div>
                              <div class="col-12 text-right">
                                  <h5 class="mb-0 text-p">Dr. ${data[i].doctor_name}</h5>
                              </div>
                          </div>
                      </div>  
                  </div>
              </div>
          </a>
      `);        
    }
}

function cargarCuidadosId(health_care_id,person_id){

  setD('CardPacieteHealthCare','');
  setD('CardPacieteHealthCare',health_care_id);

  let route='GetListadoPacienteCuidadoId';
  let datos = {
    "health_care_id":health_care_id,
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

    $("#CardPacieteAvatars").empty().append(`<img src="${asset_global}img/avatars/${data.users.cedula}.jpg" class="rounded-circle mr-2" alt="${data.users.name}" width="45" height="45">`);
      

    $("#CardPacieteCuidadoDescID").empty().html(`
        <div class="col-12">
          <div class="media d-block d-md-flex">
              <div class="shadow card text-center text-p" style="border-radius: 1rem"><p style="margin: 7px; padding: 7px; "><strong>Descripción</strong> </p></div>
              <div class="media-body text-center text-md-left ml-md-3 ml-0">
                ${data.healthcaresID.description}
              </div>
            </div>
        </div>
        <div class="col-12"> <hr> </div>
    `);
    $("#CardPacieteCuidadoHistorico").empty();
    for (var i = 0; i < data.healthcaresReg.length; i++) {
      pintarReghealthcares(data.healthcaresReg[i]);
    }
}

function pintarReghealthcares(data) {

  $("#CardPacieteCuidadoHistorico").append(`
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


function guardarHealthCare(){

  let route='setHealthCare';
  let datos={
    "observation":getD("descripcion"),
    "aplicado":getOption("aplicadoCuidado"),
    "nurse_id":getD("CardPacieteIdEnf"),
    "health_care_id":getD("CardPacieteHealthCare")
  };
  console.log(datos);

  if (getD('CardPacieteHealthCare') != '' && getD('CardPacieteHealthCare') != null && getD('CardPacieteHealthCare') !='undefined'){
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
          pintarReghealthcares(data);
          limpiarInput();
        });
      }
    })
  }else{
     swal({
      type: 'error',
      title: 'Oops...',
      html: 'Seleccione un cuidado'
    })
  }
}



function limpiarInput() {

  // body...
  setD('descripcion','');
  setOption('aplicadoCuidado','');

}