<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\PostTag;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function show($id){
        $post = Post::find($id);
        return response()->json(['data'=>$post, 'cate'=>$post->category()->first(), 'tag'=>$post->tags()->get() ],200);
    }
    public function update(Request $request,$id){
        $post = Post::find($id);

        // return response()->json($request->all());
        $image = $request->thumbnail;
        $path = null;
        if($image != null){
           $path = $image->storeAs('images',$image->getClientOriginalName());
           $post->thumbnail = $path; 
       }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->save();
        return response()->json(['data'=>'done'],200);
        
    }
    
    public function store(Request $request){
       $image = $request->image;
       $path = null;
       if($image != null){
           $path = $image->storeAs('images',$image->getClientOriginalName());  
       }

       $post = new Post();
       $post->title = $request->title;
       $post->content = $request->content;
       $post->description = $request->description;
       $post->slug = str_slug($request->title.time());
       $post->category_id = $request->category_id;
       if($path != null){
        $post->thumbnail= $path;
       }
       
       $post->save();
       $tags = $request->tag;
       foreach ($tags as $value) {
        $tag = Tag::where('name',$value)->find(1);
        if($tag != null){
            $postTag = new PostTag();
            $postTag->tag_id = $tag->id;
            $postTag->post_id = $post->id;
            $postTag->save();
            
        }else{
            $tag = new Tag();
            $tag->name = $value;
            $tag->slug = str_slug($value.time());
            $tag->save();
            $postTag = new PostTag();
            $postTag->tag_id = $tag->id;
            $postTag->post_id = $post->id;
            $postTag->save();
        }

    }

    return response()->json(['data'=>'done'],200);
}

public function viewPost(){
    $cate = \App\Category::get();
    return view('admin.post.list',['cates'=>$cate]);
}

public function delete($id){
    $post = Post::find($id);
    $post->delete();
    return response()->json(['data'=>'done'],200);
}


public function getAll(){
    $posts = Post::select('posts.*')->orderBy('id','desc')->get();
        // dd($posts);
    return Datatables::of($posts)

    ->addColumn('action',function(Post $post){
        return 

        '<a data-url = "'.asset('').'post/show/'.$post->id.'" id="edit" class="btn btn-xs btn-primary glyphicon glyphicon-edit"></a> 


        <a data-url="'.asset('').'post/show/'.$post->id.'" id="detail" class="btn btn-xs btn-info glyphicon glyphicon-eye-open" ></a>

        <a data-url = "'.asset('').'post/delete/'.$post->id.'" id="delete" class="btn btn-xs btn-danger glyphicon glyphicon-remove-sign"></a>'

        ;
    })
    ->addColumn('category_name',function(Post $post){
        return '<p>'.$post->category->name.'</p>';
    })

    ->editColumn('thumbnail',function(Post $post){
        return '<img src="'.asset('storage').'/'.$post->thumbnail.'" alt="" style = "width:100px; height: auto;">';
    })
    ->editColumn('description',function(Post $post){
        return str_limit($post->description,50,'...');
    })
    ->editColumn('content',function(Post $post){
        return str::words($post->content,10,'...');
    })


    ->rawColumns(['thumbnail','action','description','content','category_name'])

    ->make(true);
}


}
