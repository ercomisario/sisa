
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xl-4 col-lg-4 mb-3">
                <h4 class="mb-3 text-s" style="padding-right: 12px"><strong>Medicamentos</strong> <span class="btn-agg-order btn-floating float-right" data-toggle="modal" data-target="#centeredModalMedicamentos" id="ClickModalMedicamentos" onclick="allergiesDiseases()"> <i class="align-middle fas fa-plus "></i> </span></h4>
                @component('components.order-medication-card')
                    
                @endcomponent
            </div>
            <div class="col-sm-4 col-xl-4 col-lg-4 mb-3">
                <h4 class="mb-3 text-s" style="padding-right: 12px"><strong>Cuidados</strong> <span class="btn-agg-order btn-floating float-right" data-toggle="modal" data-target="#centeredModalCuidados" id="ClickModalCuidados">  <i class="align-middle fas fa-plus "></i> </span></h4>
                @component('components.order-healthcare-card')
                @endcomponent
            </div>
           <!--  <div class="col-sm-4 col-xl-4 col-lg-4 mb-3">
                <h4 class="mb-3 text-s" style="padding-right: 12px"><strong>Interconsultas</strong> <span class="btn-agg-order btn-floating float-right"  data-toggle="modal" data-target="#centeredModalInterconsulta"  id="ClickModalInterconsulta"> <i class="align-middle fas fa-plus "></i> </span></h4>
                @component('components.order-referral-card')
                    
                @endcomponent
            </div> -->
            <div class="col-sm-4 col-xl-4 col-lg-4 mb-3">
                <h4 class="mb-3 text-s" style="padding-right: 12px"><strong>Exámenes</strong> <span class="btn-agg-order btn-floating float-right" data-toggle="modal" data-target="#centeredModalExamen" id="ClickModalExamen"> <i class="align-middle fas fa-plus "></i> </span></h4>
                @component('components.order-medical-tests-card')

                @endcomponent
            </div>
        </div>
    </div>

    @include('person.medical-order-modal')