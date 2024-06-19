<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
class PostController extends Controller
{
    public function index(Request $request)	
    {
      
        // if($request->query('category')){
        //     $posts = Post::with('category')->where('category_id', $request->query('category'))->paginate(6);//or get()
        // }else{
        //     $posts = Post::with('category')->paginate(6);
        // }

        //metodo alternativo
        $category=$request->query('category');
        $posts = Post::with('category')->when($category, function (Builder $query, string $category){
            $query->where('category_id', $category);
        })->paginate(6);


        //quando usamo la funzione paginate i dati saranno in data 
        //  $posts=Post::paginate(5);
        // $posts=Post::all();
        // $posts = Post::with('category')->paginate(6);//or get()
        //dd($posts);
        return response()->json([
            'status' => 'success',
            'message' => 'OK',
            'results' => $posts
        ],200);
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
