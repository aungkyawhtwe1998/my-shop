<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::when(request()->category, function($query){
            $query->orderBy("id","desc")->where('category_id',request()->category)->get();
        })->when(request()->search, function ($query){
            $searchKey = request()->search;
            $query->where("name","LIKE","%$searchKey%")->orWhere("description","LIKE","%$searchKey%");
            //Eager Loading for sql DB
        })->orderBy("id","desc")->paginate(4);
        $categories = PostCategory::all();
        return view('blog-page.index',compact('posts','categories'));
    }
   


    public function showByCategory($id){
        $categories = PostCategory::all();
        $posts = Post::orderBy("id","desc")->where('category_id',$id)->paginate(4);
        return view('blog-page.index',compact('posts','categories'));
    } 

    public function show($category, $id)
    {        
        $post = Post::find($id);
        $posts = Post::orderBy('id','desc')->where('id','<>',$id)->where('category_id','=',$post->category_id)->limit(3)->get();
        // return $category;
        return view("blog-page.postShow", compact('post','posts'));
    }

}
