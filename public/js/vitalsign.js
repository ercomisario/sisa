function pintarListaPaciente(data) {
    // body...

    for (var i = 0; i < data.length; i++) {
      $("#DomListadoPaciente").append(`
          <a href="javascript:;" onclick="cargarSignosVitalesId('${data[i].clinical_case_id}','${data[i].person_id}')" id="pintarListaPaciente${data[i].person_id}">
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

function cargarSignosVitalesId(clinical_case_id,person_id){

  setD('CardPacieteCasoClinico','');
  setD('CardPacieteCasoClinico',clinical_case_id);

  let route='GetListadoPacienteId';
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
    cargarInfoRegSignVital();
    $("#CardPacieteName").empty().html(`<strong>${data.users.name}, ${data.users.last_name}</strong>`);
    $("#CardPacieteEdad").empty().html(`${data.users.edad} años de edad`);
    $("#CardPacieteAvatars").empty().html(`<img src="${asset_global}img/avatars/${data.users.cedula}.jpg" class="rounded-circle mr-2" alt="${data.users.name}" width="45" height="45">`);

    $("#CardPacieteVitalSign").empty();
    for (var i = 0; i < data.vitalsign.length; i++) {
      pintarRegVitalSign(data.vitalsign[i]);
    }
}


function cargarInfoRegSignVital() {

  let route='GetDatosEnfermera';
  let datos={
    "id_enfermera": getD('CardPacieteIdEnf')
  };

  controlador(route, datos,'GET',function(data){
      console.log(data);
      $("#CardPacieteInfo").empty().html(`<strong> ${formatdatei(data.fecha)} </strong> <br> ${data.hora} <br> Enf. ${data.last_name}, ${data.name} `);
  });
}

function guardarVitalSign(){

  let route='setVitalSign';
  let datos={
    "temp":getD('InputTemp'),
    "pulso":getD('InputPulso'),
    "resp":getD('InputResp'),
    "max":getD('InputTAmax'),
    "min":getD('InputTAmin'),
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
            pintarRegVitalSign(data);
            cargarInfoRegSignVital();
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

function pintarRegVitalSign(data) {

  $("#CardPacieteVitalSign").append(`
      <div class="row no-gutters">
          <div class="col-3 align-self-center">
            <p style="" class="text-center text-p"><strong> ${formatdatei(data.fecha)} </strong> <br> ${data.hora} <br> Enf. ${data.last_name}, ${data.name} </p>
          </div>
          <div class="col-2 text-center align-self-center"><span class="text-p">${data.temperatura}</span></div>
          <div class="col-2 text-center align-self-center"><span class="text-p">${data.pulse}</span></div>
          <div class="col-2 text-center align-self-center"><span class="text-p">${data.respiratory_rate}</span></div>
          <div class="col-3 text-center align-self-center"><span class="text-p">${data.max_t}/${data.min_t}</span></div>
          <div class="col-12"> <hr> </div>
      </div>
  `);

  $(".list-date-vital-sign").scrollTop($(document).height());
  

}

function limpiarInput() {

  // body...
  setD('InputTemp','');
  setD('InputPulso','');
  setD('InputResp','');
  setD('InputTAmax','');
  setD('InputTAmin','');

}