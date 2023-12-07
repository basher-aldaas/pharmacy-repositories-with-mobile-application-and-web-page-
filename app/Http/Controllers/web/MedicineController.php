<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catigorie;
use App\Models\Medicine;

class MedicineController extends Controller
{

             //function to get medicine by catigorie
    public function indexMed(Request $request){
        $medicines=Medicine::query()->where('factory_id',$request['factory_id'])->where('catigorie_id',$request['catigorie_id'])->get();
              return response()->json([
                   'status'=>1,
                   'data'=>$medicines,
                   'message'=>"success"
                    ],200);
                }

            //function to search for medicine
    public function searchMed(Request $request){
        $medicines=Medicine::query()->where('commercial_name','=',$request['commercial_name'])->where('factory_id',$request['factory_id'])->first();
        if($medicines)

            return response()->json([
                'status'=>1,
                'data'=>$medicines,
                'message'=>"success"
            ],200);
        else
            return response()->json([
                'status'=>0,
                'data'=>[],
                'message'=>"not found"
            ],404);

}
  }
