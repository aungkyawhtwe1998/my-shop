<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $items = Item::all();
        return view('welcome.index',compact('items','categories'));
    }
    public function showItem($id)
    {
        $item = Item::find($id);
        return view("welcome.itemShow", compact('item'));
    }
    
    public function showPortfolio()
    {   
        $posts = Post::orderBy('id','desc')->limit(3)->get();
        return view("welcome.portfolio",compact('posts'));
    }
    public function showByCategory($id){
        // return $id;
        $categories = Category::all();
        $items = Item::all()->where('category_id',$id);
        return view('welcome.index',compact('items','categories'));

    }
}
