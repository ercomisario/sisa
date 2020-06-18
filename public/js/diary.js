let agendaDiaActual='';

let JSON_MEDICAMENTO_CONSULTA=[];
let ID_MEDICAMENTO_CONSULTA=0;

let JSON_CUIDADO_CONSULTA=[];
let ID_CUIDADO_CONSULTA=0;

let JSON_EXAMEN_CONSULTA=[];
let ID_EXAMEN_CONSULTA=0;

let CONT_SMARTWIZARD=1;

function pintarListaCitas(data) {
  // body...

   let dia = diasemana(data.fecha);
   agendaDiaActual = dia;
  $("#diary-lunes-users, #diary-martes-users, #diary-miercoles-users, #diary-jueves-users, #diary-viernes-users, #diary-sabado-users, #diary-domingo-users").empty();

  for (var i = 0; i < data.users.length; i++) {
    
    var arrayFechaHora = data.users[i].agreeded_date.split(" ");
    var fecha = arrayFechaHora[0].trim();    

    var diaSemana = diasemana(fecha);
    
    var html = pintarRow(data.users[i],diaSemana,dia);

    if (diaSemana == 'D') {
      $("#diary-domingo-users").append(html);
    }else if(diaSemana == 'L'){
      $("#diary-lunes-users").append(html);
    }else if(diaSemana == 'M'){
      $("#diary-martes-users").append(html);
    }else if(diaSemana == 'X'){
      $("#diary-miercoles-users").append(html);
    }else if(diaSemana == 'J'){
      $("#diary-jueves-users").append(html);
    }else if(diaSemana == 'V'){
      $("#diary-viernes-users").append(html);
    }else if(diaSemana == 'S'){
      $("#diary-sabado-users").append(html);
    }

  }
  
 

  $(".nav-item-tabs-a a").removeClass('active');
  $(".tab-pane").removeClass('active');
  
  if(dia == 'D'){
    $("#domingo").addClass('active')
    $("#tabs-tabs-diary-domingo").addClass('active')
  }else if (dia == 'L') {
    $("#lunes").addClass('active')
    $("#tabs-tabs-diary-lunes").addClass('active')
  }else if (dia == 'M') {
    $("#martes").addClass('active')
    $("#tabs-tabs-diary-martes").addClass('active')
  }else if (dia == 'X') {
    $("#miercoles").addClass('active')
    $("#tabs-tabs-diary-miercoles").addClass('active')
  }else if (dia == 'J') {
    $("#jueves").addClass('active')
    $("#tabs-tabs-diary-jueves").addClass('active')
  }else if (dia == 'V') {
    $("#viernes").addClass('active')
    $("#tabs-tabs-diary-viernes").addClass('active')
  }else if (dia == 'S') {
    $("#sabado").addClass('active')
    $("#tabs-tabs-diary-sabado").addClass('active')
  }

}

function diasemana(fecha){
  var arrayfecha = fecha.split("-");
  var dias = ["D", "L", "M", "X", "J", "V", "S"];
  var mes = arrayfecha[1]; //obteniendo mes
  var dia = arrayfecha[2];
  var ano = arrayfecha[0]; //obteniendo año
  if(dia<10)
      dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
      mes='0'+mes //agrega cero si el menor de 10
  var fec = mes+"/"+dia+"/"+ano;
  var day = new Date(fec).getDay();
 
  return dias[day];
}

function tConvert (time) {

  var arrayTime = time.split(":");
  time = arrayTime[0]+":"+arrayTime[1];

  // Check correct time format and split into components
  time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

  if (time.length > 1) { // If time format correct
    time = time.slice (1);  // Remove full string match value
    time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
    time[0] = +time[0] % 12 || 12; // Adjust hours
  }

  return time.join (''); // return adjusted time or original string

}

function pintarRow(data,diaSemana,diaActual){

  var arrayFechaHora = data.agreeded_date.split(" ");
  var fecha = arrayFechaHora[0].trim();
  var hora = arrayFechaHora[1].trim();

  var arrayName = data.person.name.split(" ");
  var name = arrayName[0].trim();
  var arrayLastName = data.person.last_name.split(" ");
  var last_name = arrayLastName[0].trim();
  if (diaSemana == diaActual) {
    html=`
        <a onclick="consulta('${data.medical_consultation_id}')" href="javascript:;">
          <div class="row mb-3 " style="">
              <div class="col-4 ">
                <div style="border-top: 2px dashed #ff9d00" class="text-center">
                    <span class="text-s"><strong> ${tConvert(hora)}</strong></span>
                </div>
              </div>
              <div class="col-8" style="border-left: 6px solid #ff9d00; border-radius: 5px; background-color: #faead1">
                <div class="media padding-superior-10" style="">
                  <img src="${asset_global}img/avatars/${data.person.cedula}.jpg" class="rounded-circle mr-2" alt="${name}" width="45" height="45">
                  <div class="media-body ml-3">                  
                    <span class="text-p" style="">${last_name}, ${name}</span><br>
                    <span class="text-p" style="">${formatdatei(fecha)}</span><br>
                    <span class="text-p" style=""><strong>${data.reason}</strong></span>
                  </div>
                </div>  
            </div>
          </div>
        </a>
      `;
  }else{
    html=`
        <a onclick="msjConsulta('${diaSemana}','${data.medical_consultation_id}')" href="javascript:;">
          <div class="row mb-3 " style="">
              <div class="col-4 ">
                <div style="border-top: 2px dashed #ff9d00" class="text-center">
                    <span class="text-s"><strong> ${tConvert(hora)}</strong></span>
                </div>
              </div>
              <div class="col-8" style="border-left: 6px solid #ff9d00; border-radius: 5px; background-color: #faead1">
                <div class="media padding-superior-10" style="">
                  <img src="${asset_global}img/avatars/${data.person.cedula}.jpg" class="rounded-circle mr-2" alt="Ashley Briggs" width="45" height="45">
                  <div class="media-body ml-3">                  
                    <span class="text-p" style="">${last_name}, ${name}</span><br>
                    <span class="text-p" style="">${formatdatei(fecha)}</span><br>
                    <span class="text-p" style=""><strong>${data.reason}</strong></span>
                  </div>
                </div>  
            </div>
          </div>
        </a>
      `;
  }

  return html;
}

function consulta(medical_consultation_id){

  JSON_MEDICAMENTO_CONSULTA=[];
  JSON_CUIDADO_CONSULTA=[];
  JSON_EXAMEN_CONSULTA=[];
  ID_MEDICAMENTO_CONSULTA=0;
  ID_CUIDADO_CONSULTA=0;
  ID_EXAMEN_CONSULTA=0;
  CONT_SMARTWIZARD=1;

  let route = 'listAppointmentId';
  
  controlador(route, {"id":medical_consultation_id},'POST',function(data){
      setD('PacienteConsultaID',medical_consultation_id);

      console.log("consulta");
      if(agendaDiaActual == 'D'){    
        $("#sw-domingo").empty().append(fromUser(data));
      }else if (agendaDiaActual == 'L') {
        $("#sw-lunes").empty().append(fromUser(data));
        
      }else if (agendaDiaActual == 'M') {
        $("#sw-martes").empty().append(fromUser(data));
        
      }else if (agendaDiaActual == 'X') {
        $("#sw-miercoles").empty().append(fromUser(data));
        
      }else if (agendaDiaActual == 'J') {
        $("#sw-jueves").empty().append(fromUser(data));
        
      }else if (agendaDiaActual == 'V') {
        $("#sw-viernes").empty().append(fromUser(data));
        
      }else if (agendaDiaActual == 'S') {
        $("#sw-sabado").empty().append(fromUser(data));
      }

  });
     
}

// Obtener Lunes de la Semana actual
const date = (() => {
  const now = new Date();
  return new Date(now.setDate(now.getDate() - now.getDay() - -1));
})();

// Recorrer la semana

const week = Array(7).fill(date).map((date, i) => {
  if (i !== 0) {
    date.setDate(date.getDate() + 1);
  }
  const name = date.toLocaleDateString('es-ES', { weekday: 'short' });
  return { 
    [name[0].toUpperCase()]: date.getDate()
  };
});
//prueba wladimir
var reemplazarAcentos=function(cadena)
{
	var chars={
		"á":"a", "é":"e", "í":"i", "ó":"o", "ú":"u",
		"à":"a", "è":"e", "ì":"i", "ò":"o", "ù":"u", "ñ":"n",
		"Á":"A", "É":"E", "Í":"I", "Ó":"O", "Ú":"U",
		"À":"A", "È":"E", "Ì":"I", "Ò":"O", "Ù":"U", "Ñ":"N"}
	var expr=/[áàéèíìóòúùñ]/ig;
	var res=cadena.replace(expr,function(e){return chars[e]});
	return res;
}

function semana(hoy){
  var x={};
  for(i=0;i<=6;i++){
    if (i !== 0) {
      hoy.setDate(hoy.getDate() + 1);
    }
    const name = hoy.toLocaleDateString('es-ES', { weekday: 'long' });
    /*if(hoy.getDay() == 3)
    x[name.substr(0,2).toUpperCase()]=hoy.getDate();
    else
    x[name.substr(0,1).toUpperCase()]=hoy.getDate();*/
    x[reemplazarAcentos(name.toLowerCase())]=hoy.getDate();
  }
  return x;
}
var datex = new Date();
var week2 = semana(datex);

//fin prueba wladimir
function CargarDia() {
  console.log(week2);

  for (ind in week2){
    console.log(ind+' es: '+week2[ind]);
    $("#num-"+ind).empty().append((week2[ind]<10)? "0"+week2[ind]:week2[ind]);
  }


  /* $("#num-lunes").empty().append((week[0].L<10)? "0"+week[0].L:week[0].L);
  $("#num-martes").empty().append((week[1].M<10)? "0"+week[1].M:week[1].M);
  $("#num-miercoles").empty().append((week[2].M<10)? "0"+week[2].M:week[2].M);
  $("#num-jueves").empty().append((week[3].J<10)? "0"+week[3].J:week[3].J);
  $("#num-viernes").empty().append((week[4].V<10)? "0"+week[4].V:week[4].V);
  $("#num-sabado").empty().append((week[5].S<10)? "0"+week[5].S:week[5].S);
  $("#num-domingo").empty().append((week[6].D<10)? "0"+week[6].D:week[6].D);*/

  /*$("#num-lunes").empty().append((week2.L<10)? "0"+week2.L:week2.L);
  $("#num-martes").empty().append((week2.M<10)? "0"+week2.M:week2.M);
  $("#num-miercoles").empty().append((week2.MI<10)? "0"+week2.MI:week2.MI);
  $("#num-jueves").empty().append((week2.J<10)? "0"+week2.J:week2.J);
  $("#num-viernes").empty().append((week2.V<10)? "0"+week2.V:week2.V);
  $("#num-sabado").empty().append((week2.S<10)? "0"+week2.S:week2.S);
  $("#num-domingo").empty().append((week2.D<10)? "0"+week2.D:week2.D);*/
}

function fromUser(data){
  console.log(data);

    let htmlEnfermedad='';
    let htmlAlergia='';

  for (var i = 0; i < data.enfermedadBase.length; i++) {    
   if(data.enfermedadBase[i].name == 'Alergia'){           
      htmlAlergia += data.enfermedadBase[i].description;
    }else{
      htmlEnfermedad += data.enfermedadBase[i].name +' : '+data.enfermedadBase[i].description+'<br>';
    }
  }

  return  `
      <div id="" class="row">
         
          <div class="col-lg-12">
            <p class="text-p" style="font-size: 1rem"><strong>${data.users.last_name} , ${data.users.name}</strong></p>
            <p class="text-s"><strong>Motivo: </strong> ${data.users.reason}</p>
          </div>
          <div class="col-lg-12">
            <br>
             <p class="text-s"><strong>Enfermedades: </strong> <br>
             <span>${htmlEnfermedad}</span></p>
          </div>
          <div class="col-lg-12">
             <br>
             <p class="text-s"><strong>Alergias: </strong> <br>
             <span>${htmlAlergia}</span></p>
          </div>  
          <div class="col-lg-12">
             <button class="btn-floating float-right btn btn-warning" onclick="window.location='/Consultation/${data.users.medical_consultation_id}'" style="margin-top: -6px"> Iniciar consulta </button>
          </div>     
      </div>

  `;
}

function fromUserMsj(data){
  console.log(data);
  return  `
      <div id="" class="row">
         
          <div class="col-lg-12">
            <p class="text-p" style="font-size: 1rem"><strong>${data.users.last_name} , ${data.users.name}</strong></p>
            <p class="text-s"><strong>Motivo: </strong> ${data.users.reason}</p>
          </div>
          <div class="col-lg-12">
             <p class="text-s"><strong>Enfermedades: </strong> </p>
          </div>
          <div class="col-lg-12">
             <p class="text-s"><strong>Alergias: </strong> </p>
          </div>  
          <div class="col-lg-12">
               <div class='row' style='justify-content:center'><span> <strong>Las consultas para este día aun no están disponibles.  </strong></span></div>
          </div>     
      </div>

  `;
}


function fromDiary(){
  return  `
      <form id="Smartwizard" class="" action="javascript:void(0)">
          <ul>
              <li><a href="#step-1" style="display: none;"><small>DESCRIPTIÓN</small></a></li>
              <li><a href="#step-2" style="display: none;"><small>DIAGNÓSTICO</small></a></li>
              <li><a href="#step-3" style="display: none;"><small>ORDENES</small></a></li>
              <li><a href="#step-4" style="display: none;"><small>JUSTIFICATIVO</small></a></li>
          </ul>

          <div>
              <div id="step-1" class="">
                  <div class="form-row ">   

                    <h4 class="ml-3 mt-3 text-p " style=""><strong>DESCRIPCIÓN DE LA CONSULTA</strong></h4>
                    <div class="form-group col-md-11 mt-3 ml-4">
                      <textarea id="descripcionConsulta" class="form-control required" placeholder="Descripción de la consulta ..." rows="10" ></textarea>
                    </div>

                    <!--
                    <div class="form-group col-md-11 mt-3 ml-4">

                      <div class="upload">
                          <button class="uploadButton"> <i class="align-middle mr-2 fas fa-fw fa-file-medical"></i> Adjuntar Archivo</button>
                          <input type="file" name="fileEstudiosRealizado" accept="image/*" id="fileEstudiosRealizado" />
                          <span class="fileName"> Seleccione archivo ...</span>
                      </div>

                      <h5 class=" mt-3 text-s " style=""><strong>HALLAZGOS DE EXÁMENES</strong></h5>
                      <textarea id="hallazgosExamen" class="form-control required" placeholder="Descripción de hallazgos ..." rows="4"></textarea>

                    </div>
                    -->
                  </div>
              </div>
               <div id="step-2" class="">
                  <div class="form-row ">   

                    <h4 class="ml-3 mt-3 text-p " style=""><strong>DIAGNÓSTICO DE LA CONSULTA</strong></h4>

                    <div class="form-group col-md-11 mt-3 ml-4">                      
                      <h5 class="text-s" style=""><strong>PATOLOGíA</strong></h5>
                      <!-- <input  type="text" id="patologiaConsulta" class="form-control required" placeholder="Patología ..." /> -->
                      <select id="patologiaConsulta" class="form-control required">
                        <option value="Ciertas enfermedades infecciosas y parasitarias">Ciertas enfermedades infecciosas y parasitarias</option>
                        <option value="Tumores [neoplasias]">Tumores [neoplasias]</option>
                        <option value="Enfermedades de la sangre y de los órganos hematopoyéticos, y ciertos trastornos que afectan el mecanismo de la inmunidad">Enfermedades de la sangre y de los órganos hematopoyéticos, y ciertos trastornos...</option>
                        <option value="Enfermedades endocrinas, nutricionales y metabolicas">Enfermedades endocrinas, nutricionales y metabolicas</option>
                        <option value="Trastornos mentales y del comportamiento">Trastornos mentales y del comportamiento</option>
                        <option value="Enfermedades del sistema nervioso">Enfermedades del sistema nervioso</option>
                        <option value="Enfermedades del ojo y sus anexos">Enfermedades del ojo y sus anexos</option>
                        <option value="Enfermedades del oído y de la apófisis mastoides">Enfermedades del oído y de la apófisis mastoides</option>
                        <option value="Enfermedades del sistema circulatorio">Enfermedades del sistema circulatorio</option>
                        <option value="Enfermedades del sistema respiratorio">Enfermedades del sistema respiratorio</option>
                        <option value="Enfermedades del sistema digestivo">Enfermedades del sistema digestivo</option>
                        <option value="Enfermedades de la piel y del tejido subcutáneo">Enfermedades de la piel y del tejido subcutáneo</option>
                        <option value="Enfermedades del sistema osteomuscular y del tejido conjuntivo">Enfermedades del sistema osteomuscular y del tejido conjuntivo</option>
                        <option value="Enfermedades del sistema genitourinario">Enfermedades del sistema genitourinario</option>
                        <option value="Embarazo, parto y puerperio">Embarazo, parto y puerperio</option>
                        <option value="Ciertas afecciones originadas en el período perinatal">Ciertas afecciones originadas en el período perinatal</option>
                        <option value="Malformaciones congénitas, deformidades y anomalías cromosómicas">Malformaciones congénitas, deformidades y anomalías cromosómicas</option>
                        <option value="Síntomas, signos y hallazgos anormales clínicos y de laboratorio, no clasificados en otra parte">Síntomas, signos y hallazgos anormales clínicos y de laboratorio, no clasificados en otra parte</option>
                        <option value="Traumatismos, envenenamientos y algunas otras consecuencias de causas externas">Traumatismos, envenenamientos y algunas otras consecuencias de causas externas</option>
                        <option value="Causas externas de morbilidad y de mortalidad">Causas externas de morbilidad y de mortalidad</option>
                        <option value="Factores que influyen en el estado de salud y contacto con los servicios de salud">Factores que influyen en el estado de salud y contacto con los servicios de salud</option>
                        <option value="Situaciones Especiales">Situaciones Especiales</option>
                        <option value="Colera">colera</option>
                        <option value="Colera debido a vibrio cholerae 01, biotipo cholerae">Colera debido a vibrio cholerae 01, biotipo cholerae</option>
                        <option value="Colera debido a vibrio cholerae 01, biotipo el tor">Colera debido a vibrio cholerae 01, biotipo el tor</option>
                        <option value="Colera, no especificado">Colera, no especificado</option>
                        <option value="Fiebres tifoidea y paratifoidea">Fiebres tifoidea y paratifoidea</option>
                        <option value="Fiebre tifoidea">Fiebre tifoidea</option>
                        <option value="Fiebre paratifoidea a">Fiebre paratifoidea a</option>
                        <option value="Fiebre paratifoidea b">Fiebre paratifoidea b</option>
                        <option value="Fiebre paratifoidea c">Fiebre paratifoidea c</option>
                        <option value="Fiebre paratifoidea, no especificada">Fiebre paratifoidea, no especificada</option>
                      </select>
                    </div>

                    <div class="form-group col-md-11 mt-3 ml-4">
                      <h5 class="text-s" style=""><strong>DIAGNÓSTICO DE LA CONSULTA</strong></h5>
                      <textarea  id="diagnosticoConsulta" class="form-control required" placeholder="Diagnóstico de la consulta ..." rows="4"></textarea>
                    </div>

                    

                    <div class="form-row mt-3 mb-3 col-md-12 col-lg-12" style="justify-content: center;">
                       <div class="form-inline ml-5 "> 
                         <label class="custom-control  custom-radio mr-4">
                           <input name="admisionConsulta" type="radio" class="custom-control-input" value="0">
                           <span class="custom-control-label">Control / Revisión de Examenes</span>
                         </label>
                         <label class="custom-control  custom-radio mr-4">
                           <input name="admisionConsulta" type="radio" class="custom-control-input" value="1">
                           <span class="custom-control-label">Hospitalización</span>
                         </label>
                         <label class="custom-control  custom-radio mr-4">
                           <input checked name="admisionConsulta" type="radio" class="custom-control-input" value="0">
                           <span class="custom-control-label">Finalizar consulta</span>
                         </label>
                        </div>
                     </div>     

                  </div>
              </div>
              <div id="step-3" class="">
                  <h4 class="ml-3 mt-3 text-p" style=""><strong>ORDENES MÉDICAS</strong></h4>
                  <div class="form-row list-diary-ordenes">
                     <div class="form-group col-4 mt-4">
                       <h5 class="ml-3 text-s" style="padding-right: 12px"><strong>Medicamentos</strong> <span class="btn-agg-order btn-floating" data-toggle="modal" data-target="#centeredModalMedicamentosConsulta" id="ClickModalMedicamentosConsulta"> <i class="align-middle fas fa-plus "></i> </span></h5>
                       <br>
                       <div id="DomOrderMedicationCardConsulta">
                       </div>
                     </div>
                     <div class="form-group col-4 mt-4">
                      <h5 class="ml-3 text-s" style="padding-right: 12px"><strong>Cuidados</strong> <span class="btn-agg-order btn-floating" data-toggle="modal" data-target="#centeredModalCuidadosConsulta" id="ClickModalCuidadoConsulta"> <i class="align-middle fas fa-plus "></i> </span></h5>
                      <br>
                       <div id="DomOrderCuidadoConsultaCard">
                       </div>

                    </div>   

                    <div class="form-group col-4 mt-4">
                      <h5 class="ml-3 text-s" style="padding-right: 12px"><strong>Examenes</strong> <span class="btn-agg-order btn-floating" data-toggle="modal" data-target="#centeredModalExamenesConsulta" id="ClickModalExamenConsulta"> <i class="align-middle fas fa-plus "></i> </span></h5>

                       <br>
                       <div id="DomOrderExamenConsultaCard">
                       </div>

                    </div>    

                  </div>     

              </div>
              <div id="step-4" class="">
                  <h4 class="ml-3 mt-3 text-p  text-left" style=""><strong>JUSTIFICATIVO MÉDICO</strong></h4>
                  <div class="form-group col-md-11 mt-3 ml-4">
                    <h5 class="text-s " style=""><strong>Tiempo del Justificativo Médico</strong></h5>
                    <input class="form-control" type="text" id="daterangeJustificativo" name="daterangeJustificativo" value="" style="max-width: 30%" />

                    <h5 class=" mt-3 text-s " style=""><strong>Descripción del Justificativo Médico</strong></h5>
                    <textarea id="descriptionJustificativo" class="form-control" placeholder="Descripción del justificativo ..." rows="4"></textarea>
                  </div>
              </div>

          </div>
      </form>
  `;
}

function fromInforme(data){
  return`
    <div id="" style="box-shadow: 0 1px 3px rgba(0, 0, 0, .3);">
      <div class="list-date-diary">
        <div class="card shadow">
            <div class="card-header mt-3">
                <button class="btn-floating float-right btn btn-warning" onclick="window.location='/RealizarAnamnesis/${data.id}'" style="margin-top: -6px">Realizar Anamnesis</button>
                <h5 class="card-title mb-0 text-p"><strong>${data.person.last_name}, ${data.person.name}</strong></h5>
            </div>
            <div class="card-body">
                <h5 class="mt-3 text-p"><strong>DESCRIPCIÓN DE LA CONSULTA</strong></h5>
                <div class="card-body">
                    <div class="media d-block d-md-flex">
                        <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">${getFecha(data.medical_consultation.created_at)} <br> ${getHora(data.medical_consultation.created_at)}<br> Dr. ${data.doctor_last_name}</p></div>
                        <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
                        ${data.medical_consultation.description}
                        </div>
                    </div>
                </div>

                <h5 class="mt-3 text-p"><strong>DIAGNÓSTICO INICIAL</strong></h5>
                <div class="card-body">
                    <div class="media d-block d-md-flex">
                        <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Patología: <br> ${data.pathology}</p></div>
                        <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
                        ${data.diagnostic}
                        </div>
                    </div>
                </div>


                <!--<h5 class="mt-3 text-p"><strong>REFERIDO A</strong></h5>
                <div class="card-body">
                    <div class="media d-block d-md-flex">
                        <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Hospitalización</p></div>
                        <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                        ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                        </div>
                    </div>
                </div>-->

                <!--
                <h5 class="mt-3 text-p"><strong>ESTUDIOS REALIZADOS</strong></h5>
                <div class="card-body">
                    <div class="media d-block d-md-flex">
                    <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Informe</p></div>
                    <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                        ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.

                        <div class="row mt-4">
                            <div class="col-6">
                            <img src="img/photos/unsplash-1.jpg" class="img-fluid">
                            </div>
                            <div class="col-6">
                            <img src="img/photos/unsplash-1.jpg" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    </div>
                </div> -->

            </div>
        </div>
      </div>
    </div>
  `;
}

function fromInformePatient(data){
  
  if(data.anamnesis.length > 0){
    var bttAnamenesis='';
  }else{
    var bttAnamenesis=`<button class="float-right btn btn-warning" onclick="window.location='/RealizarAnamnesis/${data.id}'" style="margin-top: -6px">Anamnesis</button>`;
  }

  let htmlMedications='';
  let htmlCuidado='';
  let htmlExamen='';
  if (data.medications.length>0 ) {
    for (var i = 0; i < data.medications.length; i++) {      
      var arrayFechaInicio = data.medications[i].start_time.split(' ');
      var fecha_inicio = arrayFechaInicio[0].trim();
      var arrayFechaFin = data.medications[i].end_time.split(' ');
      var fecha_fin = arrayFechaFin[0].trim();
      htmlMedications +=`
          <div class="card shadow card-mb-5 card-border" id="pintarCardMedicamento${data.id}">
            <div class="card-body">
              <div class="row">
                <div class="col-6"><h5 class="card-title mb-0 text-p">${data.medications[i].name}</h5></div>
                <div class="col-6"><h5 class="mb-0 text-p">${data.medications[i].dose} mg <span class="ml-3 text-s"> ${data.medications[i].frequency}/d</span></h5></div>
                <div class="col-12 padding-0 text-right"><span class="btn-floating float-right text-p">${data.medications[i].administer_route}</span></div>
                <div class="col-12 text-right"><span class="btn-floating float-right text-p">${formatdatei(fecha_inicio)} - ${formatdatei(fecha_fin)}</span></div>
              </div>
            </div>
          </div>
      `;
    }
  }

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

  return`
    <div id="" style="box-shadow: 0 1px 3px rgba(0, 0, 0, .3);">
      <div class="list-date-diary">
        <div class="card shadow">
            <div class="card-header mt-3">
                <button class="float-right btn btn-warning" onclick="window.location='/Discharge-Order/${data.id}'" style="margin-top: -6px">Egresos</button>
                <button class="float-right btn btn-warning " onclick="PatientTrackingOrdenes('${data.id}')" style="margin-top: -6px">Ordenes</button>
                ${bttAnamenesis}
                
                <h5 class="card-title mb-0 text-p"><strong>${data.person.last_name}, ${data.person.name}</strong></h5>
            </div>
            <div class="card-body">
            <!--
                <h5 class="mt-3 text-p"><strong>DESCRIPCIÓN DE LA CONSULTA</strong></h5>
                <div class="card-body">
                    <div class="media d-block d-md-flex">
                        <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">${getFecha(data.medical_consultation.created_at)} <br> ${getHora(data.medical_consultation.created_at)}<br> Dr. ${data.doctor_last_name}</p></div>
                        <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
                        ${data.medical_consultation.description}
                        </div>
                    </div>
                </div>
            -->

                <h5 class="mt-3 text-p"><strong>DIAGNÓSTICO INICIAL</strong></h5>
                <div class="card-body">
                    <div class="media d-block d-md-flex">
                        <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Patología<br> ${data.pathology}</p></div>
                        <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
                        ${data.diagnostic}
                        </div>
                    </div>
                </div>

                <h4 class="ml-3 mt-3 text-p" style=""><strong>ORDENES MÉDICAS</strong></h4>
                  <div class="form-row list-diary-ordenes">
                   <div class="form-group col-4 mt-4">
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

                <!--<h5 class="mt-3 text-p"><strong>REFERIDO A</strong></h5>
                <div class="card-body">
                    <div class="media d-block d-md-flex">
                        <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Hospitalización</p></div>
                        <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                        ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                        </div>
                    </div>
                </div>-->

                <!--
                <h5 class="mt-3 text-p"><strong>ESTUDIOS REALIZADOS</strong></h5>
                <div class="card-body">
                    <div class="media d-block d-md-flex">
                    <div class="shadow card text-center" style="border-radius: 1rem"><p style="margin: 10px; padding: 10px; ">Informe</p></div>
                    <div class="media-body text-center text-md-left ml-md-3 ml-0"><br>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                        ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.

                        <div class="row mt-4">
                            <div class="col-6">
                            <img src="img/photos/unsplash-1.jpg" class="img-fluid">
                            </div>
                            <div class="col-6">
                            <img src="img/photos/unsplash-1.jpg" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    </div>
                </div> -->

            </div>
        </div>
      </div>
    </div>
  `;
}

function msjConsulta(diaSemana,medical_consultation_id){

  $(".sw-container").empty();

  let route = 'listAppointmentId';
  controlador(route, {"id":medical_consultation_id},'POST',function(data){


      if(diaSemana == 'D'){    
        $("#sw-domingo").empty().append(fromUserMsj(data));
      }else if (diaSemana == 'L') {
        $("#sw-lunes").empty().append(fromUserMsj(data));
        
      }else if (diaSemana == 'M') {
        $("#sw-martes").empty().append(fromUserMsj(data));
        
      }else if (diaSemana == 'X') {
        $("#sw-miercoles").empty().append(fromUserMsj(data));
        
      }else if (diaSemana == 'J') {
        $("#sw-jueves").empty().append(fromUserMsj(data));
        
      }else if (diaSemana == 'V') {
        $("#sw-viernes").empty().append(fromUserMsj(data));
        
      }else if (diaSemana == 'S') {
        $("#sw-sabado").empty().append(fromUserMsj(data));
      }

  });


  
}

function ModalGuardarMedicamentoConsulta(){  


  let MedicamentoConsultaId = getD('MedicamentoConsultaId');
  let presentation_Id = getD('presentation_Id');
  let MedicamentoConsultaCompuesto = getD('MedicamentoConsultaCompuesto');
  let MedicamentoConsultaDosis = getD('MedicamentoConsultaDosis');
  let MedicamentoConsultaFrecuencia = getD('MedicamentoConsultaFrecuencia');
  let MedicamentoConsultaObservacion = getD('MedicamentoConsultaObservacion');
  let MedicamentoConsultaFechaRango = getD('MedicamentoConsultaFechaRango');
    
  let arrayFecha = MedicamentoConsultaFechaRango.split('-');
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
      console.log("le dio que si");
      if(MedicamentoConsultaId != '' && MedicamentoConsultaId != null && MedicamentoConsultaId != 'undefined'){
        let datos={
          "id":MedicamentoConsultaId,
          "presentation_Id":presentation_Id,
          "compuesto":MedicamentoConsultaCompuesto,
          "dosis":MedicamentoConsultaDosis,
          "frecuencia":MedicamentoConsultaFrecuencia,
          "observacion":MedicamentoConsultaObservacion,
          "fecha_inicio":fecha_inicio,
          "fecha_fin":fecha_fin
        };

        for (var i = 0; i < JSON_MEDICAMENTO_CONSULTA.length; i++) {
            if (JSON_MEDICAMENTO_CONSULTA[i].id == MedicamentoConsultaId) {
                JSON_MEDICAMENTO_CONSULTA[i].presentation_Id = presentation_Id
                JSON_MEDICAMENTO_CONSULTA[i].compuesto = datos.compuesto;
                JSON_MEDICAMENTO_CONSULTA[i].dosis = datos.dosis;
                JSON_MEDICAMENTO_CONSULTA[i].frecuencia = datos.frecuencia;
                JSON_MEDICAMENTO_CONSULTA[i].observacion = datos.observacion;
                JSON_MEDICAMENTO_CONSULTA[i].fecha_inicio = datos.fecha_inicio;
                JSON_MEDICAMENTO_CONSULTA[i].fecha_fin = datos.fecha_fin;
                break;
            }
        }

        borrarCardMedicamentoConsulta(datos.id);
        pintarCardMedicamentoConsulta(datos);
        

      }else{

        let datos={
          "id":ID_MEDICAMENTO_CONSULTA,
          "presentation_Id":presentation_Id,
          "compuesto":MedicamentoConsultaCompuesto,
          "dosis":MedicamentoConsultaDosis,
          "frecuencia":MedicamentoConsultaFrecuencia,
          "observacion":MedicamentoConsultaObservacion,
          "fecha_inicio":fecha_inicio,
          "fecha_fin":fecha_fin
        };
        JSON_MEDICAMENTO_CONSULTA.push(datos);
        ID_MEDICAMENTO_CONSULTA++;

        pintarCardMedicamentoConsulta(datos);
      }
      
      limpiarModalOrdenMedicametoConsulta();
      $('#CloseModalMedicamentoConsultas').click();  
    }else{
      limpiarModalOrdenMedicametoConsulta();
      $('#CloseModalMedicamentoConsultas').click();  
    }
  })
  
}

function borrarCardMedicamentoConsulta(id) {
  $("#pintarCardMedicamentoConsulta" + id).remove();
}

function pintarCardMedicamentoConsulta(data) {  

 $("#DomOrderMedicationCardConsulta").append(`
      <div class="card shadow card-mb-5 card-border" id="pintarCardMedicamentoConsulta${data.id}">
        <div class="card-body">
          <div class="row">
            <div class="col-6"><h5 class="card-title mb-0 text-p">${data.compuesto}</h5></div>
            <div class="col-6 text-right"><span class="" onclick="deleteCardMedicamentoConsulta('${data.id}');" style="margin-right: 15px;"><i class="align-middle far fa-fw fa-trash-alt"></i></span><span class="" onclick="editCardMedicamentoConsulta('${data.id}');" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
            <div class="col-6"><h5 class="mb-0 text-p">${data.dosis} mg <span class="ml-3 text-s"> ${data.frecuencia}/h</span></h5></div>
            <div class="col-12 padding-0 text-right"><span class="btn-floating float-right text-p">${data.observacion}</span></div>
            <div class="col-12 text-right"><span class="btn-floating float-right text-p">${formatdatei(data.fecha_inicio)} - ${formatdatei(data.fecha_fin)}</span></div>
          </div>
        </div>
      </div>
  `);
}

function editCardMedicamentoConsulta(id){

   for (var i = 0; i < JSON_MEDICAMENTO_CONSULTA.length; i++) {
       if (JSON_MEDICAMENTO_CONSULTA[i].id == id) {
           setD('MedicamentoConsultaId',id);
           setD('MedicamentoConsultaCompuesto',JSON_MEDICAMENTO_CONSULTA[i].compuesto);
           setD('MedicamentoConsultaDosis',JSON_MEDICAMENTO_CONSULTA[i].dosis);
           setD('MedicamentoConsultaFrecuencia',JSON_MEDICAMENTO_CONSULTA[i].frecuencia);
           setD('MedicamentoConsultaObservacion',JSON_MEDICAMENTO_CONSULTA[i].observacion);
           setD('MedicamentoConsultaFechaRango',formatdatei(JSON_MEDICAMENTO_CONSULTA[i].fecha_inicio)+' - '+formatdatei(JSON_MEDICAMENTO_CONSULTA[i].fecha_fin));
           break;
       }
   }
    
    $('#ClickModalMedicamentosConsulta').click();
}

function deleteCardMedicamentoConsulta(id){

  let index='';

  for (var i = 0; i < JSON_MEDICAMENTO_CONSULTA.length; i++) {
       if (JSON_MEDICAMENTO_CONSULTA[i].id == id) {
          index=i;
       }
  }

  if (index != '' || index != null || index != 'undefined') {
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
        JSON_MEDICAMENTO_CONSULTA.splice(index,1);
        node=document.getElementById("pintarCardMedicamentoConsulta"+id);    
        node.parentNode.removeChild(node);
        index='';
      }
    })
  }
}

function limpiarModalOrdenMedicametoConsulta(){
   setD('MedicamentoConsultaId','');
   setD('MedicamentoConsultaCompuesto','');
   setD('MedicamentoConsultaDosis','');
   setD('MedicamentoConsultaFrecuencia','');
   setD('MedicamentoConsultaObservacion','');
   setD('MedicamentoConsultaFechaRango','');
   $("#centeredModalMedicamentosConsultaAlergias").empty();
   $("#centeredModalMedicamentosConsultaEnfermdadBase").empty();
}

function ModalGuardarCuidadoConsulta(){
  
  let CuidadoConsultaId = getD('CuidadoConsultaId');
  let CuidadoConsultaDescripcion = getD('CuidadoConsultaDescripcion');
  // let CuidadoConsultaFechaRango = getD('CuidadoConsultaFechaRango');

  // let arrayFecha = CuidadoConsultaFechaRango.split('-');
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

      if(CuidadoConsultaId != '' && CuidadoConsultaId != null && CuidadoConsultaId != 'undefined'){

        let datos={
          "id":CuidadoConsultaId,
          "descripcion":CuidadoConsultaDescripcion,
          // "fecha_inicio":fecha_inicio,
          // "fecha_fin":fecha_fin
        };

        for (var i = 0; i < JSON_CUIDADO_CONSULTA.length; i++ ) {
            if (JSON_CUIDADO_CONSULTA[i].id == CuidadoConsultaId) {
                JSON_CUIDADO_CONSULTA[i].descripcion = datos.descripcion;            
                break;
            }
        }

        borrarCardCuidadoConsulta(datos.id);
        pintarCardCuidadoConsulta(datos);

      }else{

        let datos={
          "id":ID_CUIDADO_CONSULTA,
          "descripcion":CuidadoConsultaDescripcion,
          // "fecha_inicio":fecha_inicio,
          // "fecha_fin":fecha_fin
        };
        
        JSON_CUIDADO_CONSULTA.push(datos);
        ID_CUIDADO_CONSULTA++;


        pintarCardCuidadoConsulta(datos);
      }
      
      limpiarModalOrdenCuidadoConsulta();
      $('#CloseModalCuidadoConsulta').click();  
    }else{
      limpiarModalOrdenCuidadoConsulta();
      $('#CloseModalCuidadoConsulta').click(); 
    }
  })

}

function borrarCardCuidadoConsulta(id){
  $("#pintarCardCuidadoConsulta" + id).remove();
}

function pintarCardCuidadoConsulta(data){

  $("#DomOrderCuidadoConsultaCard").append(`
    <div class="card shadow card-mb-5 card-border" id="pintarCardCuidadoConsulta${data.id}">
        <div class="card-body">
            <div class="row">
                <div class="col-6"><h5 class="card-title mb-0 text-p">${data.descripcion}</h5></div>
                <div class="col-6 text-right"><span class="" onclick="deleteCardCuidadoConsulta('${data.id}');" style="margin-right: 15px;"><i class="align-middle far fa-fw fa-trash-alt"></i></span><span class=""  onclick="editCardCuidadoConsulta('${data.id}');" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
                <!-- <div class="col-12 text-right"><span class="btn-floating float-right text-p">Inicio - Fin</span></div> -->
            </div>
        </div>
    </div>`);
}

function editCardCuidadoConsulta(id){

  for (var i = 0; i < JSON_CUIDADO_CONSULTA.length; i++) {
      if (JSON_CUIDADO_CONSULTA[i].id == id) {
          setD('CuidadoConsultaId',id);
          setD('CuidadoConsultaDescripcion',JSON_CUIDADO_CONSULTA[i].descripcion);
          break;
      }
  }
   
   $('#ClickModalCuidadoConsulta').click();
}

function limpiarModalOrdenCuidadoConsulta(){
  setD('CuidadoConsultaId','');
  setD('CuidadoConsultaDescripcion','');
}


function deleteCardCuidadoConsulta(id){
  let index;

  for (var i = 0; i < JSON_CUIDADO_CONSULTA.length; i++) {
       if (JSON_CUIDADO_CONSULTA[i].id == id) {          
          index =  i;
          console.log('index',index);
       }
  }

  if(index != '' || index != null || index != 'undefined'){
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
        JSON_CUIDADO_CONSULTA.splice(index,1);
        node=document.getElementById("pintarCardCuidadoConsulta"+id);    
        node.parentNode.removeChild(node);
        index='';        
      }
    })

  }
  
}

function ModalGuardarExamenConsulta(){


  let ExamenConsultaId = getD('ExamenConsultaId');
  let ExamenConsultaDescripcion = getD('ExamenConsultaDescripcion');
  let ExamenTipoConsulta = getD('ExamenTipoConsulta');

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
      if(ExamenConsultaId != '' && ExamenConsultaId != null && ExamenConsultaId != 'undefined'){

        
        let datos={
          "id":ExamenConsultaId,
          "descripcion":ExamenConsultaDescripcion,
          "tipo_examen":ExamenTipoConsulta
        };

        for (var i = 0; i < JSON_EXAMEN_CONSULTA.length; i++) {
            if (JSON_EXAMEN_CONSULTA[i].id == ExamenConsultaId) {
                JSON_EXAMEN_CONSULTA[i].descripcion = datos.descripcion;            
                JSON_EXAMEN_CONSULTA[i].tipo_examen = datos.tipo_examen;            
                break;
            }
        }

        borrarCardExamenConsulta(datos.id);
        pintarCardExamenConsulta(datos);    

      }else{

        let datos={
          "id":ID_EXAMEN_CONSULTA,
          "descripcion":ExamenConsultaDescripcion,
          "tipo_examen":ExamenTipoConsulta
        };

        JSON_EXAMEN_CONSULTA.push(datos);
        ID_EXAMEN_CONSULTA++;
        pintarCardExamenConsulta(datos);
      }
      
      limpiarModalOrdenExamenConsulta();
      $('#CloseModalExamenConsulta').click();
    }else{
      limpiarModalOrdenExamenConsulta();
      $('#CloseModalExamenConsulta').click();
    }
  })
}

function borrarCardExamenConsulta(id){
  $("#pintarCardExamenConsulta" + id).remove();
}


function pintarCardExamenConsulta(data){

  $("#DomOrderExamenConsultaCard").append(`
    <div class="card shadow card-mb-5 card-border" id="pintarCardExamenConsulta${data.id}">
        <div class="card-body">
            <div class="row">
                <div class="col-6"><h5 class="card-title mb-0 text-p">${data.tipo_examen}</h5></div>
                <div class="col-6 text-right"><span class=""  onclick="deleteCardExamenConsulta('${data.id}');" style="margin-right:15px;"><i class="align-middle far fa-fw fa-trash-alt"></i></span><span class=""  onclick="editCardExamenConsulta('${data.id}');" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
                <div class="col-12 text-right"><span class="btn-floating float-right text-p">${data.descripcion}</span></div>
            </div>
        </div>
    </div>`);
}

function limpiarModalOrdenExamenConsulta() {
  setD('ExamenConsultaId','');
  setD('ExamenConsultaDescripcion','');
  setD('ExamenTipoConsulta','');
}

function editCardExamenConsulta(id){

  for (var i = 0; i < JSON_EXAMEN_CONSULTA.length; i++) {
      if (JSON_EXAMEN_CONSULTA[i].id == id) {
          setD('ExamenConsultaId',id);
          setD('ExamenConsultaDescripcion',JSON_EXAMEN_CONSULTA[i].descripcion);
          setD('ExamenTipoConsulta',JSON_EXAMEN_CONSULTA[i].tipo_examen);
          break;
      }
  }
   
   $('#ClickModalExamenConsulta').click();
}

function deleteCardExamenConsulta(id){

  let index;

  for (var i = 0; i < JSON_EXAMEN_CONSULTA.length; i++) {
       if (JSON_EXAMEN_CONSULTA[i].id == id) {
          index=i;
       }
  }

  if (index != '' || index != null || index != 'undefined') {
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
        JSON_EXAMEN_CONSULTA.splice(index,1);
        node=document.getElementById("pintarCardExamenConsulta"+id);    
        node.parentNode.removeChild(node);
        index='';
      }
    })
  }
}

function terminar(){ 

  let route='SetConsultation';
  let datos={
      "medical_consultation_id":getD('PacienteConsultaID'),
      "doctor_id":getD('DoctorID'),
      "descripcion":getD('descripcionConsulta'),
      "file":getD('fileEstudiosRealizado'),
      "hallazgo":getD('hallazgosExamen'),
      "admision":getOption('admisionConsulta'),
      "diagnostico":getD('diagnosticoConsulta'),
      "patologia":getD('patologiaConsulta'),
      "json_medicamento":JSON_MEDICAMENTO_CONSULTA,
      "json_cuidado":JSON_CUIDADO_CONSULTA,
      "json_examen":JSON_EXAMEN_CONSULTA,
      "fecha_justificativo":getD('daterangeJustificativo'),
      "description_justificativo":getD('descriptionJustificativo')
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
          

          $("#sw-domingo").empty();
          $("#sw-lunes").empty();
          $("#sw-martes").empty();
          $("#sw-miercoles").empty();
          $("#sw-jueves").empty();
          $("#sw-viernes").empty();
          $("#sw-sabado").empty();

          let route='listAppointment';
          controlador(route, week,'POST',function(data){
              console.log(data);
              pintarListaCitas(data);
          });

      });
    }
  })
}

function getFecha(fecha){
  let arrayFechaHora = fecha.split(" ");
  return formatdatei(arrayFechaHora[0].trim());
}

function getHora(fecha){
  let arrayFechaHora = fecha.split(" ");
  return tConvert(arrayFechaHora[1].trim());
}

function pintarListaPatient(data){

  $("#diary-users").empty();

  for (var i = 0; i < data.length; i++) {
    
  var arrayFechaHora = data[i].agreeded_date.split(" ");
  var fecha = arrayFechaHora[0].trim();
  var hora = arrayFechaHora[1].trim();

  var arrayName = data[i].name.split(" ");
  var name = arrayName[0].trim();
  
  var arrayLastName = data[i].last_name.split(" ");
  var last_name = arrayLastName[0].trim();

  
    $("#diary-users").append(`
        <a onclick="consultaPatient('${data[i].medical_consultation_id}')" href="javascript:;">
          <div class="row mb-3 " style="">
              <div class="col-4 ">
                <div style="border-top: 2px dashed #ff9d00" class="text-center">
                    <span class="text-s"><strong> ${tConvert(hora)}</strong></span>
                </div>
              </div>
              <div class="col-8" style="border-left: 6px solid #ff9d00; border-radius: 5px; background-color: #faead1">
                <div class="media padding-superior-10" style="">
                  <img src="${asset_global}img/avatars/${data[i].cedula}.jpg" class="rounded-circle mr-2" alt="${name}" width="45" height="45">
                  <div class="media-body ml-3">                  
                    <span class="text-p" style="">${last_name}, ${name}</span><br>
                    <span class="text-p" style="">${formatdatei(fecha)}</span><br>
                    <span class="text-p" style=""><strong>${data[i].reason}</strong></span>
                  </div>
                </div>  
            </div>
          </div>
        </a>
      `);
  }
}

function consultaPatient(medical_consultation_id){

  let route='VerificarConsulta';
  controlador(route, {'medical_consultation_id':medical_consultation_id},'POST',function(data){     
      console.log(data);
      $("#sw-container").empty().append(fromInformePatient(data));
  });

}

function PatientTrackingOrdenes(clinical_case_id) {
    
    setD('clinical_case_id',clinical_case_id);
    $("#DomPatientTracking").empty().load("/medical_order_anamnesis", function(){
        console.log('Vista Completa');
        $("#btnPacientTracking").removeClass('none');
         // Daterangepicker
        $("#MedicamentoFechaRango").daterangepicker({
            opens: "center",
            locale: {
              format: 'DD/MM/YYYY'
            }
        });

        let route='GetOrdenesMedicas';
        let datos={"id":clinical_case_id,"doctor_id":getD('doctor_id')};
        console.log(datos)
        controlador(route, datos,'POST',function(data){
            console.log('GetOrdenesMedicas',data);

            for (var i = 0; i < data.health_cares.length; i++) {
              
              $("#DomOrderCuidadoCard").append(`
                <div class="card shadow card-mb-5 card-border" id="pintarCardCuidado${data.health_cares[i].id}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6"><h5 class="card-title mb-0 text-p">${data.health_cares[i].description}</h5></div>
                            <div class="col-6 text-right"><span class="" onclick="deleteCardCuidado('${data.health_cares[i].id}');" style="margin-right: 15px;"><i class="align-middle far fa-fw fa-trash-alt"></i></span><span class=""  onclick="editCardCuidado('${data.health_cares[i].id}');" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
                            <!-- <div class="col-12 text-right"><span class="btn-floating float-right text-p">Inicio - Fin</span></div> -->
                            <div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr ${data.health_cares[i].last_name}</h5></div>
                        </div>
                    </div>
                </div>`);
            }

            for (var i = 0; i < data.medications.length; i++) {
              
              var arrayStart_time = data.medications[i].start_time.split(' ');
              var fecha_inicio = arrayStart_time[0].trim();
              var arrayEnd_time = data.medications[i].end_time.split(' ');
              var fecha_fin = arrayEnd_time[0].trim();

              $("#DomOrderMedicationCard").append(`
                   <div class="card shadow card-mb-5 card-border" id="pintarCardMedicamento${data.medications[i].id}">
                     <div class="card-body">
                       <div class="row">
                         <div class="col-6"><h5 class="card-title mb-0 text-p">${data.medications[i].name}</h5></div>
                         <div class="col-6 text-right"><span class="" onclick="deleteCardMedicamento('${data.medications[i].id}');" style="margin-right: 15px;"><i class="align-middle far fa-fw fa-trash-alt"></i></span><span class="" onclick="editCardMedicamento('${data.medications[i].id}');" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
                         <div class="col-6"><h5 class="mb-0 text-p">${data.medications[i].dose} mg <span class="ml-3 text-s"> ${data.medications[i].frequency}/d</span></h5></div>
                         <div class="col-12 padding-0 text-right"><span class="btn-floating float-right text-p">${data.medications[i].observacion}</span></div>
                         <div class="col-12 text-right"><span class="btn-floating float-right text-p">${formatdatei(fecha_inicio)} - ${formatdatei(fecha_fin)}</span></div>
                         <div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr ${data.medications[i].last_name}</h5></div>
                       </div>
                     </div>
                   </div>
               `);
            }


            for (var i = 0; i < data.medical_tests.length; i++) {
              $("#DomOrderExmaenCard").append(`
                <div class="card shadow card-mb-5 card-border" id="pintarCardExamen${data.medical_tests[i].id}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6"><h5 class="card-title mb-0 text-p">${data.medical_tests[i].test_type}</h5></div>
                            <div class="col-6 text-right"><span class=""  onclick="deleteCardExamen('${data.medical_tests[i].id}');" style="margin-right:15px;"><i class="align-middle far fa-fw fa-trash-alt"></i></span><span class=""  onclick="editCardExamen('${data.medical_tests[i].id}');" style=""><i class="align-middle far fa-fw fa-edit"></i></span></div>
                            <div class="col-12 text-right"><span class="btn-floating float-right text-p">${data.medical_tests[i].reason}</span></div>
                            <div class="col-12 text-right"><h5 class="mb-0 text-p text-s">Dr ${data.medical_tests[i].last_name}</h5></div>
                        </div>
                    </div>
                </div>`);
            }


        });

    });

}

function btnPacientTracking() {
  setD('clinical_case_id','');
  window.location='/patient-tracking';
}


function terminarConsultation(){

  let route='SetConsultation';
  let datos={
      "medical_consultation_id":getD('PacienteConsultaID'),
      "doctor_id":getD('DoctorID'),
      "descripcion":getD('descripcionConsulta'),
      "file":getD('fileEstudiosRealizado'),
      "hallazgo":getD('hallazgosExamen'),
      "admision":getOption('admisionConsulta'),
      "diagnostico":getD('diagnosticoConsulta'),
      "patologia":getD('patologiaConsulta'),
      "json_medicamento":JSON_MEDICAMENTO_CONSULTA,
      "json_cuidado":JSON_CUIDADO_CONSULTA,
      "json_examen":JSON_EXAMEN_CONSULTA,
      "fecha_justificativo":getD('daterangeJustificativo'),
      "description_justificativo":getD('descriptionJustificativo')
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



function allergiesDiseases(){
  
  let datos={
      "person_id":getD('PersonaID')
  }

  let route='GetAllergiesDiseases';
  controlador(route, datos,'GET',function(data){   
      let html='';
      $("#centeredModalMedicamentosConsultaAlergias").empty();
      $("#centeredModalMedicamentosConsultaEnfermdadBase").empty();
      for (var i = 0; i < data.length; i++) {
        if(data[i].name == 'Alergia'){          
          
          html = data[i].description;
          $("#centeredModalMedicamentosConsultaAlergias").append(html);
        }else{
          html = data[i].name +' : '+data[i].description+'<br>';
          $("#centeredModalMedicamentosConsultaEnfermdadBase").append(html);
        }

      }
  });
  
}

function deleteCardMedicamento(id){  
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
        let route='DeleteMedicamento';
        controlador(route, {"id":id},'POST',function(data){    
          node=document.getElementById("pintarCardMedicamento"+id);    
          node.parentNode.removeChild(node);
        })
        
      }
    })  
}

function deleteCardCuidado(id){  
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
        let route='DeleteCuidado';
        controlador(route, {"id":id},'POST',function(data){    
          node=document.getElementById("pintarCardCuidado"+id);    
          node.parentNode.removeChild(node);
        })
        
      }
    })  
}

function deleteCardExamen(id){  
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
        let route='DeleteExamen';
        controlador(route, {"id":id},'POST',function(data){    
          node=document.getElementById("pintarCardExamen"+id);    
          node.parentNode.removeChild(node);
        })
        
      }
    })  
}