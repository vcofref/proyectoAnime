@extends('layouts.master')
@section('title','Mis Series')
@section('header')
<h2>Editar Personaje {{ $personaje[0]->name }}</h2>
@stop

@section('content')
<hr>
<div class="row">
    <form action="{{ url('/personaje')}}" method="POST" class="col-6">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $personaje[0]->name }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">imagen</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $personaje[0]->image }}">
        </div>
        <!-- Listado de Series -->
        <div class="mb-3">
            <label for="serie" class="form-label">Series</label>
            <select name="serie" id="serie" class="form-control">
                <option selected disabled>Seleccione una Serie</option>
                @foreach($series as $serie)
                    @if($personaje[0]->serie_id == $serie->id)
                        <option value="{{ $serie->id }}" selected>{{ $serie->name }}</option>
                    @else
                        <option value="{{ $serie->id }}">{{ $serie->name }}</option>
                    @endif
                    
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Descripcion</label>
            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">{{ $personaje[0]->desc }}</textarea>
        </div>       
            <input type="hidden" name="id" value="{{ $personaje[0]->id }}">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<hr>
@stop

@section('footer')
    <a href="/series" type="button" class="btn btn-secondary">Volver</a>
@stop