<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        $currentPosts = Post::all();
        return view('posts.index', compact('currentPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang='es')
    {
        App::setLocale($lang);

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

        //$request->validated();

        $currentUser = Auth::user()->id;

        $commentableValue = 0;
        if($request->input('commentable')){
            $commentableValue = 1;
        }

        $expiresValue = 0;
        if($request->input('expires')){
            $expiresValue = 1;
        }

        $privateValue = 0;
        if($request->input('access') === 'private') {
            $privateValue = 1;
        }

        Post::create([
            'title' => $request->input('title'),
            'heading' => $request->input('heading'),
            'body' => $request->input('body'),
            'is_private' => $privateValue,
            'commentable' => $commentableValue,
            'expires' => $expiresValue,
            'user_id_created_by' => $currentUser
        ]);


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
        //
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
    public function destroy($id)
    {
        //
    }
}
