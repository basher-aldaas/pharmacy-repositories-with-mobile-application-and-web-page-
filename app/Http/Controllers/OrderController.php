<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\UserFactoryMedicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Notifications\CreateNewOrder;


use Carbon\Carbon;


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



        public function get_report(Request $request)
        {
            $id = auth()->user()->id;

            $request->validate([
                'endDate' => 'required|date_format:d/m/Y|after:startDate|before_or_equal:today',
                'startDate' => 'required|date_format:d/m/Y|before:endDate'
            ], [
                'endDate.after' => 'The end date must be a date after the start date.',
                'startDate.before' => 'The start date must be a date before the end date.'
            ]);

            $startDate = Carbon::createFromFormat('d/m/Y', $request->startDate);
            $endDate = Carbon::createFromFormat('d/m/Y', $request->endDate);

            $orders = Order::query()
                ->where('user_id', $id)
                ->whereBetween('created_at', [$startDate->startOfDay(), $endDate->endOfDay()])
                ->get();

            return response()->json([
                'data' => $orders,
                'message' => 'Report'
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




    //Enum بياخد ثلث قيم بس
    //function to change Payment status
    public function OrderStatus(Request $request){

        $request->validate([
            'order_id'=>'required',
            'order_status'=>'required',

        ]);

        $order= Order::FindOrFail($request->order_id);
        $order ->update([
            'order_status'=> $request-> order_status
        ]);


        $message = "you Order Status has been updated to " .$order -> order_status    ;

        $receiver = User::FindOrFail($order -> user_id);
        $receiver -> notify(new CreateNewOrder($message));






        return response()->json([
            'status'=>1,
            'message'=>'updated successfully'
        ]);
    }

















}
