<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class PostRoleCkeckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id=request('id'); // post's  id
        $authorID=Post::find($id)->user_id; // post's user id

        if(auth()->user()->isPremium=="1" || auth()->user()->isAdmin=="1" || auth()->user()->id==$authorID){
            return $next($request);
        }else{
            return redirect()->route('home')->with('Errors','U R not Premium User or Admin');
        }
    }
}
