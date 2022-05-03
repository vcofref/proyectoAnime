@extends('layouts.master')
@section('title','Mis Series')
@section('header')
<h2>Listado de Series</h2>
@stop

@section('content')
<hr>
<div class="row">
    @foreach ($series as $serie)
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <!-- <img src="{{ $serie->image }}" class="card-img-top img-thumbnail" alt="{{ $serie->name }}"> -->
                @if(Storage::disk('imagenes')->has($serie->image))
                    <img src="{{ url( 'miniatura/'.$serie->image ) }}" class="card-img-top img-thumbnail" alt="{{ $serie->name }}">
                @else
                    <img src="{{ url( 'miniatura/default.jpg' ) }}" class="card-img-top img-thumbnail" alt="{{ $serie->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $serie->name }}</h5>
                    <p class="card-text">{{ Str::limit($serie->desc, 150) }}</p>
                    <p class="card-text"><small class="text-muted">{{ \FormatTime::LongTimeFilterCreated($serie->created_at) }}</small></p>
                    <p class="card-text"><small class="text-muted">{{ \FormatTime::LongTimeFilter($serie->updated_at) }}</small></p>
                </div>
                <div class="card-footer">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a type="button" class="btn btn-danger">Eliminar</a>
                    <a type="button" class="btn btn-warning">Ver</a>
                    <a href="personajes/{{ $serie->id }}" type="button" class="btn btn-success">Personajes</a>
                </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<hr>
@stop

@section('footer')
    <a href="series/create" type="button" class="btn btn-secondary">Agregar Serie</a>
@stop
