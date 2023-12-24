<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use Illuminate\Http\Request;

class FactoryController extends Controller
{
        //function to get special factory
        public function getFactory(Request $request){
            $factory =Factory::query()->where('id',$request['factory_id'])->first();
            if($factory){
            return response()->json([
                'status'=>1,
                'data'=>$factory,
                'message'=>"success"
                 ],200);}
           else{
           return response()->json([
               'status'=>0,
               'data'=>[],
               'message'=>"This factory not found in data"
                ],404);
                 }
        }

}
