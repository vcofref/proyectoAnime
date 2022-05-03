@extends('layouts.master')
@section('title','Mis Series')
@section('header')
    @if(isset($serie))
        <h2>Listado de Personajes de {{ $serie[0]->name }}</h2>
    @else
        <h2>Resultado Busqueda: {{ $search }}</h2>
    @endif
@stop

@section('content')
<hr>
<div class="row">
    @foreach($personajes as $personaje)
        <div class="col-3 pb-3">
            <div class="card" style="width: 18rem;">
                @if(Storage::disk('imagenes')->has($personaje->image))
                    <img src="{{ url('miniatura/'.$personaje->image) }}" class="card-img-top img-thumbnail" alt="{{ $personaje->name }}">
                @else
                    <img src="{{ url('miniatura/default.jpg') }}" class="card-img-top img-thumbnail" alt="">
                @endif
                
                <div class="card-body">
                    <h5 class="card-title">{{ $personaje->name }}</h5>
                    <h6 class="card-title">{{ $personaje->serie->name }}</h6>
                    <p class="card-text">{{ Str::limit($personaje->desc, 150) }}</p>
                </div>
                <div class="card-footer">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a type="button" class="btn btn-warning">Ver</a>
                    <a href="/personaje/{{ $personaje->id }}" type="button" class="btn btn-success">Editar</a>
                    <a href="#modalEliminar{{$personaje->id}}" role="button" class="btn btn-danger" data-toggle="modal">Eliminar</a>
                </div>
                </div>
            </div>
        </div>
        <div id="modalEliminar{{$personaje->id}}" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Estas seguro que quiere eliminar el personaje</h4>
                    </div>
                    <div class="modal-body">
                        <p>Realmente estas seguro que quiere eliminar a {{ $personaje->name }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <a href="/eliminarPersonaje/{{ $personaje->id }}" type="button" class="btn btn-danger">Confirmar</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
<hr>
@stop

@section('footer')
    <a href="" type="button" class="btn btn-secondary">Agregar Personaje</a>
@stop
