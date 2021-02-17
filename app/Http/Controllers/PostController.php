<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('post');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function createPost(Request $request)
    {
//        $request
//        $post= new Post();

        $user = Auth::user();

        $post= new Post();
        $post->fillable([
            'user_id'=> $user->id,
            'title' => $request->title,
            'body' => $request->body,
        ]);
//
//        $post->user_id=$user->id;
//        $post->title=$request->title;
//        $post->body=$request->body;

        $post->save();
//        Post::firstOrCreate([
//            'user_id'=> $user->id,
//            'title' => $request->title,
//            'body' => $request->body,
//        ]);

        return response()->json($user);

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function getPosts(){
        return response()->json(Post::all());
    }
}
