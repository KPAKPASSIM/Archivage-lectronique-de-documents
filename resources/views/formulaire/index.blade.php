@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __("Gestion des formulaires")])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Formulaires') }}</h4>
                <p class="card-category"> {{ __('Vous pouvez gérer vos formulaires spécifiques ici') }}</p>
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
                    <a href="{{ route('formulaire.create') }}" class="btn btn-sm btn-primary">{{ __('Ajouter formulaire') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{__('Id formulaire')}}
                      </th>
                      <th>
                          {{ __('Type document') }}
                      </th>
                      <th>
                        {{ __('Nom formulaire') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($formulaireTables as $formulaire)
                        <tr>
                            <td>
                                {{$formulaire->id}}
                            </td>
                          <td>
                              {{ $formulaire->typeDocument->libelle_type_document}}
                          </td>
                          <td>
                            {{ $formulaire->libelle_formulaire }}
                          </td>

                          <td class="td-actions text-right">
                              <form action="{{ route('formulaire.destroy', $formulaire) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('formulaire.edit', $formulaire) }}" data-original-title="" title="éditer formulaire">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('formulaire.show', ['id'=> $formulaire->id]) }}" data-original-title="" title="Voir les champs">
                                      <i class="material-icons">info</i>
                                      <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="supprimer" onclick="confirm('{{ __("Etes vous sûr de supprimer cet formulaire?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>

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