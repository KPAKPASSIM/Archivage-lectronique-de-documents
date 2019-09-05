@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __("Gestion des archives")])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Archives') }}</h4>
                <p class="card-category"> {{ __('Vous pouvez gérer vos archives ici') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                   @can('create document')
                    <a href="{{ route('document.create') }}" class="btn btn-sm btn-primary">{{ __('Ajouter document') }}</a>
                   @endcan
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Titre document') }}
                      </th>
                      <th>
                        {{ __('Nom auteur') }}
                      </th>
                      <th>
                        {{ __('Date archivage') }}
                      </th>
                    <tbody>
                      @foreach($documents as $document)
                        <tr>
                          <td>
                            {{ $document->titre_document }}
                          </td>
                          <td>
                            {{ $document->nom_auteur }}
                          </td>
                          <td>
                            {{ (new \Carbon\Carbon($document->created_at))->format('Y-m-d') }}
                          </td>
                          <td class="td-actions text-right">
                              <form action="{{ route('document.destroy', ['id'=> $document->id]) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  @can('edit document')
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('document.edit', ['id'=> $document->id]) }}" data-original-title="" title="Modifier">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                      <a rel="tooltip" class="btn btn-success btn-link" href="{{asset('/documents/' . $document->fichier_joint)}}" target="_blank" data-original-title="" title="Visualiser ">
                                          <i class="material-icons">info</i>
                                          <div class="ripple-container"></div>
                                      </a>
                                  @endcan
                                  @can('delete document')
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="Supprimer" onclick="confirm('{{ __("Etes vous sûr de supprimer cette archive?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                                   @endcan
                              </form>
                              </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection