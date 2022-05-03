<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Personaje;
use Illuminate\Support\Facade\DB;

class PersonajesController extends Controller
{
    public function index($id){

        $serie = Serie::where('id', $id)->get();


        $personajes=Personaje::where('serie_id', $id)
        ->get()
        ->load('serie');

        return view('personajes/listado',[
            'serie' => $serie,
            'personajes' => $personajes
        ]);

    }

    public function delete($id){
        //Obtener el id de la serie
        $personaje = Personaje::where('id', '=', $id)
        ->get()
        ->load('serie');

        if($personaje->isEmpty()){
            return redirect('/');
        }else{
            $serieid = $personaje[0]->serie->id;
            //Eliminar el Personaje

            Personaje::where('id', '=', $id)->delete();

            //Redireccionar a la lista de Personajes

            return redirect()->action(
                [PersonajesController::class, 'index'], ['id' => $serieid]
            );

        }

        
    }

    public function show($id){
        $personaje = Personaje::where('id', '=', $id )
        ->get();

        $series = Serie::get();

        return view('personajes/ver',[
            'personaje' => $personaje,
            'series' => $series
        ]);
    }

    public function update(Request $request){
        //validamos
        $this->validate($request,[
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'serie' => 'required' 
        ]);
        $personaje = Personaje::where('id', $request->id )
        ->get();

        if($personaje->isEmpty()){
            return redirect('/');
        }else{
            $serieid = $personaje[0]->serie_id;
            //Actualizar Datos
            Personaje::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'image' => $request->image,
                'serie_id' => $request->serie
            ]);
        }

        return redirect()->action(
            [PersonajesController::class, 'index'],['id' => $serieid]
        );
    }

    public function search($search=null){
        if(is_null($search)){
            $search = \Request::get('search');
        }

        $personajes = Personaje::where('name', 'LIKE', '%'.$search.'%')->get();
        return view('personajes.listado')
        ->with(
            array(
                'personajes' => $personajes,
                'search' => $search
            )
            );
        

    }
}
