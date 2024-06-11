<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
     //quando usamo la funzione paginate i dati saranno in data 
    //  $posts=Post::paginate(5);
    // $posts=Post::all();
    $posts = Post::with('category')->get();//or get()
     //dd($posts);
      return response()->json([
        'status' => 'success',
        'message' => 'OK',
        'results' => $posts
      ]);
    }
    public function show($slug)
    {
        //se vogliamo vedere anche le entita relazionate usimo with 
        $post = Post::where('slug', $slug)->with('category', 'tags')->first();
        if($post){
            return response()->json([
                'status' => 'success',
                'message' => 'OK',
                'results' => $post
                // uso un codice 200 per indicare ad axios
                // che la chiamata e andata a buon fine 
            ],200);
        }else{
            return response()->json([
                'status' => 'error',	
                'message' => 'Error'
            ],404);
        }
       
    }
}
