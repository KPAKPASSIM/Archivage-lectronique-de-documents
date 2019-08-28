@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __("Champ spécifiques")])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('champ.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Ajouter champ') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('typedocument.show',['id'=>$typeDocument->id]) }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                  </div>
                </div>
                <input type="hidden" value="{{$typeDocument->id}}" name="type_documents_id"/>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nom champ spécifique') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('libelle_champ') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="libelle_champ" id="input-name" type="text" placeholder="{{ __('champ spécifique') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('libelle_champ') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Type champ spécifique') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('type') ? 'is-invalid' : '' }}">
                      <select class="form-control" id="example-select" name="type">
                        <option value="text">Texte</option>
                        <option value="tel">Téléphone</option>
                        <option value="date">Date</option>
                        <option value="number">Nombre</option>
                        <option value="email">Email</option>
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
                <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection