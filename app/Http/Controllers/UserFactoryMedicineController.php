<?php

namespace App\Http\Controllers;

use App\Models\FactoryMedicine;
use App\Models\UserFactoryMedicine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class UserFactoryMedicineController extends Controller
{
    //function to add medicine to cart
    public function addCart(Request $request){
        $id=auth()->user()->id;
        $medicineName=FactoryMedicine::query()->where('id',$request->input('fMedicine_id'))->value('commercial_name');
        $amount=FactoryMedicine::query()->where('id',$request->input('fMedicine_id'))->value('amount');
        $productionDate=FactoryMedicine::query()->where('id',$request->input('fMedicine_id'))->value('exp_day');
        // $dateNow=['current_date'=>now()];
        $dateNow=Carbon::today()->format('Y-m-d');
        $quantity=$request->input('quantity');

        if(!($request->input('fMedicine_id')) || !($request->input('quantity')) || !($request->input('order_id')))
        return response()->json([
            'status'=>0,
            'message'=>"Please enter all fildes"
        ]);
            if($dateNow > $productionDate)
        return response()->json([
            'status'=>0,
            'message'=>"Expired date you can't buy it"
        ]);

        else if($quantity>$amount)
        return response()->json([
            'status'=>0,
            'message'=>'you should order asmaller quantity'
        ],400);

        else
        {
            $data=UserFactoryMedicine::query()->create([
                'user_id'=>$id,
                'factoryMedicine_id'=>$request->input('fMedicine_id'),
                'order_id'=>$request->input('order_id'),
                'status'=>0,
                'medicineName'=>$medicineName,
                'quantity'=>$request->input('quantity')
            ]);
        return response()->json([
            'status'=>1,
            'data'=>$data,
            'message'=>'added successfully'
        ],201);
            }


    }

    //function to delete medicine from cart
    public function delete(Request $request){
        UserFactoryMedicine::query()->where('id',$request->input('fMedicine_id'))->delete();
        return response()->json([
            'status'=>1,
            'message'=>'deleted successfully'
        ],201);
    }

}
