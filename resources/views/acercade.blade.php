@extends('layouts.app')
@section('title','Contactanos')
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
    <!-- <body> -->
    <!-- <div class="flex-center position-ref full-height" > -->
    <video width="100%" height="100%" autoplay loop muted preload="none" id="background">
      <source src="../video/Lapse3.mp4" type="video/mp4" />
    </video>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Acerca De</div>
                    <div class="panel-body">
                        <form class="form-horizontal" >
                            <h4>MyRommie empezó como una idea de 4 estudiantes de la Universidad de EAFIT, con el propósito de realizar un proyecto que buscara solucionar un problema que está vigente en el mundo actualmente, fue así como Craig David Cartagena Castaño, Jhonatan Quiñonez Ávila, Juan Camilo Henao Salazar y Juan Diego Zuluaga Gallo, que pensaron en crear una página web que ayudara a los estudiantes de diferentes universidades a buscar un lugar donde hospedarse mientras están realizando sus estudios universitarios, Teniendo en cuenta aquellos detalles que hacen que sea una buena página como lo son la información completa y el fácil uso para los usuarios.</h4>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </body> -->
@endsection
