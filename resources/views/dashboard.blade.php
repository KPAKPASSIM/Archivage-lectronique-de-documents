@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Courrier arrivé</p>
              <h3 class="card-title">{{ $courrierArrive}}
              </h3>
                <a rel="tooltip" class="btn btn-success btn-link" href="{{url('affichage/1') }}" data-original-title="" title="Voir les documents">
                    <i class="material-icons">info</i>
                    <div class="ripple-container"></div>
                </a>
            </div>
            <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">date_range</i>
                  Last 24 Hours
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Courrier départ</p>
              <h3 class="card-title">{{ $courrierDepart }}
              </h3>
                <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('affichage/2') }}" data-original-title="" title="Voir les documents">
                    <i class="material-icons">info</i>
                    <div class="ripple-container"></div>
                </a>
            </div>
            <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">date_range</i> Last 24 Hours
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Contrat Client</p>
              <h3 class="card-title">{{$contratClient}}
              </h3>
                <a rel="tooltip" class="btn btn-success btn-link" href="{{  url('affichage/3') }}" data-original-title="" title="Voir les documents">
                    <i class="material-icons">info</i>
                    <div class="ripple-container"></div>
                </a>
            </div>
            <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">date_range</i> Last 24 Hours
                <a href="#pablo"></a>
              </div>
            </div>
          </div>
        </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Facture</p>
              <h3 class="card-title">{{$facture}}</h3>
                <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('affichage/7') }}" data-original-title="" title="Voir les documents">
                    <i class="material-icons">info</i>
                    <div class="ripple-container"></div>
                </a>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last 24 Hours
              </div>
            </div>
          </div>
        </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                      <div class="card-icon">
                          <i class="material-icons">content_copy</i>
                      </div>
                      <p class="card-category">Contrat personnel</p>
                      <h3 class="card-title">{{$contratPersonnel}}
                      </h3>
                      <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('affichage/5')}}" data-original-title="" title="Voir les documents">
                          <i class="material-icons">info</i>
                          <div class="ripple-container"></div>
                      </a>
                  </div>
                  <div class="card-footer">
                      <div class="stats">
                          <i class="material-icons">date_range</i> Last 24 Hours
                          <a href="#pablo"></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                      <div class="card-icon">
                          <i class="material-icons">content_copy</i>
                      </div>
                      <p class="card-category">Contrat Prestataire</p>
                      <h3 class="card-title">{{$contratPrestaire}}
                      </h3>
                      <a rel="tooltip" class="btn btn-success btn-link" href="{{ url('affichage/4') }}" data-original-title="" title="Voir les documents">
                          <i class="material-icons">info</i>
                          <div class="ripple-container"></div>
                      </a>
                  </div>
                  <div class="card-footer">
                      <div class="stats">
                          <i class="material-icons">date_range</i> Last 24 Hours
                      </div>
                  </div>
              </div>
          </div>
      </div>

    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
