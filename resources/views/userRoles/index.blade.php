@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __("Rôle par utilisateur")])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Gestion des rôles par Utilisateur') }}</h4>
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
                                    <a href="{{ route('role.create') }}"
                                       class="btn btn-sm btn-primary">{{ __('Ajouter rôle') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">

                                    <th>
                                        {{ __('Email') }}
                                    </th>
                                    <th>
                                        {{ __('Rôle') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    {{$role->name}}
                                                @endforeach
                                            </td>
                                            <td class="td-actions text-right">

                                                <form action="{{ route('userRole.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                       href="{{ route('userRole.edit',  $user) }}"
                                                       data-original-title="" title="modifier">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-link"
                                                            data-original-title="" title="supprimer"
                                                            onclick="confirm('{{ __("Etes vous sûr de supprimer cet rôle?") }}') ? this.parentElement.submit() : ''">
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