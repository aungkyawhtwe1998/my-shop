<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\ItemPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::when(Auth::user()->role != 0, function($query){
            $query->where('user_id',Auth::id());
        })->when(request()->search, function ($query){
            $searchKey = request()->search;
            $query->where("title","LIKE","%$searchKey%")->orWhere("description","LIKE","%$searchKey%");
            //Eager Loading for sql DB
        })->with(["getUser","getPhotos"])->orderBy("id","desc")->paginate(5);
        return view('item-manager.index',compact('items'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('item-manager.add-item',compact('categories'));
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
            'title'=>'required|max:255',
            'description'=>'required|min:30',
            'category_id'=>'required',
            "photo.*"=>"required|mimetypes:image/jpeg,image/png"
        ]);
        if($request->hasFile("photo")){
            $fileNameArr = [];
            foreach($request->file('photo') as $file){
                $newFileName = uniqid()."_item.".$file->getClientOriginalExtension();
                $img = Image::make($file);
                $img->fit(300,300);                
                array_push($fileNameArr, $newFileName);
                // $file->storeAs($dir,$newFileName);
                $img->save("storage/items/".$newFileName);
            }
        }

        $item = new Item();
        $item->title = $request->title;
        $item->description = $request->description;
        $item->category_id = $request->category_id;
        $item->user_id = Auth::id();
        $item->save();

        if($request->hasFile('photo')){
            foreach($fileNameArr as $f){
                $item_photo = new ItemPhoto();
                $item_photo->item_id = $item->id;
                $item_photo->location = $f;
                $item_photo->save();
            }
            
        }
        return redirect()->route('item.index')->with("toast",['icon'=>'success','title'=>$item->title." has been saved"]);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view("item-manager.item_detail", compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();

        return view('item-manager.item-edit',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'title'=>'required|min:10|max:255',
            'description'=>'required|min:30'            
        ]);
        $item->title = $request->title;
        $item->description = $request->description;
        $item->category_id = $request->category_id;
        $item->update();
        return redirect()->route('item.index')->with("toast",['icon'=>'success','title'=>$request->title.' is updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        // if(Gate::allows('item-delete', $item)){
        //     if(isset($item->getPhotos)){
        //         $dir = "public/items/";
        //         foreach($item->getPhotos as $p){
        //             Storage::delete($dir.$p->location);
        //         }
        //         $toDel = $item->getPhotos->pluck('id');
        //         ItemPhoto::destroy($toDel);
        //     }
        //     $item->delete();
        //     return redirect()->route('item.index')->with("toast",['icon'=>'success','title'=>$item->title." has been deleted"]);
        // }
        // return abort(404);    

        if(isset($item->getPhotos)){
            $dir = "public/items/";
            foreach($item->getPhotos as $p){
                Storage::delete($dir.$p->location);
            }
            $toDel = $item->getPhotos->pluck('id');
            ItemPhoto::destroy($toDel);                   
        }
        $item->delete();
        return redirect()->route('item.index')->with("toast",['icon'=>'success','title'=>$item->title." has been deleted"]);

    }
}
