@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __("Champ Spécifiques")])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Champ Spécifiques') }}</h4>
                            <p class="card-category"> {{ __('Vous pouvez gérer vos champs spécifiques ici') }}</p>
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
                                    <a href="{{ route('typedocument.champ.create', ['id'=> $typedocument->id]) }}"
                                       class="btn btn-sm btn-primary d-inline-block mr-2">{{ __('Ajouter champ') }}</a>
                                    <a href="{{ back()->getTargetUrl() }}"
                                       class="btn btn-sm btn-primary d-inline-block">{{ __('Retour à la liste') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">

                                    <th>
                                        {{ __('Nom champ formulaire') }}
                                    </th>
                                    <th>
                                        {{ __('Slug champ') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($typedocument->ChampSpecifiques as $champ)
                                        <tr>
                                            <td>
                                                {{ $champ->libelle_champ }}
                                            </td>
                                            <td>
                                                {{ $champ->slug_champ }}
                                            </td>

                                            <td class="td-actions text-right">
                                                <form action="{{ route('champ.destroy', $champ) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" value="{{ $typedocument->id}}"
                                                           name="formulaire">
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                       href="{{ route('champ.edit', $champ) }}" data-original-title=""
                                                       title="modifier">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-link"
                                                            data-original-title="" title="supprimer"
                                                            onclick="confirm('{{ __("Etes vous sûr de supprimer cet champ du formulaire?") }}') ? this.parentElement.submit() : ''">
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