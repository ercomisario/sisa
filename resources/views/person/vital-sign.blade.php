  @isset($clinicalCaseActive->vitalSigns)
    <div class="row">
      <div class="col-sm-3 col-xl-3 col-lg-3 text-center">
        <h4 class="tab-title text-s">Fecha - Hora - Enfermera</h4>
      </div>
      <div class="col-sm-2 col-xl-2 col-lg-2  text-center">
        <h4 class="tab-title text-s">Temperatura</h4>
      </div>
      <div class="col-sm-2 col-xl-2 col-lg-2  text-center">
        <h4 class="tab-title text-s">Pulso</h4>
      </div>
      <div class="col-sm-2 col-xl-2 col-lg-2  text-center">
        <h4 class="tab-title text-s">Respiración</h4>
      </div>
      <div class="col-sm-3 col-xl-3 col-lg-3  text-center">
        <h4 class="tab-title text-s">TensiónArterial</h4>
      </div>
  </div>
  @foreach($clinicalCaseActive->vitalSigns as $vitalSign)
  <!-- foreach() -->
    <div class="shadow mb-2" style="border-radius: 1rem;">
      <div class="row">
        <div class="col-sm-3 col-xl-3 col-lg-3 text-center">
          <h5 class="tab-title text-s">
          <p style="margin: 10px; padding: 10px; ">{{$vitalSign->created_at}}<br> Enf. </p>
          </h5>
        </div>
        <div class="col-sm-2 col-xl-2 col-lg-2 align-self-center text-center">
        <h4 class="tab-title text-s">{{$vitalSign->temperatura}}</h4>
        </div>
        <div class="col-sm-2 col-xl-2 col-lg-2 align-self-center text-center">
        <h4 class="tab-title text-s">{{$vitalSign->pulse}}</h4>
        </div>
        <div class="col-sm-2 col-xl-2 col-lg-2 align-self-center text-center">
          <h4 class="tab-title text-s">{{$vitalSign->respiratory_rate}}</h4>
        </div>
        <div class="col-sm-3 col-xl-3 col-lg-3 align-self-center text-center">
        <h4 class="tab-title text-s">{{$vitalSign->max_t}}/{{$vitalSign->min_t}}</h4>
        </div>
      </div>
    </div>
  <!-- endforeach -->
  @endforeach
@endisset