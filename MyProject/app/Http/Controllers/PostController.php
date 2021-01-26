<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get form data
        $data = $request->all();
        // dd('$data');

        // validation
        $request->validate($this->ruleValidation());

        // set post slug
        $data['slug'] = str::slug($data['title'], '-');
        
        if(!empty($data['path_img'])) {
            $data['path_img'] = Storage::disk('public')->put('images', $data['path_img']);
        }

        // save to DB
        $newPost = new Post();
        $newPost->fill($data);  //il fil() funziona solo se fillable è nel model (in questo caso post.php)

        $saved = $newPost->save();
        
        if($saved) {
            return redirect()->route('posts.index');
        } else {
            return redirect()->route('homepage');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Post $post)
    {
        $title = $post->title;
        $image = $post->path_img;
        $deleted = $post->delete();

        if($deleted) {
            if(!empty($post->path_img)) {
                Storage::disk('public')->delete($image);
            }
            return redirect()->route('posts.index')->with('post-deleted', $title);
        } else {
            return redirect()->route('homepage');
        }
    }


    // function rule validation
    private function ruleValidation() {
        return [
            'title' => 'required',
            'description' => 'required',
            'path_img' => 'mimes:jpg,bmp,png'
        ];
    }
}
