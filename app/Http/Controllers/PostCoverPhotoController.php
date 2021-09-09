<?php

namespace App\Http\Controllers;

use App\PostCoverPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostCoverPhotoController extends Controller
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
        $request->validate([
            "photo"=>"required|mimetypes:image/jpeg,image/png"
        ]);
        $newFileName= uniqid()."_item.".$request->file("photo")->getClientOriginalExtension();
        $img = Image::make($request->file("photo"));
        $img->save("storage/post-cover/".$newFileName);
        $photo = new PostCoverPhoto();
        $photo->post_id = $request->item_id; //get the article id
        $photo->location = $newFileName;
        $photo->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostCoverPhoto  $postCoverPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(PostCoverPhoto $postCoverPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostCoverPhoto  $postCoverPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCoverPhoto $postCoverPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostCoverPhoto  $postCoverPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCoverPhoto $postCoverPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostCoverPhoto  $postCoverPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCoverPhoto $postCoverPhoto)
    {
        $dir = "public/post-cover/";
        Storage::delete($dir.$postCoverPhoto->location);
        $postCoverPhoto->delete();
        return redirect()->back()->with("toast",['icon'=>'success','title'=>"Photo has been deleted"]);
    }
}
