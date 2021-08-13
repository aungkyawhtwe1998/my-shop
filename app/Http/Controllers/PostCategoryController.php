<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategory = PostCategory::all();
        return view('category-manager.post_index',compact('postCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:100'
        ]);
        $category = new PostCategory();
        $category->title = $request->title;
        $category->user_id = Auth::id();
        $category->save();
        return redirect()->back()->with("toast",['icon'=>'success','title'=>"Category $request->title is added"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name"=>"required|String|max:100"
        ]);
        if($validator->fails()){
            return response()->json(['status'=>422,"message"=>$validator->errors()]);
        }
        $category = PostCategory::find($request->id);
        $category->title = $request->name;
        $category->update();
        return response()->json(['status'=>200,"message"=>"Name Change for $category->title is complete"]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postCategory)
    {
        // $category=PostCategory::find($id);
        $postCategory->delete();
        return redirect()->back()->with("toast",['icon'=>'success','title'=>"Category $postCategory->title is deleted"]);
    }
}
