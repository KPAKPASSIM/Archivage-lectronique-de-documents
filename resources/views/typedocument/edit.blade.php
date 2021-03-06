@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __("Type document")])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('typedocument.update', ['id'=>$typeDocument->id]) }}"
                          autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Editer type document') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('typedocument.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nom type document') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('libelle_type_document') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="libelle_type_document" id="input-name" type="text"
                                                   placeholder="{{ __('Type document') }}"
                                                   value="{{ old('libelle_type_document', $typeDocument->libelle_type_document) }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Sauvegarder') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection