<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use Exception as ExceptionAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin',['only' => ['store','addImage','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $albums = Album::with('image')->paginate(10);
        return view('gallery.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     * @throws ExceptionAlias
     */
    public function store(Request $request)
    {
        /*       $this->validate($request,[
                  'image' => 'required|image|max:2560|mimes:jpeg,jpg,png'
               ]);
               $file = $request->file('image');
               if ($request->hasFile('image')){
                   $fileName = "Photos_".str_random(5).'.'.$file->getClientOriginalExtension();
                   if ($file->isValid()){
                       $file->storeAs('uploads',$fileName);
                       $data = [
                           'name' => $fileName,
                           'album_id' =>1
                       ];
                       Image::create($data);
                       $this->setSuccessMsg("Image Upload Successful!");
                       return redirect()->back();
                   }
               }
        */
        $request->validate([
            'image'     => 'required',
            'image.*'   => 'image|mimes:jpeg,png,jpg|max:2048',
            'album'     => 'required|string|min:4|max:32'
        ]);
        $album = Album::create(['name' => $request->get('album')]);
        if ($request->has('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $fileName = "Photos_" . str_random(5) . '.' . $image->getClientOriginalExtension();
//                $image->storeAs('uploads', $fileName);
                InterventionImage::make($image)->resize(null,300,function ($e){$e->aspectRatio();})->save('images/uploads/'.$fileName);
                Image::create([
                    'name'      => $fileName,
                    'album_id'  => $album->id,
                ]);
                $this->setSuccessMsg("Image Upload Successful!");
            }
            return redirect()->back();
        }
    }

    public function addImage(Request $request)
    {
        $request->validate([
            'image'     => 'required',
            'image.*'   => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($request->has('image')) {
            $images = $request->file('image');
            foreach ($images as $image) {
                $fileName = "Photos_" . str_random(5) . '.' . $image->getClientOriginalExtension();
//                $image->storeAs('uploads', $fileName);
                InterventionImage::make($image)->resize(null,300,function ($e){$e->aspectRatio();})->save('images/uploads/'.$fileName);
                Image::create([
                    'name'      => $fileName,
                    'album_id'  => $request->get('albumId'),
                ]);
                $this->setSuccessMsg("Image Upload Successful!");
            }
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        $images = Image::all()->where('album_id',$id);
        $album = Album::find($id);
        return view('gallery.show',compact(['images','album']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $delete = Image::find($id);
        $image  = $delete->name;
        $delete->delete();
        Storage::delete('uploads/'.$image);
        return redirect()->back();
    }
}
