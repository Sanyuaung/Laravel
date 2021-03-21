<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Delete
    function deletePost($id)
    {
        // delete post by id
        $delete_post=Post::find($id);
        // delete that user
        $delete_post->delete();
        return redirect()->route('home')->with('message','Deleted');
    }
    // Update
    function editUpdatePost($id)
        {
            // get input data from edit blade
            $title=Request("title");
            $image=Request("image");
            $content=Request("content");
            // return ($title.$image.$content);
            // update data to db require id
            $updateData=Post::find($id);
            // return $updateData;
            $updateData->title=$title;
            $updateData->content=$content;
            if($image){
            // image
            $imageName=uniqid()."_".$image->getClientOriginalName();
            // return ($imageName);
            $image->move(public_path('images/posts'),$imageName);
            $updateData->image=$imageName;
            }
            $updateData->update();
            return back()->with('message','Data Updated');

        }
        // Createpost
        function createpost()
    {
        // return ('kj');
        $valadition=Request()->validate([
            "title"=>"required",
            "image"=>"required",
            "content"=>"required",
        ]);
        if($valadition){
            // save
            $title=Request("title");
            $image=Request("image");
            $content=Request("content");
            $post=new Post();
            $post->user_id=auth()->user()->id;
            $post->title=$title;
            // image
            $imageName=uniqid()."-".$image->getClientOriginalName();
            $image->move(public_path("images/posts"),$imageName);
            $post->image=$imageName;
            $post->content=$content;
            $post->save();
            return redirect()->route("home")->with("message","Post Added");
        }else{
            return back()->withErrors($valadition);
        }
    }
}
