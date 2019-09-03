@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __("Gestion de l'utilisateur")])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('document.store') }}" autocomplete="off" enctype="multipart/form-data"
                          class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Archiver Document') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('document.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Titre document') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('titre') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}"
                                                   name="titre" id="input-titre" type="text"
                                                   placeholder="{{ __('Titre') }}" value="{{ old('titre') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('titre'))
                                                <span id="titre-error" class="error text-danger"
                                                      for="input-titre">{{ $errors->first('titre') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nom auteur') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="nom_auteur" id="input-nom_auteur" type="text" placeholder="{{ __('Nom') }}"
                                                   value="{{ old('nom_auteur') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('nom_auteur'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-nom_auteur">{{ $errors->first('nom_auteur') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Date document') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="date_document" id="input-date_document" type="date"
                                                   placeholder="{{ __('date document') }}" value="{{ old('date_document') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('date_document'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-date_document">{{ $errors->first('date_adocument') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Adresse auteur') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="adresse_auteur" id="input-adresse_auteur" type="text"
                                                   placeholder="{{ __('Adresse') }}" value="{{ old('adresse_auteur') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('adresse_auteur'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-adresse_auteur">{{ $errors->first('adresse_auteur') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Reference document') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="reference" id="input-reference" type="text"
                                                   placeholder="{{ __('reference') }}" value="{{ old('reference') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('reference'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-date_archivage">{{ $errors->first('reference') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Date archivage') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="date_archivage" id="input-date_archivage" type="date"
                                                   placeholder="{{ __('date archivage') }}" value="{{ old('date_archivage') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('date_archivage'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-date_archivage">{{ $errors->first('date_archivage') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Importer Document') }}</label>
                                    <div class="col-sm-7">
                                        <input type="file" id="example-fileinput" class="form-control-file" name="fichier_joint">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Type document') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <select class="form-control" required id="typedoc" name="type_documents_id">
                                                <option value=""></option>
                                                @foreach($typeDocuments as $typeDocument)
                                                    <option value="{{ $typeDocument->id }}">{{ $typeDocument->libelle_type_document }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div id="formspecifique">

                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(function () {
            $("#typedoc").change(function () {
                var typeValue = $('#typedoc').val();
                $.ajax({
                    url: '{{ route('api.champs.specifiques') }}' + '?id=' + typeValue,
                    dataType: 'json',
                    type: 'GET',
                    success: function (data, status) {
                        var html = '';
                        data.forEach( function (value) {
                           html += '<div  class="row" >' +
                               '<label class="col-sm-2 col-form-label">' + value.libelle_champ + '</label>' +
                                '<div class="col-sm-7">' +
                                '<input type="'+ value.type_champ + '" class="form-control" name="'+ value.slug_champ +'">' +
                                '</div></div>' ;
                        });
                        $('#formspecifique').html(html);
                    },
                    error: function () {

                    }
                });
            });
        });
    </script>
@endpush