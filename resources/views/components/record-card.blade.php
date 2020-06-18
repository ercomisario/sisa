<div class="col-sm-12 col-xl-12 col-lg-12">
		<div class="card card-mb-10">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3 col-xl-3 col-lg-3">
						<span class="text-s">{{$clinicalCase->created_at}}</span>
					</div>
					<div class="col-sm-2 col-xl-2 col-lg-2">
						<span class="text-s">{{$clinicalCase->pathology}}</span>
					</div>
					<div class="col-sm-3 col-xl-3 col-lg-3">
					<span class="text-s">{{$clinicalCase->medicalCenter}}</span>
					</div>
					<div class="col-sm-2 col-xl-2 col-lg-2">
						<span class="text-s">{{$clinicalCase->doctor}}</span>
					</div>
					<div class="col-sm-2 col-xl-2 col-lg-2 text-center">
						<form action="{{route('clinicalCase')}}" method="post">
							@csrf
							<input hidden name="clinicalCase_id" value="{{$clinicalCase->id}}">
							<input hidden name="patient_id" value="{{$patient_id}}">
							<button class="btn  btn-warning" style=""> Ver</button>    
						</form>
					</div>
				</div>
			</div>
		</div>
</div>