<div class="col-sm-12 col-xl-12 col-lg-12">
    <div class="card card-mb-10 card-border">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1 col-xl-1 col-lg-1 text-center">
                    <img src="{{asset('img/avatars/'.$patient->cedula.'.jpg')}}" class="avatar rounded-circle mr-1" alt="{{$patient->name}}">
                    </div>
                <div class="col-sm-2 col-xl-2 col-lg-2 text-center">{{$patient->cedula}}</div>
                <div class="col-sm-2 col-xl-2 col-lg-2 text-center">{{$patient->name}}</div>
                <div class="col-sm-2 col-xl-2 col-lg-2 text-center">{{$patient->sexo}}</div>
                <div class="col-sm-2 col-xl-2 col-lg-2 text-center">{{$patient->age}}</div>
                <div class="col-sm-2 col-xl-2 col-lg-2 text-center">{{$patient->birthday}}</div>
                <div class="col-sm-1 col-xl-1 col-lg-1 text-center">
                <form action="{{route('patient')}}" method="post">
                    @csrf
                    <input hidden name="patient_id" value="{{$patient->id}}">
                    <button class="btn  btn-warning" style=""> Ver</button>    
                </form>    
                
                </div>
            </div>
        </div>
    </div>
</div>