@extends('layouts.app')
@section('title','Gestión de Citas')
@section('content')
	@component('components.navbar',['user'=>$user, 'person'=>$person])
	@endcomponent
	@component('components.sidebar',['user' => $user])
	@endcomponent
<main class=" container-fluid padding-lateral-0">
			<div class="bg-white shadow">
				<div class="row no-gutters">
					<div class="col-lg-1  d-none d-sm-inline-block identifier-view-1"  style="">
					</div>
					<div class="col-lg-3  d-none d-sm-inline-block text-center identifier-view-2" style="">
						<span class="text-identifier-view"><strong>Gestión de Citas</strong></span>
					</div>
					<div class="col-12  bg-white">
						<div class="col-sm-12 col-xl-12 col-lg-12">
							<div class="row no-gutters align-self-center  mt-3">
								<div class="col-sm-12 col-xl-12 col-lg-12">
									<div class="card-body">
										<div class="row no-gutters">
											<div class="col-sm-2 col-xl-2 col-lg-2 text-center mb-3 mt-1">
	                      <img src="{{asset('img/avatars/'.$person->cedula.'.jpg')}}" width="85" height="85" class="rounded-circle" alt="{{$person->name}}">
											</div>
											<div class="col-sm-10 col-xl-10 col-lg-10">
												<div class="row">
													<div class="col-lg-3">
	                           <p class="text-p" style="font-size: 1rem"><strong>{{$person->name}}</strong></p><p class="text-s"><strong>C.I:</strong> {{$person->cedula}}</p>
													</div>
													<div class="col-lg-3 btn-crear-cita align-items-center">
														<a class="btn btn-primario shadow" href="{{url('patientForm')}}"><strong>Crear Cita</strong></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>	
				</div>
			</div>
	<div class="row mt-5 pt-2 pb-2 row-content">
			<div class="col-3">
					<div id="my-calendar" class="rounded mb-4"></div>
					<div class="form-group">
						<label for="busqueda-avanzada"></label>
							<!--<input type="text" name="busqueda-avanzada" id="busqueda-avanzada" class="form-control" placeholder="Búsqueda Avanzada de Citas...">-->
					</div>
				</div>
				<div class="col-9 border-left align-items-center">
					<div class="row mb-4">
						<div class="col-9 text-s text-identifier-view">
							<span class="titulo-lista-consulta"><strong>Consultas <span class="appointment-day"></span></strong></span>	
						</div>
						<div class="col text-s">
							<!--<span><strong>Sortear por...</strong></span>-->
						</div>	
					</div>
					<div class="row">
						<div class="col appointment-card-list">
							<!-- APPOINTMENT CARD GOES HERE -->
						</div>
					</div>
				</div>			
		</div>
</main>
	<script type="application/javascript">
        $(document).ready(function () {
			var semana = new Array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado');
            $("#my-calendar").zabuto_calendar({today:true,cell_border:false,language:"es",action: function () {
                return myDateFunction(this.id, false);
            }});
            myDateFunction(this.id);
            function myDateFunction(id) {
              var date = $("#" + id).data("date");
			  var hasEvent = $("#" + id).data("hasEvent");
			  
			  if(date == undefined){
				$('.appointment-day').text("Hoy, "+semana[new Date().getDay()]+" "+new Date().getDate());
			  }else{
				  $('.appointment-day').text("para el día "+semana[new Date("'"+date+"'").getDay()]+" "+new Date("'"+date+"'").getDate());
			  }

            	$.get('secretaryAppointmentList',{'fecha':date},function(response){	
            		var appointments = JSON.parse(response);
					var html = '';
					
					if(appointments.success){
						appointments.response.forEach(function(appointment){
							//console.log(appointment);
							html += "<div class='row appointment-card'>";
							html +=	"<div class='col-2'>";
							html+="<div class='row row-hour'>";
							html+="<span class='hour-in-row' >"+appointment.appointment_time+"</span>";
							html+="</div>";
							html+="</div>";
							html+="<div class='col-9'>";
							html+="<div class='row rounded-lg shadow p-3 mb-5 bg-white h-75 w-100'>";
							html+="<div class='col d-flex align-content-center flex-wrap justify-content-center'>";
							html+="<img src='img/avatars/"+appointment.patient_cedula+".jpg' alt='' class='rounded-circle' style='height: 70px; width: 70px; background-color: #12375c;'>";
							html+="</div>";
							html+="<div class='col-6'>";
							html+="<p><strong>Paciente: </strong>"+appointment.patient_last_name+" "+appointment.patient_name+"</p>";
							html+="<p><strong>Dr. </strong>"+appointment.doctor_last_name+" "+appointment.doctor_name+"</p>";
							html+="<p><strong>"+appointment.doctor_specialty+"</strong></p>";
							html+="</div>";
							html+="<div class='col'>";
							html+="<i class='far fa-fw fa-edit icon-top-right' style='cursor:pointer'></i>";
							html+="</div>";
							html+="</div>";
							html+="</div>";
							html +="</div>";
						});
						$('.appointment-card-list').html(html);
						$('.appointment-card').hide().each(function(index){
							$(this).delay(700 * index).fadeIn(300);
							//console.log(index);
						});

					}else{
						html = "<div class='col text-p'><span>No existen citas para este día.</span></div>";
						$('.appointment-card-list').html(html);
						console.log("No Appointments this day");
					}
            	})
            }
            $('	.table tr td').css('background-color','#f5f5f5');
            $('.table td').css('border','none');
            $('.table tr.calendar-dow-header th').css('background-color','#f5f5f5');
            $('.badge-today').addClass('rounded-pill').css('background-color','#12375c');
			
        });
    </script>
    <style>
    	.icon-top-right{
    		color: #5c92c8;
    		position:absolute;
    		top:0;
    		right: 0;
    	}
    	.row-content{
    		padding-right: 50px;
    		padding-left: 50px;
    		margin-right:0px;
    		margin-left:0px;
    	}
    	.row-hour{
    		border-top: 2px dashed orange;
    		margin-right: 10px;
    		margin-left:10px;
    	}
    	.hour-in-row{
    		color:orange;
    		position: absolute;
    		right: 30px;
    	}
    	.btn-crear-cita{
    		position: absolute;
    		right: 0;
    		top:30px;
    	}
    </style>
@endsection