<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Post;
use Illuminate\Http\Request;

use function PHPSTORM_META\override;

class ContactUsController extends Controller
{

    function post_contact_message()
    {
        $validation=request()->validate([
            'username'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);
        if($validation){
            $username=request("username");
            $email=request('email');
            $text=request('message');
            $message=new ContactMessage();
            $message->username=$username;
            $message->email=$email;
            $message->messages=$text;
            $message->save();
        }else{
            return back()->withErrors($validation);
        }
        return back()->with("message","Message sent to Admin");
    }
    function deleteMessage($id)
    {
        $deleteMessage=ContactMessage::find($id);
        $deleteMessage->delete();
        return back()->with('message','Message Deleted');
    }
    function editMessage($id)
    {
        $editMessage=ContactMessage::find($id);
        return view('admin.editMessage',['editMessage'=>$editMessage]);
    }
    function editUpdateMessage($id)
    {
        $validation=request()->validate([
            'username'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        // find by id
        if($validation){
        $editUpdateMessage=ContactMessage::find($id);
        // return ($editUpdateMessage);
        // override that data
        $editUpdateMessage->username=request('username');
        $editUpdateMessage->email=request('email');
        $editUpdateMessage->messages=request('message');
        // return ($editUpdateMessage);
        $editUpdateMessage->update();
        // update that data
        return back()->with('message','Update Success');
        }else{
            return back()->withErrors($validation);
        }
    }
}
