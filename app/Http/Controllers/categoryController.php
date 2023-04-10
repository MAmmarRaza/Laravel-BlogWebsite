<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //addCatData
    function addCategoryData(Request $request){
        $count=0;
        $cat= new category;
        $cat->category_name=$request->cat;
        $cat->post=$count;
        $cat->save();

        return redirect('/admin/category');
    }
    //increment post value on clicking addpost b
    function saveCatPostCount(Request $req){
        $data = Category::where('category_id', $req->category)->increment('post');
    }

    function showCategoryData(){
        $result= category::all();
        $row=['result'=> $result];
        return view('/admin/category',$row);
        
    }

    function dltCategoryData($id){
        $data= category::where('category_id',$id);
        $data->delete();
        return redirect('/admin/category');
    }

    function fillToUpdateData($id)
    {
        $row= category::where('category_id',$id)->first();
        return view("/admin/update-category",['row'=> $row]);
        
    }

    function updateCategoryData(Request $req)
    {
        $data= category::where('category_id',$req->cat_id)->update([
                    'category_name'=>$req->cat_name
        ]);
        return redirect('/admin/category');
    }

    
    

}
