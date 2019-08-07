@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __("Type document")])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Type document') }}</h4>
                            <p class="card-category"> {{ __('Vous pouvez gérer vos type document ici') }}</p>
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
                                    <a href="{{ route('typedocument.create') }}"
                                       class="btn btn-sm btn-primary">{{ __('Ajouter type document') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{__('Id type document')}}
                                    </th>
                                    <th>
                                        {{ __('Nom type document') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($typeDocuments as $type)
                                        <tr>
                                            <td>
                                                {{ $type->id }}
                                            </td>
                                            <td>
                                                {{ $type->libelle_type_document }}
                                            </td>
                                            <td class="td-actions text-right">

                                                <form action="{{ route('typedocument.destroy', $type->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                       href="{{ route('typedocument.edit', $type) }}"
                                                       data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-link"
                                                            data-original-title="" title=""
                                                            onclick="confirm('{{ __("Etes vous sûr de supprimer cet type?") }}') ? this.parentElement.submit() : ''">
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