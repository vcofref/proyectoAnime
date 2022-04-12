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
                <img src="{{ $serie->image }}" class="card-img-top img-thumbnail" alt="{{ $serie->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $serie->name }}</h5>
                    <p class="card-text">{{ Str::limit($serie->desc, 150) }}</p>
                </div>
                <div class="card-footer">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-warning">Ver</button>
                    <button type="button" class="btn btn-success">Personajes</button>
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
