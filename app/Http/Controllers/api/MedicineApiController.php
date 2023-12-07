<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Catigorie;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class MedicineApiController extends Controller
{
      // function to get medicines debends on catigory
     public function indexMed(Request $request){
        $medicines =Medicine::query()->where('catigorie_id',$request['catigorie_id'])->get();
        return response()->json([
            'status'=>1,
            'data'=>$medicines,
            'message'=>"The medicines from this catigorie"
        ],200);
    }

       //function to get catigories with medicine
    public function index(Request $request){
        $medicines=Catigorie::query()->with('medicine')->get();
       return response()->json([
            'status'=>1,
            'data'=>$medicines,
            'message'=>"your medicines from this catigorie"
        ],200);

    }
       //function to search for medicine
    public function searchM(Request $request){
        $query=$request->input('commercial_name');
        $medicine=Medicine::query()->where('commercial_name','like',$query . '%')->first();
        if($medicine){
        return response()->json([
            'status'=>1,
            'data'=> $medicine,
            'message'=>"success"
        ],200);}
        else
        return response()->json([
            'status'=>0,
            'data'=> $medicine,
            'message'=>"not found in data"
        ],404);
    }
}
