<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Personaje;
use Illuminate\Support\Facade\DB;

class PersonajesController extends Controller
{
    public function index($id){
        $series = Serie::where('id', '=', $id )
        ->get()
        ->load('personajes');

        return view('personajes/listado',[
            'series' => $series
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
}
