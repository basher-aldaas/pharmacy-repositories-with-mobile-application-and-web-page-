<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Catigorie;
use App\Models\Factory;
use App\Models\FactoryMedicine;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class MedicineApiController extends Controller
{
      // function to get all medicines debends on factory id
     public function indexMed(Request $request){
        $medicines =FactoryMedicine::query()->where('factory_id',$request['factory_id'])->get();
        return response()->json([
            'status'=>1,
            'data'=>$medicines,
            'message'=>"The medicines from this factory"
        ],200);
    }


      // function to get all medicines debends on catigorie in this factory
      public function indexMedicines(Request $request){
        $medicines =FactoryMedicine::query()->where('factory_id',$request['factory_id'])->where('catigorie_id',$request['catigorie_id'])->get();
        return response()->json([
            'status'=>1,
            'data'=>$medicines,
            'message'=>"The medicines from this factory"
        ],200);
    }

       //function to search for medicine in special factory
    public function searchM(Request $request){
        $query=$request->input('commercial_name');
        // $medicine=Medicine::query()->where('commercial_name','like',$query . '%')->first();
        $medicine=FactoryMedicine::query()->where('factory_id',$request['factory_id'])->where('commercial_name','like',$query . '%')->first();
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
