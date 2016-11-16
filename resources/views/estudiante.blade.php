@extends('layouts.app')
@section('title','Estudiante')
@section('content')


<style>
    #background {
        position: fixed;
        top: 58%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -100;
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
        background-size: cover;
    }



</style>

<div class="flex-center position-ref full-height">
    <video width="150%" height="10%" autoplay loop muted preload="none" id="background">
        <source src="../video/Lapse3.mp4" type="video/mp4" />
    </video>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-4 col-lg-5 " style="margin-top: -17%">
                <div class="panel panel-collapse" >
                    <div class="panel-heading">Estudiante</div>
                    <div class="panel-body" >
                        {!! Form::open(['route'=>'habitaciones.buscar', 'method'=>'POST','class'=>'form-horizontal']) !!}

                            <div class="form-group">
                                {!! Form::label('ubicacion','Ciudad',['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('ubicacion',$ciudades,null,['class'=>'form-control','placeholder'=>'Ciudad','required']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('universidades','Universidades Cercanas',['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::select('universidades[]',$universidades,null,['class'=>'form-control chosen-select','multiple','required']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('precio','Precio',['class'=>'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::number('precio',null,['class' => 'form-control','placeholder'=>'example: 500000','required']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('genero', 'Genero', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('genero',['hombre'=>'Hombre','mujer'=>'Mujer','lgbti'=>'Lgbti'],null,['class' => 'form-control','required','autofocus','placeholder'=>'Elige']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('tiempo', 'Tiempo', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    <select id="Tiempo" name="tiempo" class="form-control" required>
                                        <option value="seism">6 Meses</option>
                                        <option value="unoydos">Entre 1 a 2 Años</option>
                                        <option value="dosytres">Entre 2 a 3 Años</option>
                                        <option value="tresycuatro">Entre 3 a 4 Años</option>
                                        <option value="cuatroycinco">Entre 4 a 5 Años</option>
                                        <option value="cincomas">Mas de 5 Años</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-5">
                                    {!! Form::submit('Buscar',['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                            {{Form::close()}}
                    </div>
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
            placeholder_text_multiple: 'Seleccione universidades',
            
            no_results_text: 'No se encontraron Universidades'
        });

    </script>

@endsection