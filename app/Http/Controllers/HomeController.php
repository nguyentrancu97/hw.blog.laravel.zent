<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class HomeController extends Controller
{
    // public function index(){
    // 	$posts = Post::select('posts.*','categories.slug as category_slug')->join('categories','categories.id','=','posts.category_id')->paginate(5);

    // 	return view('index',['posts'=>$posts]);
    // }
    public function index(){
    	$posts = Post::paginate(5);
    	return view('index',compact('posts'));
    }
    public function detail($slug){
    	$post = Post::where('slug',$slug)->firstOrFail();
    	return view('posts.detail',['post'=>$post]);
    }
    public function category($slug){
    	$category = Category::where('slug',$slug)->firstOrFail();
    	$posts = Post::where('category_id',$category->id)->paginate(2);
    	return view('categories.category',['posts'=>$posts]);
    }

    // public function ca(){
    // 	$category = Category::firstOrFail();
    // 	dd($category->posts);

    // }

    // public function po(){
    // 	$post = Post::firstOrFail();
    // 	dd($post->category);
    // }
}
