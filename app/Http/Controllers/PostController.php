<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\Create;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with("images" , "comments")->get();
        return view("dashboard.posts.index" , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Create $request)
    {
        $imageRules = array(
            'images' => 'image|max:2000'
        );
        $post = Post::create([
            "title" => $request->title,
            "author" => Auth::user()->id,
            "content" => $request->content,
        ]);
        if ($request->images) {
            if (count($request->images) > 0) {
                foreach ($request->images as $image) {
                    PostImage::create([
                        "post_id" => $post->id,
                        "image" => store_image($request, $image, "image_for_web"),
                    ]);
                }
            }
        }
        return redirect()->back()->with('message', 'post added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with([ "comments" => function($comment){
            $comment->with("user");
        }] , "images")->find($id);

        if(!$post){
            return redirect('dashboard/notfound');
        }
        
        return view('dashboard.posts.comments' , compact('post')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(!$post){
            return redirect('dashboard/notfound');
        }
        return view('dashboard.posts.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Create $request, $id)
    {
        $post = Post::find($id)->update([
            "title" => $request->title ,
            "content" => $request->content 
        ]);
        if ($request->images) {
            if (count($request->images) > 0) {
                foreach ($request->images as $image) {
                    PostImage::create([
                        "post_id" => $id,
                        "image" => store_image($request, $image, "image_for_web"),
                    ]);
                }
            }
        }
        return redirect('/dashboard/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::with([ "images" => function($images){
            $images->delete();
        }])->with( ["comments" => function($comments){
            $comments->delete();
        }] )->find($id)->delete() ;
        return redirect()->back()->with('message', 'post deleted !');
    }

    public function deleteImage($id)
    {
        PostImage::find($id)->delete();
        return redirect()->back();
    }
}
