<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
}
        // if (!Auth::attempt($request->only(['phoneNumber', 'password']))){

        //      return response()->json([
        //        'status' => 0,
        //        'data'=>[],
        //        'message'=>"Doesn't have match betwen phoneNumber and password"
        //      ],500);
        // }
