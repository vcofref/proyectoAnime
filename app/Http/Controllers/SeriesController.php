<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use Illuminate\Support\Facade\DB;

class SeriesController extends Controller
{
    public function index(){
        $series = Serie::get();

        return view('series/listado', [
            'series' => $series
        ]);
    }

    public function create(){
        return view('series/agregar');
    }

    public function store(Request $request){
        //validamos
        $this->validate($request,[
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required'
        ]);

        //creamos
        $serie = new Serie();
        $serie->name = $request->name;
        $serie->desc = $request->desc;
        $serie->image = $request->image;
        $serie->save();

        //obtenemos registros
        $series = Serie::get();

        //enviamos a la vista principal
        return view('series/listado', [
            'series' => $series
        ]);
    }
}
