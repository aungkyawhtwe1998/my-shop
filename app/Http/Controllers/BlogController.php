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
    public function showPost($id)
    {
        $post = Post::find($id);
        return view("blog-page.postShow", compact('post'));
    }

    public function showByCategory($id){
        // return $id;
        $categories = PostCategory::all();
        $posts = Post::orderBy("id","desc")->where('category_id',$id)->paginate(4);
        return view('blog-page.index',compact('posts','categories'));
    }


}
