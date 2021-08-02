<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagerController extends Controller
{
    public function index(){
        $users = User::orderBy("id","desc")->paginate(5);
        return view('user-manager.index',compact('users'));
    }
    public function makeAdmin(Request $request){
        $currentUser = User::find($request->id);
        if($currentUser->role == 1){ //check current user role
            $currentUser->role= '0'; //enum
            $currentUser->update();
        }
        return redirect()->back()->with("toast",['icon'=>'success','title'=>'Role updated for '.$currentUser->name]);
    }

    public function banUser(Request $request){
        $currentUser = User::find($request->id);
        if($currentUser->isBanned == 0){ //check current user role
            $currentUser->isBanned= '1'; //enum
            $currentUser->update();
        }
        return redirect()->back()->with("toast",['icon'=>'success','title'=>$currentUser->name.'is banned']);
   
    }

    public function restoreUser(Request $request){
        $currentUser = User::find($request->id);
        if($currentUser->isBanned == 1){ //check current user role
            $currentUser->isBanned= '0'; //enum
            $currentUser->update();
        }
        return redirect()->back()->with("toast",['icon'=>'success','title'=>$currentUser->name.'is restored']);   
    }

    public function changeUserPassword(Request $request){

        //to get errors message as json data
        $validator = Validator::make($request->all(),[
            "password" =>"required|String|min:8"
        ]);
        if($validator->fails()){
            return response()->json(['status'=>422,"message"=>$validator->errors()]);
        }
        $currentUser = User::find($request->id);
        if($currentUser->role == 1){
            $currentUser->password = Hash::make($request->password);
            $currentUser->update();
        }
        return response()->json(['status'=>200,"message"=>"Password Change for $currentUser->name is complete"]);
    }
}
