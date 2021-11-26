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
        })->with(['users','categories','thumbnail'])->orderBy("id","desc")->paginate(2);

        return view('blog.index',compact('posts'));
    }
    public function showByCategory($id){
        $posts = Post::when(request()->category, function($query){
            $query->orderBy("id","desc")->where('category_id',request()->category)->get();
        })->when(request()->search, function ($query){
            $searchKey = request()->search;
            $query->where("name","LIKE","%$searchKey%")->orWhere("description","LIKE","%$searchKey%");
            //Eager Loading for sql DB
        })->where("category_id", $id)->with(['users','categories','thumbnail'])->orderBy("id","desc")->paginate(10);
       /* $categories = PostCategory::all();
        $posts = Post::orderBy("id","desc")->where('category_id',$id)->paginate(4);*/
        return view('blog.index',compact('posts'));
    }
    public  function baseOnUser($id){
        $posts = Post::where("user_id", $id)->when(request()->category, function($query){
            $query->orderBy("id","desc")->where('category_id',request()->category)->get();
        })->when(request()->search, function ($query){
            $searchKey = request()->search;
            $query->where("name","LIKE","%$searchKey%")->orWhere("description","LIKE","%$searchKey%");
            //Eager Loading for sql DB
        })->with(['users','categories','thumbnail'])->orderBy("id","desc")->paginate(10);
        /* $categories = PostCategory::all();
         $posts = Post::orderBy("id","desc")->where('category_id',$id)->paginate(4);*/
        return view('blog.index',compact('posts'));
    }
    public function baseOnDate($date){
        $posts = Post::where("created_at", $date)->when(request()->category, function($query){
            $query->orderBy("id","desc")->where('category_id',request()->category)->get();
        })->when(request()->search, function ($query){
            $searchKey = request()->search;
            $query->where("name","LIKE","%$searchKey%")->orWhere("description","LIKE","%$searchKey%");
            //Eager Loading for sql DB
        })->with(['users','categories','thumbnail'])->orderBy("id","desc")->paginate(10);
        /* $categories = PostCategory::all();
         $posts = Post::orderBy("id","desc")->where('category_id',$id)->paginate(4);*/
        return view('blog.index',compact('posts'));
    }

    public function showRelatedPost($id)
    {

        $post = Post::find($id);
        $related_posts = Post::orderBy('id','desc')->where('id','<>',$id)->where('category_id','=',$post->category_id)->limit(4)->get();
        $previousPost = Post::where("id","<",$id)->latest()->first();
        $nextPost = Post::where("id",">",$id)->first();
//        return $previousPost." ".$nextPost;
        return view("blog.detail", compact('post','related_posts','previousPost', 'nextPost'));
    }



}
