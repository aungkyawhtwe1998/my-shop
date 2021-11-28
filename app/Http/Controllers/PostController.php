<?php
namespace App\Http\Controllers;

use App\Category;
use App\ItemPhoto;
use App\Post;
use App\PostCategory;
use App\PostCoverPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$posts = Post::all();
        foreach ($posts as $p){
            $p->slug = Str::slug($p->name)."-".uniqid();
            $p->update();
        }*/

        $posts = Post::when((isset(request()->search)), function ($q){
            $search = request()->search;
            $q->where("name","like","%$search%")->orwhere("description", "Like","%$search%");
        })->when(Auth::user()->role!=0,function($query){
            $query->where('user_id',Auth::id());
        })->latest("id")->paginate(3);
        return view('post-manager.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PostCategory::all();
        return view('post-manager.add-post',compact('categories'));
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
            'name'=>'required|unique:posts,name|min:10|max:150',
            'description'=>'required|min:10',
            'category_id'=>'required|exists:post_categories,id',
            "photo"=>"required|mimetypes:image/jpeg,image/png",
        ]);
        if($request->hasFile("photo")){
            $newFileName = uniqid()."_item.".$request->file('photo')->getClientOriginalExtension();
            $img = Image::make($request->file('photo'));
            // $img->fit(300,300);
            // $file->storeAs($dir,$newFileName);
            $img->save("storage/post-cover/".$newFileName);
        }
        $post = new Post();
        $post->name = $request->name;
        $post->slug =Str::slug($request->name)."-".uniqid();
        $post->description = textFilter($request->description);
        $post->user_id = Auth::id();
        $post->category_id = $request->category_id;
        $post->save();

        $post_photo = new PostCoverPhoto();
        $post_photo->location = $newFileName;
        $post_photo->post_id = $post->id;
        $post_photo->save();

        return redirect()->route('post.index')->with("toast",['icon'=>'success','title'=>$post->name." has been saved"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post-manager.show-post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
//        $categories = PostCategory::all();
        return view('post-manager.edit-post',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'category_id'=>'required',
        ]);
        $post->name = $request->name;
        if($post->name != $request->name){
            $post->slug =Str::slug($request->name)."-".uniqid();
        }
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->update();
        return redirect()->route('post.index')->with("toast",['icon'=>'success','title'=>$request->name.' is updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(isset($post->getPhotos)){
            $dir = "public/item-cover/";
            foreach($post->getPhotos as $p){
                Storage::delete($dir.$p->location);
            }
            $toDel = $post->getPhotos->pluck('id');
            ItemPhoto::destroy($toDel);
        }
        $post->delete();
        return redirect()->route('post.index',['page'=>request()->page])->with("toast",['icon'=>'success','title'=>$post->title." has been deleted"]);

    }
}
