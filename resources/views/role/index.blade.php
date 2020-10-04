@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>List Role</h2></div>

                <div class="card-body">
                    @can('haveaccess','role.create')
                    <a href="{{ route('role.create') }}" class="btn btn-success float-right">Nuevo</a>
                    @endcan
                    <br><br>
                    @include('common.message')

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Acesso Completo</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id }}</th>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->slug }}</td>
                                <td>{{ $role->description }}</td>
                                @if ($role['full-access'] == 'yes')
                                <td><span class="badge badge-success">{{ $role['full-access'] }}</span></td>
                                @else
                                <td><span class="badge badge-danger">{{ $role['full-access'] }}</span></td>
                                @endif

                                <td>
                                    @can('haveaccess','role.show')
                                    <a href="{{ route('role.show',$role->id) }}" class="btn btn-sm btn-warning">Ver</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('haveaccess','role.edit')
                                    <a href="{{ route('role.edit',$role->id) }}" class="btn btn-sm btn-info">Editar</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('haveaccess','role.destroy')
                                    <form action="{{ route('role.destroy',$role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Eliminar</button>

                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection