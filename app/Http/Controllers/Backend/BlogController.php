<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $posts = Blog::query()->get();

        return response()->json([
            "status" => true,
            "message" => "Successfully get all post",
            "data" => $posts
        ]);
    }

    public function create()
    {
        return view('frontend.post.add');
    }

    public function show($id)
    {
        $post = Blog::query()
                    ->where('id', $id)
                    ->first();

        if($post == null) {
            return response()->json([
                "status" => false,
                "message" => "Post not found",
                "data" => null,
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "Successfully get all post",
            "data" => $post
        ]);   
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        if(!isset($payload['title'])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada title",
                "data" => null
            ]);   
        }
        
        if(!isset($payload['body'])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada body",
                "data" => null
            ]);   
        }
        
        if(!isset($payload['author'])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada author",
                "data" => null
            ]);   
        }

        if($request->hasFile("image")) {
            $image_name = $request->file("image")->getClientOriginalName();
            $payload["image"] = $image_name;
            $payload["image_path"] = 'storage/' . $request->file("image")->store("images_post", 'public');
        }

        $post = Blog::query()->create($payload);
        
        return response()->json([
            "status" => true,
            "message" => "Berhasil membuat sebuah post",
            "data" => $post->makeHidden([
                'id',
                'created_at',
                'updated_at'
             ])
        ]);   
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();

        $post = Blog::query()->findOrFail($id);
        // dd($post);

        if($post == null) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found',
                'data' => null
            ]);
        }

        if($request->hasFile("image")) {
            isset($post->image_path) ? unlink(public_path($post->image_path)) : false;
            $image_path = 'storage/' . $request->file('image')->store('images_post', 'public');
        }

        $post->update([
            'title' => isset($payload['title']) ? $payload['title'] : $post->title,
            'body' => isset($payload['body']) ? $payload['body'] : $post->body,
            'author' => isset($payload['author']) ? $payload['author'] : $post->author,
            "image" => file_exists($post->image_path) ? $post->image : $request->file("image")->getClientOriginalName(),
            "image_path" => file_exists($post->image_path) ? $post->image_path : $image_path
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Successfully updated post',
            'data' => $post->makeHidden([
               'id',
               'created_at',
               'updated_at'
            ])
        ]);
    }

    public function destroy($id)
    {
        $post = Blog::query()->where('id', $id)->first();
        if($post == null) {
            return response()->json([
                "status" => false,
                "message" => "Post not found",
                "data" => null
            ]);
        }
        
        file_exists($post->image_path) ? 
        unlink(public_path($post->image_path)) : false;

        $post->delete();

        return response()->json([
            "status" => true,
            "message" => "Post berhasil dihapus",
            "data" => null
        ]);
    }

}
