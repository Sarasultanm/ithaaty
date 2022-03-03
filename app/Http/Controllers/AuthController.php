<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //POST
    // parameter
    // name
    // email
    // password
    // password_confirmation
    // birth_month
    // birth_day
    // birth_year
    // roles
    // gender
    // birth_day
    // country
    public function register(Request $request){

    	// $fields=$request->validate([
     //        'name'=>'required|string',
     //        'email'=>'required|string|unique:users,email',
     //        'password'=>'required|string|confirmed',
     //        // 'birth_month'=>'required|string',
     //        // 'birth_day'=>'required|string',
     //        // 'birth_year'=>'required|string',
     //        // 'country'=>'required|string',
     //        // 'gender'=>'required|string',

    	// ]);


        $checkexistemail='No';


        $check_emailexist=  DB::table('users')->where('email','=', $request->email)
        ->select("users.id"
        )
        ->count();
        
        if($check_emailexist>0){
            $checkexistemail='Emailexist';

            $response=[          
                 'user'=>$checkexistemail,
            ];

         return response($response, 201);
        }

     


     
      $randomStr = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 5);

    	$user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            //'birthday'=>$fields['birth_month'].' '.$fields['birth_day'].','.$fields['birth_year'],
            'birthday'=>'0',
            'roles' => 'editor',
            'gender' => '0',
             'country' =>'0',
            'age' => '0', 
            'plan' => 'new',
            'alias' => "User".$randomStr,
            'about' => ' ',
    	]);



    	//$token= $user->createToken('myapptoken')->plainTextToken;

    	$response=[


    		'user'=>'Save Successfully',
            'redirect_link'=>'login',
    	];

    	return response($response, 201);
    }



    public function login(Request $request){

    	$fields=$request->validate([
    		'email'=>'required|string',
    		'password'=>'required|string'
    	]);

        $id='';
        $name='';
        $email='';
        $roles='';
        $firstlogin='';
        $alias='';

    	//Check email

    	$user=User::where('email',$fields['email'])->first();

         //  foreach($user as $row){
         //    $id =$row->id;  
         //    $name =$row->name;  
         //    $email =$row->email;  
         //    $roles =$row->roles;  
         //    $firstlogin =$row->firstlogin;  
         //    $alias =$row->alias; 
         // }     


    	//Checkpassword
    	if(!$user || !Hash::check($fields['password'],$user->password)){
    		return response([
    			'message'=>'Bad Creds'
    		],401);
    	}

    	$token= $user->createToken('myapptoken')->plainTextToken;

    	$response=[
            'message'=>'Sucess',
            'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'roles'=>$user->roles,
            'firstlogin'=>$user->firstlogin,
            'alias'=>$user->alias,
    		'token'=>$token,
             'redirect_link'=>($user->firstlogin == 0) ? 'Setup' : 'Dashboard',
    
    	];

    	return response($response, 201);
    }


     public function logout(Request $request){
     	auth()->user()->tokens()->delete();

     	return [
     		'message'=>'Logged out'
     	];
     }


}
