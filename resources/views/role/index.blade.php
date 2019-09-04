@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __("Type document")])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Gestion des rôles') }}</h4>
                            <p class="card-category"> {{ __('Vous pouvez gérer les rôles ici') }}</p>
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
                                    @can('create role')
                                    <a href="{{ route('role.create') }}"
                                       class="btn btn-sm btn-primary">{{ __('Ajouter rôle') }}
                                    </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">

                                    <th>
                                        {{ __('Rôle') }}
                                    </th>

                                    <th>
                                        {{ __('Permissions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>
                                                {{ $role->name }}
                                            </td>
                                            <td>
                                            @foreach($role->permissions as $permission)
                                                {{$permission->name}}
                                            @endforeach
                                            </td>
                                            <td class="td-actions text-right">

                                                <form action="{{ route('role.destroy', $role->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                     @can('edit role')
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                       href="{{ route('role.edit',  $role->id) }}"
                                                       data-original-title="" title="modifier">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    @endcan
                                                    @can('delete role')
                                                    <button type="button" class="btn btn-danger btn-link"
                                                            data-original-title="" title="supprimer"
                                                            onclick="confirm('{{ __("Etes vous sûr de supprimer cet rôle?") }}') ? this.parentElement.submit() : ''">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                        @endcan
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