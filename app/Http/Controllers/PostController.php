<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $posts = DB::table('posts')->get();
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        // Xử lý lưu file
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);//lưu file hình ảnh
        }

        DB::table('posts')->insert([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'created_at' => now(),
            'updated_at' => now(),
            'thumbnail' => $path
        ]);
        return redirect()->route('posts.index')->with('message', 'Create new post successfully!');
    }

    public function edit($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        if(!$post){
            abort(404);
        }
        return view('posts.edit', compact('post'));
    }

    public function update(StorePostRequest $request, $id)
    {
        DB::table('posts')->where('id', $id)->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'created_at' => now(),
        ]);
        return redirect()->route('posts.index')->with('message', 'Edit post successfully!');
    }

    public function destroy($id)
    {
        DB::table('posts')->where('id', $id)->delete();

        return back()->with('message', 'Delete post successfully!');
    }
}