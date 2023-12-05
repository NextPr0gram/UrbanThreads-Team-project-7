<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Category2Controller extends Controller
{
    public function c2view(){
        $category2 = Category::all();
    return view('Testpages.testc2', compact('category2'));

    }
    public function add(){
        return view('Testpages.testaddc2');
    }
    public function insert(Request $request)
    {
        $category = new Category();
        if($request->hasFile('image'))
        {
            $file = $request ->file('image');
            $ext = $file ->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category2/' , $filename);
            $category->image=$filename;
        }
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status') == TRUE?'1':'0';
        $category->status=$request->input('popular') == TRUE?'1':'0';
        $category->meta_title=$request->input('meta_title');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->meta_description=$request->input('meta_description');
        $category->save();
        return redirect('/dashboard')->with('status', "Category Added");
        //FRONT END NEEDS TO BE MADE - FOR ADMIN DASHBOARD

    }
}
