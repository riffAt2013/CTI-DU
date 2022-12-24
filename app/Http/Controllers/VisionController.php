<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = [
            'vision' => Vision::first(),
        ];

        return view('admin.visions.edit', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function show(Vision $vision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function edit(Vision $vision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Vision $vision)
    {
        $visionImageFileName = $vision->image;
        if ($request->hasFile('image')){
            $visionImage = $request->file('image');
            $visionImageFileName = 'vision'.time() . '.' . $visionImage->getClientOriginalExtension();


            if (!file_exists('assets/uploads/vision')){
                mkdir('assets/uploads/vision', 0777, true);
            }

            //delete old image if exist
            if (file_exists('assets/uploads/vision/'.$vision->image) and $vision->image != 'default.png'){
                unlink('assets/uploads/vision/'.$vision->image);
            }
            $visionImage->move('assets/uploads/vision', $visionImageFileName);
            Image::make('assets/uploads/vision/'.$visionImageFileName)->resize(600,400)->save('assets/uploads/vision/'.$visionImageFileName);
        }

        $vision->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $visionImageFileName,

        ]);
        Alert::success('Vision info Updated', 'Vision Info Updated Successfully');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Vision::destroy($id);
        return redirect()->back();
    }
}
