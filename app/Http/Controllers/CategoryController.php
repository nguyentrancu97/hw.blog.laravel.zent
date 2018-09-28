<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Yajra\Datatables\Datatables;
class CategoryController extends Controller
{
    public function viewCate(){
        return view('admin.category.list');
    }

    public function show($id){
        $cate = Category::find($id);
        return response()->json(['data'=>$cate],200);
    }

 
    public function update(Request $request,$id){
    	$cate = Category::find($id);
    	$cate->update($request->all());
    	return response()->json(['data'=>'done'],200);
    }
    

    public function store(Request $request){
        
    	Category::create($request->all());	
        
        return redirect('viewCate');
    }

    public function delete($id){
        $cate = Category::find($id);
        $cate->delete();
        return response()->json(['data'=>'done'],200);
    }
  

    public function getAll(){
        $cate = Category::all();
        return Datatables::of($cate)

        ->addColumn('action',function($category){
            return 

            '<a data-url = "'.asset('').'cate/show/'.$category->id.'" id="edit" class="btn btn-xs btn-primary glyphicon glyphicon-edit"></a> 
			

            <a data-url="'.asset('').'cate/show/'.$category->id.'" id="detail" class="btn btn-xs btn-info glyphicon glyphicon-eye-open" ></a>

            <a data-url = "'.asset('').'cate/delete/'.$category->id.'" id="delete" class="btn btn-xs btn-danger glyphicon glyphicon-remove-sign"></a>'
			
          

            ;
        })
        ->make(true);
    }
}
