@extends('layouts.app')
@section('title','Registro')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar</div>
                <div class="panel-body">
                    {!! Form::open(['route'=>'users.store', 'method'=>'POST','class'=>'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('nombre',null,['class' => 'form-control','required','autofocus']) !!}
                            </div>
                        </div>
                         <div class="form-group">
                            {!! Form::label('apellido', 'Apellido', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('apellido',null,['class' => 'form-control','required','autofocus']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('tipo_id', 'Tipo ID', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('tipo_id',['CC' => 'Cedula de Ciudadania', 'CE' => 'Cedula Extranjera'],null,['class' => 'form-control','required','autofocus','placeholder'=>'Elige']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('numId', 'Numero ID', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('numId',null,['class' => 'form-control','required','autofocus']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('genero', 'Genero', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('genero',['hombre'=>'Hombre','mujer'=>'Mujer','lgbti'=>'Lgbti'],null,['class' => 'form-control','required','autofocus','placeholder'=>'Elige']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('tipo_usuario', 'Eres', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('tipo_usuario',['arrendatario'=>'Estudiante','arrendador'=>'Arrendador'],null,['class' => 'form-control','required','autofocus','placeholder'=>'Elige']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email',null,['class' => 'form-control','required','autofocus']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password',['class' => 'form-control','required','autofocus']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('repeat_password', 'Confirm Password', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('repeat_password',['class' => 'form-control','required','autofocus']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('universidades','Características',['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                    {!! Form::select('caracteristicas[]',$caracteristicas,null,['class'=>'form-control chosen-select','multiple','required']) !!}
                            </div>
                        </div>

                        <br>



                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Registrarse',['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                      {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('.chosen-select').chosen({
            width: "60%",
            placeholder_text_multiple: 'Seleccione las características que desee',
            search_contains: true,
            no_results_text: 'No se encontraron características'
        });

    </script>

@endsection
