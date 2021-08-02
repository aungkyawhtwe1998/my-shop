<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $items = Item::all();
        return view('welcome.index',compact('items','categories'));
    }
    public function show($id)
    {
        $item = Item::find($id);
        return view("welcome.itemShow", compact('item'));
    }
    public function showByCategory($id){
        // return $id;
        $categories = Category::all();

        $items = Item::all()->where('category_id',$id);
        return view('welcome.index',compact('items','categories'));

    }
}
