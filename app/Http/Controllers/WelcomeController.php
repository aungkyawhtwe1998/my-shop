<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        /*$categories = Category::all();

        $items = Item::all();

        $posts = Post::when(request()->category, function($query){
            $query->orderBy("id","desc")->where('category_id',request()->category)->get();

        })->when(request()->search, function ($query){
            $searchKey = request()->search;
            $query->where("name","LIKE","%$searchKey%")->orWhere("description","LIKE","%$searchKey%");
            //Eager Loading for sql DB
        })->orderBy("id","desc")->paginate(6);
        $categories = PostCategory::all();

        return view('welcome.index',compact('posts','categories','items','categories'));*/
        // return view('welcome.index',compact('items','categories'));
        $posts = Post::when(request()->category, function($query){
            $query->orderBy("id","desc")->where('category_id',request()->category)->get();
        })->when(request()->search, function ($query){
            $searchKey = request()->search;
            $query->where("name","LIKE","%$searchKey%")->orWhere("description","LIKE","%$searchKey%");
            //Eager Loading for sql DB
        })->orderBy("id","desc")->paginate(6);
        $categories = PostCategory::all();
        $items = Item::all();
        return view('welcome.index',compact('posts','items','categories'));
    }
    public function showItem($id)
    {
        $item = Item::find($id);
        return view("welcome.itemShow", compact('item'));
    }

    public function showByCategory($id){
        $categories = PostCategory::all();
        $posts = Post::orderBy("id","desc")->where('category_id',$id)->paginate(4);
        $items = Item::all();
        return view('welcome.index',compact('posts','items','categories'));
    }

    public function show($category, $id)
    {
        $post = Post::find($id);
        $posts = Post::orderBy('id','desc')->where('id','<>',$id)->where('category_id','=',$post->category_id)->limit(3)->get();
        // return $category;
        return view("welcome.postShow", compact('post','posts'));
    }


}
