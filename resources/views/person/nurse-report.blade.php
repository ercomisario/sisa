@isset($clinicalCaseActive->nurseReports)
  <!-- foreach -->
  @foreach($clinicalCaseActive->nurseReports as $nurseReport)
    <div class="row">                                                                                   
      <div class="col-sm-12 col-xl-12 col-lg-12">
        <div class="card-body" style="padding: 0.25rem">
          <div class="media d-block d-md-flex">
          <div class="card shadow text-center" style="border-radius: 1rem"><p class="text-s" style="margin: 10px; padding: 10px; ">{{$nurseReport->created_at}}<br> Enf. </p></div>
              <div class="media-body text-s text-center text-md-left ml-md-3 ml-0 evoluciones-text-expander" id=""><br>
                {{$nurseReport->observation}}
              </div>
            </div>
        </div>
      </div>
    </div>
    @endforeach
  <!-- endforeach -->
@endisset