<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
class jsonusercontroller extends Controller
{
    public function register(Request $request){

        $request->validate([
            'email'=>'required|unique:users',
            'email'=>'required',
            'name'=>'required',
            'password'=>'required',
            'diachi'=>'required',
            'sodienthoai'=>'required',
        ]);
        $user= User::where('email',$request->email)->first();

        if($user){
            return response(['status'=>'error','message'=>'error email']);
        }
        else{
            $user=new User();
            $user->email=$request->email;
            $user->name=$request->name;
            $user->diachi=$request->diachi;
            $user->sodienthoai=$request->sodienthoai;
            $user->password=Hash::make($request->password);
            $user->save();
            return response(['user'=>$user]);
        }    
    }

    public function login(Request $request){
        
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $user= User::where('email',$request->email)->first();

        if(!$user){
            return response(['status'=>'error','message'=>'User not found']);
        }

        if(Hash::check($request->password, $user->password)){
            return response(['user' => $user]);
        }else{
            return response(['message'=>'password not match','status'=>'error']);
        }
    }

    public function change(Request $request,$id)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $user=user::find($id);
        if($user->email==$request->email )
        {
            $user->email=$request->email;
            $user->name=$request->name;
            $user->diachi=$request->diachi;
            $user->sodienthoai=$request->sodienthoai;
            $user->password=Hash::make($request->password);
            $user->save();
            return response(['user'=>$user,'status'=>'ok']);
        }
        else{
            return response(['status'=>'error']);
        }
        
    }

    public function delete(Request $request,$id)
    {
        $user=user::find($id);
        $user->delete();
        return 'ok';
    }
}
