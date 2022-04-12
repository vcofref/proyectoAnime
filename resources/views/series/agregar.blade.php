@extends('layouts.master')
@section('title','Mis Series')
@section('header')
<h2>Agregar Nueva Serie</h2>
@stop

@section('content')
<hr>
<div class="row">
    <form action="{{ url('/series')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">imagen</label>
            <input type="text" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Descripcion</label>
            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
        </div>       
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
<hr>
@stop

@section('footer')
    <a href="/series" type="button" class="btn btn-secondary">Volver</a>
@stop