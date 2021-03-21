<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Login page
    function login()
    {
    return view("auth.Login");
    }

    //Register page
    function register()
    {
    return view("auth.Register");
    }

    function post_register()
    {
        // $uu=request("image");
        // return $uu;
       $validation=request()->validate([
            "username"=>"required",
            "email"=>"required",
            "password"=>"required||min:8||confirmed",
            "image"=>"required",
        ]);
        if($validation){
            // data save
            $image=request('image');
            $image_name=uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/profiles'),$image_name);
            $password=$validation["password"];
            $user=new User();
            $user->name=$validation["username"];
            $user->email=$validation["email"];
            $user->password=Hash::make($password);
            $user->image=$image_name;
            //take 1 or 2 second to save a data in database
            $user->save();
            if(Auth::attempt(['email' => $validation['email'], 'password' => $validation['password']])){
            return redirect()->route("home");
            }
        }else{
            return back()->withErrors($validation);
        }
    }

    function post_login()
    {
        //validate our input field
        $validation=request()->validate([
            "Email"=>"required",
            "password"=>"required",
        ]);
        if($validation){
            //if auth success or not
            $auth=Auth::attempt(['email' => $validation['Email'], 'password' => $validation['password']]);
            if($auth){
                //go to home page
                return redirect()->route("home");
            }
            else{
                //else return back with auth fail error
                return back()->with('error','Authentication Failed Try again');
            }

        }
        //else back to login with error
        else{
            return back()->withErrors('$validation');
        }

    }

    function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }

    function post_user_profile()
    {
        $name=Request('username');
        $email=Request('email');
        $image=Request('image');
        $old_password=Request('old_password');
        $new_password=Request('new_password');
        //if user is not select image and not change password->add name and email to current user's id
        $id=auth()->user()->id;
        // return($id);
        $current_user=User::find($id);
        // dd($current_user);
        $current_user->name=$name;
        $current_user->email=$email;

        if($image){
            //move
            $imageName=uniqid()."_".$image->getClientOriginalName();
            // return ($imageName);
            $image->move(public_path('images/profiles/'),$imageName);
            //save
            $current_user->image=$imageName;
            $current_user->update();
            return back()->with('success',"Image Changed");
        }

        if($old_password && $new_password){
            //check
            if(Hash::check($old_password, $current_user->password)){
            // return("dd");
            $current_user->password=Hash::make($new_password);
            $current_user->update();
            return back()->with('success',"Password Changed");
            }else{
            // return ("oo");
            return back()->with('error',"old password is not same");
            }
        }
        $current_user->update();
        return back();
    }
}
