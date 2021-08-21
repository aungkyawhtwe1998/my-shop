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
        $posts = Post::orderBy("id","desc")->paginate(4);
        $categories = PostCategory::all();
        return view('blog-page.index',compact('posts','categories'));
    }
   


    public function showByCategory($id){
        $categories = PostCategory::all();
        $posts = Post::orderBy("id","desc")->where('category_id',$id)->paginate(4);
        return view('blog-page.index',compact('posts','categories'));
    } 

    public function show($category_id, $id)
    {        
        $post = Post::find($id);
        $posts = Post::orderBy('id','desc')->where('id','<>',$id)->where('category_id','=',$category_id)->limit(3)->get();
        // return $post;
        return view("blog-page.postShow", compact('post','posts'));
    }

}
