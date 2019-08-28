@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __("Champ Spécifiques")])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Champ Formulaires') }}</h4>
                            <p class="card-category"> {{ __('Vous pouvez gérer vos formulaires spécifiques et les champs ici') }}</p>
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
                                    <a href="{{ route('typedocument.champ.create', $typeDocument->id) }}"
                                       class="btn btn-sm btn-primary">{{ __('Ajouter champ') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{__('Id champ')}}
                                    </th>

                                    <th>
                                        {{ __('Nom champ formulaire') }}
                                    </th>
                                    <th>
                                        {{ __('Slug champ') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\Models\ChampSpecifique::find($champs) as $champ)
                                        <tr>
                                            <td>
                                                {{$champ->id}}
                                            </td>
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

                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                       href="{{ route('champ.edit', $champ) }}" data-original-title=""
                                                       title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-link"
                                                            data-original-title="" title=""
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