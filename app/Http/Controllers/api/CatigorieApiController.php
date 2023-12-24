<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Catigorie;
use App\Models\Factory;
use App\Models\FactoryMedicine;
use FactoryMethod;
use Illuminate\Http\Request;

class CatigorieApiController extends Controller
{
     //function to get catigories
    public function indexCat(Request $request){
        $catigories =Catigorie::query()->get();
        return response()->json([
            'status'=>1,
            'data'=>$catigories,
            'message'=>"This is all catigories"
        ],200);
    }


    //function to search for catigorie
    public function searchC(Request $request){
        $query=$request->input('name');
        $catigorie=Catigorie::query()->where('name','like',$query . '%')->first();
        if($catigorie){
        return response()->json([
            'status'=>1,
            'data'=> $catigorie,
            'message'=>"success"
        ],200);}
        else
        return response()->json([
            'status'=>0,
            'data'=> [],
            'message'=>"not found in data"
        ],404);
    }

}
