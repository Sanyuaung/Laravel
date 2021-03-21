<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.index');
    }
    function manage_premium_users()
    {
        $users=User::all();
        return view("admin.manage_premium_users",['users'=>$users]);
    }
    function contact_messages()
    {
        $messages=ContactMessage::latest()->get();
        return view("admin.contact_messages",['messages'=>$messages]);
    }
    function deleteUser($id)
    {
        $deleteUser=User::find($id);
        $deleteUser->delete();
        return back()->with('message','Delete Success');
    }
    function editUser($id)
    {
        $editUser=User::find($id);
        return view('admin.editUser',['editUser'=>$editUser]);
    }
    function editUpdateUser($id)
    {
        $validation=request()->validate([
            'name'=>'required',
            'email'=>'required',
            'isAdmin'=>'required',
            'isPremium'=>'required',
        ]);
        if($validation){
            $editUpdateUser=User::find($id);
            // return $editUpdateUser;
            $editUpdateUser->name=request('name');
            $editUpdateUser->email=request('email');
            $editUpdateUser->isAdmin=request('isAdmin');
            $editUpdateUser->isPremium=request('isPremium');
            // return $editUpdateUser;
            $editUpdateUser->update();
            return back()->with('message','User Updated');
        }else{
            return back()->withErrors($validation);
        }
    }
}
