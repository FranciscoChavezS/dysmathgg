@extends('adminlte::page')

@section('title', 'Dysmath')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')
 @if(session('info'))
        <div class="alert alert-success" role="alert">
            <strong>¡Éxito!</strong> {{session('info')}}
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <h1 class="h5">Nombre: </h1>
            <p class="form-control">{{$user->name}}</p>

            <h1 class="h5">Lista de roles</h1>

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

                @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{$role->name}}
                    </label>
                </div>
                   
                @endforeach

                {!! Form::submit('Asignar rol', ['class' => 'btn btn-outline-primary mt-2']) !!}

            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop