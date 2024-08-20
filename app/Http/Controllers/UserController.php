<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Mail\SendCodeResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Notifications\CreateNewOrder;
use App\Models\ResetCodePassword;
class UserController extends Controller
{




/**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register','loginWeb']]);
        // $this->middleware('isAdmin',['except'=>['login','logout','register']]);
    }

/**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */


     public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'userName' => ['required'],
            'email'=>['required','unique:users,email','email'],
            'phoneNumber' => ['required','unique:users,phoneNumber','digits:10'],
            'password' => ['required','confirmed'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>0,
                'data'=>[],
                'message'=>$validator->errors()
            ],422);
        }


        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));

                 $token = auth()->attempt($validator->validated());
                 $data=[];
                 $data['user']=$user;
                 $data['token']=$token;


        return response()->json([
            'status'=>1,
            'data' => $data,
            'message' => "User successfully registered",

        ], 201);
    }



    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        if($request['phoneNumber']){
        $validator = Validator::make($request->all(), [
            'phoneNumber' => ['required','digits:10','exists:users,phoneNumber'],
            'password' => ['required'],
        ],
        ['phoneNumber.exists'=>"you must register in this application first",
    ],
    );


        if ($validator->fails()) {
            return response()->json([
                'status'=>0,
                'data'=>[],
                'message'=>$validator->errors()
            ],422);
        }
        $token = auth()->attempt($validator->validated());

        if (!$token) {
            return response()->json([
                'status'=>0,
                'data'=>[],
                'error' => "somthing wrong with phone number or password"
            ], 401);
        }
        $user=User::query()->where('phoneNumber','=',$request['phoneNumber'])->first();

        $data=[];
        $data['user']=$user;
        $data['token']=$token;
        return response()->json([
            'status'=>1,
            'data' => $data,
            'message' => "User successfully loged in",

        ], 202);
    }
    else if($request['email']){
        $validator = Validator::make($request->all(), [
            'email' => ['required','exists:users,email'],
            'password' => ['required'],
        ],
        ['email.exists'=>"you must register in this application first",
    ],
    );


        if ($validator->fails()) {
            return response()->json([
                'status'=>0,
                'data'=>[],
                'message'=>$validator->errors()
            ],422);
        }
        $token = auth()->attempt($validator->validated());

        if (!$token) {
            return response()->json([
                'status'=>0,
                'data'=>[],
                'error' => "somthing wrong with email number or password"
            ], 401);
        }
        $user=User::query()->where('email','=',$request['email'])->first();

        $data=[];
        $data['user']=$user;
        $data['token']=$token;
        return response()->json([
            'status'=>1,
            'data' => $data,
            'message' => "User successfully loged in",

        ], 202);

    }
      else if(!$request['phoneNumber'] && !$request['email']){
        return response()->json([
            'status'=>0,
            'data' =>[],
            'message' => "Enter email or Phone Number",

        ], 202);
      }
     }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
       auth()->logout();
        return response()->json([
            'status'=>1,
            'data'=>[],
            'message' => 'User successfully loged out']);
    }

    public function loginWeb(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required','exists:users,email'],
            'password' => ['required'],
        ]
    );
        if ($validator->fails()) {
            return response()->json([
                'status'=>0,
                'data'=>[],
                'message'=>$validator->errors()
            ],422);
        }
        $token = auth()->attempt($validator->validated());
        if (!$token) {
            return response()->json([
                'status'=>0,
                'data'=>[],
                'error' => "somthing wrong with email number or password"
            ], 401);
        }
        $user=User::query()->where('email','=',$request['email'])->first();
        $data=[];
        $data['user']=$user;
        $data['token']=$token;
        return response()->json([
            'status'=>1,
            'data' => $data,
            'message' => "User successfully loged in",

        ], 202);
    }

    public function userForgotPassword(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // Delete all old code that user send before.
        ResetCodePassword::where('email', $request->email)->delete();

        // Generate random code
        $data['code'] = mt_rand(100000, 999999);

        // Create a new code
        $codeData = ResetCodePassword::create($data);

        // Send email to user
        Mail::to($request->email)->send(new SendCodeResetPassword($codeData->code));

        return response(['message' => trans('passwords.sent')], 200);
    }

    public function userCheckCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:reset_code_passwords',
        ]);

        // find the code
        $passwordReset = ResetCodePassword::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }

        return response([
            'code' => $passwordReset->code,
            'message' => trans('passwords.code_is_valid')
        ], 200);
    }

    public function userResetPassword(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:reset_code_passwords',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // find the code
        $passwordReset = ResetCodePassword::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }

        // find user's email
        $user = User::firstWhere('email', $passwordReset->email);

        // update user password
        $user->update($request->only('password'));

        // delete current code
        $passwordReset->delete();

        return response(['message' =>'password has been successfully reset'], 200);
    }

    public function listAllNotification()
{
// $notifications = auth()->user()->notifications()->latest()->get();
// return response()->json([
//     'data'=>$notifications,
//     'message'=>'All Notifications '
// ]);
}












}
        // if (!Auth::attempt($request->only(['phoneNumber', 'password']))){

        //      return response()->json([
        //        'status' => 0,
        //        'data'=>[],
        //        'message'=>"Doesn't have match betwen phoneNumber and password"
        //      ],500);
        // }








