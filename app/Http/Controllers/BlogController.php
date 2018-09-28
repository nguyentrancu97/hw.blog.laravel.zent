<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;

class BlogController extends Controller
{
    // public function index(){
    // 	$posts = Post::select('posts.*','categories.slug as category_slug')->join('categories','categories.id','=','posts.category_id')->paginate(5);

    // 	return view('index',['posts'=>$posts]);
    // }
    public function index(){
    	$posts = \App\Post::select('posts.*')->orderBy('created_at','desc')->paginate(5);
        
    	return view('index',compact('posts'));
    }
    public function detail($slug){
    	$post = \App\Post::where('slug',$slug)->firstOrFail();
        $post->view_post += 1;
        $post->update();
        
    	return view('posts.detail',['post'=>$post]);
    }
    public function category($slug){
        $cate = \App\Category::where('slug',$slug)->firstOrFail();
            
        $namecate = $cate->name;
    	// $category = Category::where('slug',$slug)->firstOrFail();
    	// $posts = Post::where('category_id',$category->id)->paginate(2);
    	return view('categories.category',['cate'=>$cate->posts()->orderBy('created_at','desc')->paginate(4) , 'namecate' => $namecate]);
    }

    public function tag($slug){
        $posts = \App\Tag::where('slug',$slug)->firstOrFail()->posts()->paginate(4);
        return view('categories.category',compact('posts'));
    }
    public function search(Request $request){
        $posts = \App\Post::where('title','like','%'.$request->name.'%')->paginate(4);
        return view('index',['name'=>$request->name,'posts'=>$posts]);
    }

    public function upload(Request $request){
        $path = $request->images;

        foreach ($path as $image) {
            $path = $image->store('images');
            // $image->storeAs('images',$image->getClientOriginalName());
        }
        dd($path);
        
    }

    // public function store(PostRequest $request){
    // 	$this->validate($request,
    //     [
    //         'title' => 'required|min:5|max:255',
    //         'description' => 'required|min:5',
    //         'content' => 'required|min:5'

    //     ],

    //     [
    //         'required' => ':attribute Không được để trống',
    //         'min' => ':attribute Không được nhỏ hơn :min',
    //         'max' => ':attribute Không được lớn hơn :max'
    //     ],

    //     [
    //         'title' => 'Tiêu đề',
    //         'description' => 'Mô tả',
    //         'content' => 'Nội dung'
    //     ]

    // );
    // }

   
}
