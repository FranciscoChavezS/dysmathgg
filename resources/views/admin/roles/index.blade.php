@extends('adminlte::page')

@section('title', 'Dysmath')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success" role="alert">
            <strong>Éxito!</strong> {{session('info')}}
        </div>
    @endif

    <div class="card">

        <div class="card-header">
            <a href="{{route('admin.roles.create')}} " class="btn btn-outline-primary">Añadir nuevo rol</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Permisos</th>
                        <th>Fecha de Creación</th>
                        <th>Acciones</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>
                                @forelse ($role->permissions as $permission)
                                    <span class="badge badge-info" >{{ $permission->name }}</span>
                                @empty
                                    <span class="badge badge-danger">Permisos no añadidos</span>
                                @endforelse
                              </td>
                            <td class="text-secondary">{{ $role->created_at->toFormattedDateString() }}</td>
                            <td width="5px" ><a href="{{route('admin.roles.edit', $role)}}" class="btn btn-secondary"><i class="fas fa-edit"></i></a></td>
                            <td width="5px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @method('delete')
                                    @csrf
    
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4">No hay roles registrados.</td>
                    </tr>
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop