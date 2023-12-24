<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\UserFactoryMedicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //Open new Cart(new order)   )(بدي حط تاريخ للوردير بحيث وقت يقطه 24 ساعة بينحذف الاوردير)
    public function newCart(Request $request){
        $id=auth()->user()->id;
        Order::query()->create([
            'user_id'=>$id
        ]);
        return response()->json([
            'status'=>1,
            'message'=>'add successfully'
        ]);
    }
        //Open new Cart(new order)
        public function sendOrder(Request $request){
            $id=auth()->user()->id;
            // $order=$request->input('order_id');
            // $data=Order::query()->where('id',$order)->with('user_factory_medicine')->get();
            $changeStatus=UserFactoryMedicine::query()->where('user_id',$id)->where('status','0')->update([
                    'status'=>'1'
                ]);

                Order::query()->where('id','1')->update([
                    'user_id'=>$id,
                    'order_status'=>'In preparation',
                    'payment_status'=>'unpaid',

                ]);
            return response()->json([
                'status'=>1,
                'message'=>'updated successfully'
            ]);
        }

        //function to get all user orders
        public function getOrder(){
            $id=auth()->user()->id;
            $orders=Order::query()->where('user_id',$id)->get();
            return response()->json([
                'status'=>1,
                'data'=>$orders,
                'message'=>'all orders'
            ]);

        }

          //function to get all  orders
          public function getAllOrders(){
              $id=auth()->user()->id;
              $orders=Order::query()->get();
              return response()->json([
                  'status'=>1,
                  'data'=>$orders,
                  'message'=>'all orders'
              ]);
     }
          //function to change Payment status
          public function PaymentStatus(Request $request){
            $id=$request->input('order_id');
            $order=Order::query()->where('id',$id)->update([
                'payment_status'=>'paid'
            ]);
            return response()->json([
                'status'=>1,
                'message'=>'updated successfully'
            ]);
   }
    //function to change Payment status
    public function OrderStatus(Request $request){

    }


}
