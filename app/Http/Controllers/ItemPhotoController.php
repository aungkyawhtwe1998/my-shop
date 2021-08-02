<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemPhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ItemPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // return $request;
        $request->validate([
            "photo.*"=>"required|mimetypes:image/jpeg, image/jpg, image/png|file|max:2500"
        ]);
        $fileNameArr = [];
        foreach($request->file("photo") as $file){
            $newFileName= uniqid()."_item.".$file->getClientOriginalExtension();
            array_push($fileNameArr, $newFileName);
            $dir = "/public/items/";
            $file->storeAs($dir,$newFileName);
        }
        foreach ($fileNameArr as $f){
            $photo = new ItemPhoto();
            $photo->item_id = $request->item_id; //get the article id
            $photo->location = $f;
            $photo->save();
        }
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemPhoto  $itemPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(ItemPhoto $itemPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemPhoto  $itemPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemPhoto $itemPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemPhoto  $itemPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemPhoto $itemPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemPhoto  $itemPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemPhoto $itemPhoto)
    {
        // $itemPhoto->delete();
        // return redirect()->back()->with("toast",['icon'=>'success','title'=>'Photo is removed']);

        $dir = "public/items/";
        Storage::delete($dir.$itemPhoto->location);            
        $itemPhoto->delete();
        return redirect()->back()->with("toast",['icon'=>'success','title'=>"Photo has been deleted"]);
    }
}
