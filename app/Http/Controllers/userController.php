<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    function doAuthentication(Request $req){
        $data= User::where('username',$req->username)->first();
        if($data->password==$req->password){
            $req->session()->put('name', $data);
            return redirect('/admin/post');
        }else{
            return redirect('/admin');
        }
    }

    function showUserData(){
        $result= user::all();
        return view('/admin/users',['result'=> $result]);
    }

    function addUserData(Request $request){
        $user= new user;
        $user->first_name=$request->fname;
        $user->last_name=$request->lname;
        $user->username=$request->user;
        $user->password=$request->password;
        $user->role=$request->role;

        $user->save();
        return redirect('/admin/users');
    }

    function dltuserData($id){
        $data= user::where('user_id',$id);
        $data->delete();
        return redirect('/admin/users');
    }

    function fillToUpdateData($id)
    {
        $row= user::where('user_id',$id)->first();
        return view("/admin/update-user",['row'=> $row]);
    }

    function updateUserData(Request $req){
        $data= user::where('user_id',$req->user_id)->update([
            'first_name'=>$req->fname,
            'last_name'=>$req->lname,
            'username'=>$req->username,
            'role'=>$req->role
        ]);
        return redirect('/admin/users');
    }
}
