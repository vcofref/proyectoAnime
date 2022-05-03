<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

        $imagen = $request->file('image');

        if($imagen){
            $imagen_path = time()."-".$imagen->getClientOriginalName();
            \Storage::disk('imagenes')->put($imagen_path, \File::get($imagen));
        }

        //creamos
        $serie = new Serie();
        $serie->name = $request->name;
        $serie->desc = $request->desc;
        $serie->image = $imagen_path;
        $serie->save();

        //obtenemos registros
        $series = Serie::get();

        //enviamos a la vista principal
        return view('series/listado', [
            'series' => $series
        ]);
    }

    public function getImagen($filename){
        $file = \Storage::disk('imagenes')->get($filename);
        return new Response($file, 200);
    }
}
