<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuitesResource;
use App\Models\Suites;
use Illuminate\Http\Request;

class SuitesController extends Controller
{
    public function allSuites(){
       $suites = SuitesResource::collection(Suites::all());

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
        $suite = SuitesResource::collection(Suites::where('id',$id)->get());

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
