<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuitesResource;
use App\Models\Suites;
use Illuminate\Http\Request;

class SuitesController extends Controller
{
    public function allSuites(){
       $suites = Suites::leftJoin('hotels','hotels.suites_id','=','suites.id')
       ->select('suites.*','hotels.avaliable')->get();

       if(!$suites){
        return response()->json([
            'status'=>404,
            'message'=>'Suítes não encontradas',
        ],404);
       }

        return response()->json([
            'status'=>200,
            'message'=>'Carregando suítes...',
            'suites'=>$suites
        ],200);
    }

    public function suite(string $id){
        $suite = Suites::where('suites.id',$id)
        ->leftJoin('hotels','hotels.suites_id','=','suites.id')
        ->select('suites.*','hotels.avaliable')->get();;

        if(!$suite){
            return response()->json([
                'status'=>404,
                'message'=>'Suíte não encontrada',
            ],404);
        }
        return response()->json([
            'status'=>200,
            'message'=>'Carregando suíte...',
            'suites'=>$suite
        ],200);
    }

}
