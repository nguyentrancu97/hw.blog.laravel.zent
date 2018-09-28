<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Yajra\Datatables\Datatables;

class TagController extends Controller
{	

  public function store(Request $request){

    $tag = Tag::create($request->all());
    return response()->json(['data'=>'done'],200);

  }

  public function update(Request $request,$id){
    $tag = Tag::find($id);
    $tag->update($request->all());
    return response()->json(['data'=>'done'],200);
  }

  public function show($id){
    $tag = Tag::find($id);
    return response()->json(['data'=>$tag],200);
  }
  public function delete($id){
    $tag = Tag::find($id);
    $tag->delete();
    return response()->json(['data'=>'done'],200);
  }

  public function viewTag(){
    return view('admin.tag.list');
  }
  public function getTag(){
   $tag = Tag::all();
   return Datatables::of($tag)

   ->addColumn('action',function($tag){
    return 

    '<a data-url = "'.asset('').'tag/show/'.$tag->id.'" id="edit" class="btn btn-xs btn-primary glyphicon glyphicon-edit"></a> 


    <a data-url="'.asset('').'tag/show/'.$tag->id.'" id="detail" class="btn btn-xs btn-info glyphicon glyphicon-eye-open" ></a>

    <a data-url = "'.asset('').'tag/delete/'.$tag->id.'" id="delete" class="btn btn-xs btn-danger glyphicon glyphicon-remove-sign"></a>'

    ;
  })
   ->make(true);
 }
}
