<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    public function make_an_appointment(Request $request){
        $validator=Validator::make($request->all(),[
            'date_of'=>'required',
            'hour_minute_of'=>'required',
            'date_to'=>'required',
            'hour_minute_to'=>'required',
            'suites_id'=>'required',
            'users_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'message'=>$validator->errors()
            ],422);
        }

        $date_of = Carbon::createFromFormat('d m Y',$request->date_of)->format('Y-m-d');
        $hour_minute_of = Carbon::createFromFormat('H i',$request->hour_minute_of)->format('H:i');
        $date_to = Carbon::createFromFormat('d m Y',$request->date_to)->format('Y-m-d');
        $hour_minute_to = Carbon::createFromFormat('H i',$request->hour_minute_to)->format('H:i');
        $avaliable="sim";
        $suites_id=$request->suites_id;
        $users_id=$request->users_id;
        //$users_id=$request->users_id;

        //verifica se já tem data marcada para a suite escolhida
        $busca=Hotel::where('suites_id',$suites_id)->where('avaliable','nao')->first();

        if($busca !== null){
            return response()->json([
                'status'=>400,
                'message'=>'Quarto não disponível'
            ],400);
        }

        //instanciando objeto
        $make_an_appointment=new Hotel();
        $make_an_appointment->date_of=$date_of;
        $make_an_appointment->hour_minute_of=$hour_minute_of;
        $make_an_appointment->date_to=$date_to;
        $make_an_appointment->hour_minute_to=$hour_minute_to;
        $make_an_appointment->avaliable=$avaliable;
        $make_an_appointment->suites_id=$suites_id;
        $make_an_appointment->users_id=$users_id;
        $make_an_appointment->save();

        if(!$make_an_appointment->save()){
            return response()->json([
                'status'=>400,
                'message'=>'Não foi possível marcar o horário'
            ],400);
        }

        return response()->json([
            'status'=>200,
            'message'=>'Horário marcado'
        ],200);
    }

    public function check_availability(){
        $busca = Hotel::all();

        if($busca->isEmpty()){
            return response()->json([
                'status'=>404,
                'result'=>'Sem horários marcados'
            ],404);
        }

        return response()->json([
            'status'=>200,
            'result'=>$busca
        ],200);
    }
}
