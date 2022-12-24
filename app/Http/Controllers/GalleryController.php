<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = [
            'galleries' => Gallery::get()->toQuery()->paginate(10),
        ];

        return view('admin.galleries.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = 'gallery' . time() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('assets/uploads/gallery')) {
                mkdir('assets/uploads/gallery', 0777, true);
            }
            $image->move('assets/uploads/gallery', $imageFileName);
            Image::make('assets/uploads/gallery/'.$imageFileName)->resize(600,400)->save('assets/uploads/gallery/'.$imageFileName);
        } else {
            $imageFileName = 'default_logo.png';
        }
        $gallery = Gallery::create([
            'title' => $request->title,
            'category' => $request->category,
            'image' => $imageFileName,
        ]);


        $data = [
            'galleries' => Gallery::get()->toQuery()->paginate(5),
        ];
        Alert::success('Image Added', 'New Image Added Successfully');
        return view('admin.galleries.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Gallery $gallery)
    {
        $galleryImageFileName = $gallery->image;
        if ($request->hasFile('image')){
            $galleryImage = $request->file('image');
            $galleryImageFileName = 'gallery'.time() . '.' . $galleryImage->getClientOriginalExtension();


            if (!file_exists('assets/uploads/gallery')){
                mkdir('assets/uploads/gallery', 0777, true);
            }

            //delete old image if exist
            if (file_exists('assets/uploads/gallery/'.$gallery->image) and $gallery->image != 'default.png'){
                unlink('assets/uploads/gallery/'.$gallery->image);
            }
            $galleryImage->move('assets/uploads/gallery', $galleryImageFileName);
            Image::make('assets/uploads/gallery/'.$galleryImageFileName)->resize(600,400)->save('assets/uploads/gallery/'.$galleryImageFileName);
        }

        $gallery->update([
            'title' => $request->title,
            'image' => $galleryImageFileName,
            'category' => $request->category,

        ]);
        Alert::success('Image Updated', 'New Image Updated Successfully');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Gallery::destroy($id);
        return redirect()->back();
    }
}
