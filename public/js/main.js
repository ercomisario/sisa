$(document).ready(function () {
    // $(".list-observations-history").niceScroll();  // The document page (body) 

})

function controlador(route, datos, metodo,callback){

  console.log($('meta[name="csrf-token"]').attr('content'));

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
    data: {
      "datos": datos
    },
    type: metodo,
    dataType: "json",
    async: true,
    //mimeType: "multipart/form-data",
    url: "/"+route
  })
  .done(function(respuesta) {
    if (respuesta) {
      typeof callback === 'function' && callback(respuesta);
    } else {
      console.log(respuesta.error);
    }
  })
  .fail(function(jqXHR, textStatus) {
    // console.log("responseJSON",jqXHR.responseJSON);
    console.log("responseText",jqXHR.responseText);   
  });
}

//FUNCION PARA OBTENER EL VALOR MANDANDOLE UN STRING CON EL NOMBRE DEL ID
function getD(id){
  if($('#'+id).length>0){
    return $('#'+id).val();
  } else {
    console.log("getD: ERROR, NO SE ENCONTRO EL OBJETO: "+id);
  }
  return null;
}

//FUNCION PARA SETIAR EL VALOR MANDANDOLE UN STRING CON EL NOMBRE DEL ID Y EL VALOR ASIGNAR
function setD(id,valor){
  if($('#'+id).length>0){
    return $('#'+id).val(valor);
  } else {
    console.log("setD: ERROR, NO SE ENCONTRO EL OBJETO: "+id);
  }
  return null;
}

//FUNCION PARA SETIAR EL VALOR MANDANDOLE UN STRING CON EL NAME DEL INPU TIPO RADION
function setOption(nombre,valor){
  set_Option_value(nombre, valor);
}

function set_Option_value(name, value) {
  if(name == undefined || name == null || name == '') {
    console.log('Option buttons name: ['+name+'] no encontrado, verifique...');
    return null;
  }
  if(value == undefined || value == null) {
    console.log('Option buttons name: ['+name+'] valor no recibido, verifique...');
    return null;
  }
 
  var selected = $("input[type='radio'][name='"+name+"'][value='"+value+"']");

  if (selected.length > 0) {
    return selected.prop('checked', true);
  }
  return false;
}

//FUNCION PARA OBTENER EL VALOR MANDANDOLE EL NAME DEL INPU TIPO RADION
function getOption(nombre){

  return get_Option_value(nombre);
}

function get_Option_value(name, cont) {
  if(name == undefined || name == null || name == '') {
    console.log('Option buttons name: ['+name+'] no encontrado, verifique...');
    return null;
  }
 
  var selectedVal = "";
  var selected = $("input[type='radio'][name='"+name+"']:checked");
  if (selected.length > 0) {
      selectedVal = selected.val();
  }
  return selectedVal;
}

//FUNCION PARA CONVERTIR LA FECHA DE DD/MM/YYYY -> YYY-MM-DD
function formatdate(fecha){
  let date=fecha.split("/");
  let result=date[2]+'-'+date[1]+'-'+date[0]; 
  return result;
}

//FUNCION PARA CONVERTIR LA FECHA DE YYY-MM-DD -> DD/MM/YYYY -
function formatdatei(fecha){
  let date=fecha.split("-");
  let result=date[2]+'/'+date[1]+'/'+date[0]; 
  return result;
}

//

function confirmacion(titulo,callback){
  
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
      success();
    }
  })

}

function ModalGuardarMedicamento(){
  
  let MedicamentoCompuesto = getD('MedicamentoCompuesto');
  let MedicamentoDosis = getD('MedicamentoDosis');
  let MedicamentoFrecuencia = getD('MedicamentoFrecuencia');
  let MedicamentoFechaRango = getD('MedicamentoFechaRango');
  let MedicamentoId = getD('MedicamentoId');
  let MedicamentoObservacion = getD('MedicamentoObservacion');
  let MedicamentoPresentation_Id = getD('MedicamentoPresentation_Id');
  let clinical_case_id = getD('clinical_case_id');
  let doctor_id = getD('doctor_id');
  
  let arrayFecha = MedicamentoFechaRango.split('-');
  let fecha_inicio = formatdate(arrayFecha[0].trim());
  let fecha_fin = formatdate(arrayFecha[1].trim());

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

      if(MedicamentoId != '' && MedicamentoId != null && MedicamentoId != 'undefined'){

        let route='UpdateOrdenMedicamento';
        let datos={
          "id":MedicamentoId,
          "presentation_Id":MedicamentoPresentation_Id,
          "compuesto":MedicamentoCompuesto,
          "observacion":MedicamentoObservacion,
          "dosis":MedicamentoDosis,
          "frecuencia":MedicamentoFrecuencia,
          "fecha_inicio":fecha_inicio,
          "fecha_fin":fecha_fin,
          "clinical_case_id":clinical_case_id,
          "doctor_id":doctor_id
        };

        controlador(route, datos,'POST',function(data){
            console.log(data);
            data = data[0];
            
            borrarCardMedicamento(data.id);
            

            $("#DomOrderMedicationCard").append(`
                 <div class="card shadow card-mb-5 card-border" id="pintarCardMedicamento${data.id}">
                   <div class="card-body">
                     <div class="row">
                       <div class="col-6"><h5 class="card-title mb-0 text-p">${data.compuesto}</h5></div>
                       <div class="col-6 text-right"><span class="" onclick="deleteCardMedicamento('${data.id}');" style="margin-right: 15px;"><i class="align-middle far fa-fw fa-trash-alt"></i></span><span class="" onclick="editCardMedicamento('${data.id}');" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
                       <div class="col-6"><h5 class="mb-0 text-p">${data.dose} mg <span class="ml-3 text-s"> ${data.frequency}/d</span></h5></div>
                       <div class="col-12 padding-0 text-right"><span class="btn-floating float-right text-p">${data.observacion}</span></div>
                       <div class="col-12 text-right"><span class="btn-floating float-right text-p">${formatdatei(fecha_inicio)} - ${formatdatei(fecha_fin)}</span></div>
                       <div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr ${data.last_name}</h5></div>
                     </div>
                   </div>
                 </div>
             `);

        });

      }else{
        let route='SetOrdenMedicamento';
        let datos={
          "presentation_Id":MedicamentoPresentation_Id,
          "compuesto":MedicamentoCompuesto,
          "observacion":MedicamentoObservacion,
          "dosis":MedicamentoDosis,
          "frecuencia":MedicamentoFrecuencia,
          "fecha_inicio":fecha_inicio,
          "fecha_fin":fecha_fin,
          "clinical_case_id":clinical_case_id,
          "doctor_id":doctor_id
        };
        console.log(datos);
        controlador(route, datos,'POST',function(data){
            console.log(data);
            pintarCardMedicamento(data);
        });
      }
      
      limpiarModalOrdenMedicameto();
      $('#CloseModalMedicamentos').click();
    }else{
      limpiarModalOrdenMedicameto();
      $('#CloseModalMedicamentos').click();
    }
  })
  
}

function limpiarModalOrdenMedicameto() {
  setD('MedicamentoCompuesto','');
  setD('MedicamentoDosis','');
  setD('MedicamentoFrecuencia','');
  setD('MedicamentoFechaRango','');
  setD('MedicamentoId','');
  setD('MedicamentoAdministerRoute','');
}

function pintarCardMedicamento(data) {  

 $("#DomOrderMedicationCard").append(`
      <div class="card shadow card-mb-5 card-border" id="pintarCardMedicamento${data.id}">
        <div class="card-body">
          <div class="row">
            <div class="col-6"><h5 class="card-title mb-0 text-p">${data.compuesto}</h5></div>
            <div class="col-6 text-right"><span class="" onclick="editCardMedicamento('${data.id}');" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
            <div class="col-6"><h5 class="mb-0 text-p">${data.dosis} mg <span class="ml-3 text-s"> ${data.frecuencia}/d</span></h5></div>
            <div class="col-12 padding-0 text-right"><span class="btn-floating float-right text-p">${data.administer_route}</span></div>
            <div class="col-12 text-right"><span class="btn-floating float-right text-p">${formatdatei(data.fecha_inicio)} - ${formatdatei(data.fecha_fin)}</span></div>
            <div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr ${data.nombre_doctor}</h5></div>
          </div>
        </div>
      </div>
  `);

}

function borrarCardMedicamento(id) {
  $("#pintarCardMedicamento" + id).remove();
}

function editCardMedicamento(id) {

  let route='GeteditCardMedicamentoId';
  let datos={
    "id":id
  };

  controlador(route, datos,'GET',function(data){
      console.log(data);
      var medications = data.medications;
      var users = data.users;

      limpiarModalOrdenMedicameto();
      let MedicamentoFechaRango = formatdatei(medications.fecha_inicio)+" - "+formatdatei(medications.fecha_fin);
       setD('MedicamentoId',id);
       setD('MedicamentoCompuesto',medications.compuesto);
       setD('MedicamentoDosis',medications.dosis);
       setD('MedicamentoFrecuencia',medications.frecuencia);
       setD('MedicamentoFechaRango',MedicamentoFechaRango);
       setD('MedicamentoAdministerRoute',medications.administer_route);
       
       $('#MedicamentoPresentation_Id').val(medications.presentation_id);
       $('#Unidad').text(medications.unit_measurement);
       $('#Descripcion').text(medications.description);
       $('#Indicaciones').text(medications.indication);
       $('#Contraindicaciones').text(medications.contraindication);
       $('#TipoPresentacion').text(medications.presentationType);
       $('#AdministerRoute').text(medications.administerRoute);   


       let html='';
       $("#centeredModalMedicamentosAlergias").empty();
       $("#centeredModalMedicamentosEnfermdadBase").empty();
       for (var i = 0; i < users.length; i++) {
         if(users[i].name == 'Alergia'){          
           
           html = users[i].description;
           $("#centeredModalMedicamentosAlergias").append(html);
         }else{
           html = users[i].name +' : '+users[i].description+'<br>';
           $("#centeredModalMedicamentosEnfermdadBase").append(html);
         }

       }

      $('#ClickModalMedicamentos').click();
  });

}

function ModalGuardarCuidado(){
  
  let CuidadoId = getD('CuidadoId');
  let CuidadoDescripcion = getD('CuidadoDescripcion');
  // let CuidadoFechaRango = getD('CuidadoFechaRango');
  let clinical_case_id = getD('clinical_case_id');
  let doctor_id = getD('doctor_id');

  // let arrayFecha = CuidadoFechaRango.split('-');
  // let fecha_inicio = formatdate(arrayFecha[0].trim());
  // let fecha_fin = formatdate(arrayFecha[1].trim());

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

      if(CuidadoId != '' && CuidadoId != null && CuidadoId != 'undefined'){

        let route='UpdateOrdenCuidado';
        let datos={
          "id":CuidadoId,
          "descripcion":CuidadoDescripcion,
          // "fecha_inicio":fecha_inicio,
          // "fecha_fin":fecha_fin,
          "clinical_case_id":clinical_case_id,
          "doctor_id":doctor_id
        };

        controlador(route, datos,'POST',function(data){
            console.log(data);
            borrarCardCuidado(data.id);
            pintarCardCuidado(data);
        });

      }else{
        let route='SetOrdenCuidado';
        let datos={
          "descripcion":CuidadoDescripcion,
          // "fecha_inicio":fecha_inicio,
          // "fecha_fin":fecha_fin,
          "clinical_case_id":clinical_case_id,
          "doctor_id":doctor_id
        };
        console.log(datos);
        controlador(route, datos,'POST',function(data){
            console.log(data);
            pintarCardCuidado(data);
        });
      }
      
      limpiarModalOrdenCuidado();
      $('#CloseModalCuidados').click();
    }else{
      limpiarModalOrdenCuidado();
      $('#CloseModalCuidados').click();
    }
  })
  
}

function borrarCardCuidado(id){
  $("#pintarCardCuidado" + id).remove();
}

function pintarCardCuidado(data){

  $("#DomOrderCuidadoCard").append(`
    <div class="card shadow card-mb-5 card-border" id="pintarCardCuidado${data.id}">
        <div class="card-body">
            <div class="row">
                <div class="col-6"><h5 class="card-title mb-0 text-p">${data.descripcion}</h5></div>
                <div class="col-6 text-right"><span class="" onclick="deleteCardCuidado('${data.id}');" style="margin-right: 15px;"><i class="align-middle far fa-fw fa-trash-alt"></i></span><span class=""  onclick="editCardCuidado('${data.id}');" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
                <!-- <div class="col-12 text-right"><span class="btn-floating float-right text-p">Inicio - Fin</span></div> -->
                <div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr ${data.nombre_doctor}</h5></div>
            </div>
        </div>
    </div>`);
}

function limpiarModalOrdenCuidado() {
  setD('CuidadoId','');
  setD('CuidadoDescripcion','');
}

function editCardCuidado(id) {

  let route='GeteditCardCuidadoId';
  let datos={
    "id":id
  };

  controlador(route, datos,'GET',function(data){
      console.log(data);
      limpiarModalOrdenMedicameto();
      // let CuidadoFechaRango = formatdatei(data.fecha_inicio)+" - "+formatdatei(data.fecha_fin);
       setD('CuidadoId',id);
       setD('CuidadoDescripcion',data.descripcion);
      $('#ClickModalCuidados').click();
  });

}


function ModalGuardarExamen(){
  
  let ExamenId = getD('ExamenId');
  let ExamenDescripcion = getD('ExamenDescripcion');
  let ExamenTipo = getD('ExamenTipo');
  let clinical_case_id = getD('clinical_case_id');
  let doctor_id = getD('doctor_id');

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
      if(ExamenId != '' && ExamenId != null && ExamenId != 'undefined'){

        let route='UpdateOrdenExamen';
        let datos={
          "id":ExamenId,
          "descripcion":ExamenDescripcion,
          "tipo_examen":ExamenTipo,
          "clinical_case_id":clinical_case_id,
          "doctor_id":doctor_id
        };

        controlador(route, datos,'POST',function(data){
            console.log(data);
            borrarCardExamen(data.id);
            pintarCardExamen(data);
        });

      }else{
        let route='SetOrdenExamen';
        let datos={
          "descripcion":ExamenDescripcion,
          "tipo_examen":ExamenTipo,
          "clinical_case_id":clinical_case_id,
          "doctor_id":doctor_id
        };
        console.log(datos);
        controlador(route, datos,'POST',function(data){
            console.log(data);
            pintarCardExamen(data);
        });
      }
      
      limpiarModalOrdenExamen();
      $('#CloseModalExamen').click();
    }else{
      limpiarModalOrdenExamen();
      $('#CloseModalExamen').click();
    }
  })
  
}

function borrarCardExamen(id){
  $("#pintarCardExamen" + id).remove();
}

function pintarCardExamen(data){

  $("#DomOrderExmaenCard").append(`
    <div class="card shadow card-mb-5 card-border" id="pintarCardExamen${data.id}">
        <div class="card-body">
            <div class="row">
                <div class="col-6"><h5 class="card-title mb-0 text-p">${data.tipo_examen}</h5></div>
                <div class="col-6 text-right"><span class=""  onclick="deleteCardExamen('${data.id}');" style="margin-right:15px;"><i class="align-middle far fa-fw fa-trash-alt"></i></span><span class=""  onclick="editCardExamen('${data.id}');" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
                <div class="col-12 text-right"><span class="btn-floating float-right text-p">${data.descripcion}</span></div>
                <div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr ${data.nombre_doctor}</h5></div>
            </div>
        </div>
    </div>`);
}

function limpiarModalOrdenExamen() {
  setD('ExamenId','');
  setD('ExamenDescripcion','');
  setD('ExamenTipo','');
}

function editCardExamen(id) {

  let route='GeteditCardExamenId';
  let datos={
    "id":id
  };

  controlador(route, datos,'GET',function(data){
      console.log(data);
      limpiarModalOrdenExamen();       
       setD('ExamenId',id);
       setD('ExamenDescripcion',data.descripcion);
       setD('ExamenTipo',data.tipo_examen);
      $('#ClickModalExamen').click();
  });

}


function ModalGuardarInterconsulta(){
  
  let InterconsultaId = getD('InterconsultaId');
  let InterconsultaEspecialidad = getD('InterconsultaEspecialidad');
  let InterconsultaDoctor = getD('InterconsultaDoctor');
  let InterconsultaMotivo = getD('InterconsultaMotivo');
  let clinical_case_id = getD('clinical_case_id');
  let doctor_id = getD('doctor_id');


  if(InterconsultaId != '' && InterconsultaId != null && InterconsultaId != 'undefined'){

    let route='UpdateOrdenInterconsulta';
    let datos={
      "id":InterconsultaId,
      "especialidad":InterconsultaEspecialidad,
      "motivo":InterconsultaMotivo,
      "doctor":InterconsultaDoctor,
      "clinical_case_id":clinical_case_id,
      "doctor_id":doctor_id
    };

    controlador(route, datos,'POST',function(data){
        console.log(data);
        borrarCardInterconsulta(data.id);
        pintarCardInterconsulta(data);
    });

  }else{
    let route='SetOrdenInterconsulta';
    let datos={
      "especialidad":InterconsultaEspecialidad,
      "motivo":InterconsultaMotivo,
      "doctor":InterconsultaDoctor,
      "clinical_case_id":clinical_case_id,
      "doctor_id":doctor_id
    };
    console.log(datos);
    controlador(route, datos,'POST',function(data){
        console.log(data);
        pintarCardInterconsulta(data);
    });
  }
  
  limpiarModalOrdenInterconsulta();
  $('#CloseModalInterconsulta').click();
  
}

function borrarCardInterconsulta(id){
  $("#pintarCardInterconsulta" + id).remove();
}

function pintarCardInterconsulta(data){

  $("#DomOrderInterconsultaCard").append(`
    <div class="card shadow card-mb-5 card-border" id="pintarCardInterconsulta${data.id}">
        <div class="card-body">
            <div class="row">
                <div class="col-6"><h5 class="card-title mb-0 text-p">${data.motivo}</h5></div>
                <div class="col-6 text-right"><span class=""  onclick="editCardInterconsulta('${data.id}');" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
                <div class="col-12 text-right"><span class="btn-floating float-right text-p">${data.especialidad}</span></div>
                <div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr ${data.nombre_doctor}</h5></div>
            </div>
        </div>
    </div>`);
}

function limpiarModalOrdenInterconsulta() {
  setD('InterconsultaId','');
  setD('InterconsultaEspecialidad','');
  setD('InterconsultaDoctor','');
  setD('InterconsultaMotivo','');
}

function editCardInterconsulta(id) {

  let route='GeteditCardInterconsultaId';
  let datos={
    "id":id
  };

  controlador(route, datos,'GET',function(data){
      console.log(data);
      limpiarModalOrdenInterconsulta();       
       setD('InterconsultaId',id);
       setD('InterconsultaEspecialidad',data.especialidad);
       setD('InterconsultaDoctor',data.doctor);
       setD('InterconsultaMotivo',data.motivo);
      
      $('#ClickModalInterconsulta').click();
  });

}

function GetDoctorInterconsulta(){
  let route='GetDoctorInterconsulta';
  controlador(route, null,'GET',function(data){
      console.log(data);
      $('#InterconsultaDoctor').empty();
       if(Object.keys(data).length > 0)
       {

       $.each(data, function(i, item) {
         $('#InterconsultaDoctor').append($('<option>', { 
             value: item.id,
             text : item.name,
             disabled: false
         }));
       });

       } else 
       {
       $('#InterconsultaDoctor').append($('<option>', { 
           value: '',
           html : ' - Sin Registros - ',
           title: "- Sin Registros -",
           selected:true,
       }));
       
       }
  });
}

function solo_numeric(e) {
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))
    return true;
   
  return /\d/.test(String.fromCharCode(keynum));
  
}
