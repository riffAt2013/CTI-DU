<?php

namespace App\Http\Controllers;

use App\Models\HigherEducation;
use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = [
            'hero' => Hero::first(),
        ];

        return view('admin.heroes.edit', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.heroes.create');
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
            $imageFileName = 'hero' . time() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('assets/uploads/hero')) {
                mkdir('assets/uploads/hero', 0777, true);
            }
            $image->move('assets/uploads/hero', $imageFileName);
            Image::make('assets/uploads/hero/'.$imageFileName)->resize(800,500)->save('assets/uploads/hero/'.$imageFileName);
        } else {
            $imageFileName = 'default_logo.png';
        }
        $hero = Hero::create([
            'image' => $imageFileName,
        ]);


        $data = [
            'heroes' => Hero::get()->toQuery()->paginate(5),
        ];
        Alert::success('Hero Content Added', 'Hero Content Added Successfully');
        return view('admin.heroes.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $hero = Hero::find($id);
        return view('admin.heroes.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Hero $hero)
    {
        $heroImageFileName = $hero->image;
        if ($request->hasFile('image')){
            $heroImage = $request->file('image');
            $heroImageFileName = 'hero'.time() . '.' . $heroImage->getClientOriginalExtension();


            if (!file_exists('assets/uploads/hero')){
                mkdir('assets/uploads/hero', 0777, true);
            }

            //delete old image if exist
            if (file_exists('assets/uploads/hero/'.$hero->image) and $hero->image != 'default.png'){
                unlink('assets/uploads/hero/'.$hero->image);
            }
            $heroImage->move('assets/uploads/hero', $heroImageFileName);
            Image::make('assets/uploads/hero/'.$heroImageFileName)->resize(1920,1088)->save('assets/uploads/hero/'.$heroImageFileName);
        }

        $hero->update([
            'image' => $heroImageFileName,
        ]);
        Alert::success('Hero Content Updated', 'Hero Content Updated Successfully');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Hero::destroy($id);
        return redirect()->back();
    }
}
