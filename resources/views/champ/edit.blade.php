@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __("Champ spécifique")])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('champ.update', $champSpecifique->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editer Champ formulaire') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ back()->getTargetUrl() }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                  </div>
                </div>

              <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Nom champ formulaire') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('libelle_champ') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('libelle_champ') ? ' is-invalid' : '' }}" name="libelle_champ" id="input-name" type="integer" placeholder="{{ __('champ spécifique') }}" value="{{ old('name', $champSpecifique->libelle_champ) }}" required="true" aria-required="true"/>
                        @if ($errors->has('libelle_champ'))
                         <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('libelle_champ') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Type champ spécifique') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('type') ? 'is-invalid' : '' }}">
                      <select class="form-control" id="example-select" name="type_champ">
                        <option value="text">Texte</option>
                        <option value="tel">Téléphone</option>
                        <option value="date">Date</option>
                        <option value="number">Nombre</option>
                        <option value="email">Email</option>
                        <option value="file">Fichier</option>
                        <option value="url">Url</option>
                        <option value="datetime-local">Date précise</option>
                      </select>
                      @if ($errors->has('type'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('type') }}</span>
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