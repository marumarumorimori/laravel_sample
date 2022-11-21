<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;
// use App\Http\Controllers\DB;
use DB;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=DB::table('posts')
            ->leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.id AS post_id', 'posts.user_id', 'posts.name AS post_name', 'users.name AS user_name','posts.contents AS post_contents')
            ->get();

        // $posts =Post::all();
        return view('posts',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d=DB::table('posts')
            ->where('user_id', \Auth::user()->id)
            ->get();


        $post = new Post;
        $post->user_id = $request->user()->id;
        $post->name=$request->input('name');
        $post->contents=$request->input('contents');
        $post->save();
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $post = Post::find($request->id);
        // $posts = \Auth::user()->posts;
        // $todo=Todo::findOrFail($id);
        return view('edit' ,compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($request->id);
        $post->user_id = $request->user()->id;
        $post->name=$request->input('name');
        $post->contents=$request->input('contents');
        $post->save();
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $post = Post::find($request->id);
        $post->delete();
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request,$id)
    {
        $post = Post::find($request->id);
        $d=DB::table('comments')
            ->where('post_id', $post->id)
            ->get();

        $comment = new Comment;
        $comment->post_id =  $post->id;
        $comment->name=$request->input('name');
        $comment->contents=$request->input('contents');
        $comment->save();

        return redirect('show/'.$id);
    }


}
