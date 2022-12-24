<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = [
            'mission' => Mission::first(),
        ];

        return view('admin.missions.edit', $data);
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
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show(Mission $mission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit(Mission $mission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Mission $mission)
    {
//        dd($request->all());

        $missionImageFileName = $mission->image;
        if ($request->hasFile('image')){
            $missionImage = $request->file('image');
            $missionImageFileName = 'mission'.time() . '.' . $missionImage->getClientOriginalExtension();


            if (!file_exists('assets/uploads/mission')){
                mkdir('assets/uploads/mission', 0777, true);
            }

            //delete old image if exist
            if (file_exists('assets/uploads/mission/'.$mission->image) and $mission->image != 'default.png'){
                unlink('assets/uploads/mission/'.$mission->image);
            }
            $missionImage->move('assets/uploads/mission', $missionImageFileName);
            Image::make('assets/uploads/mission/'.$missionImageFileName)->resize(600,400)->save('assets/uploads/mission/'.$missionImageFileName);
        }

        $mission->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $missionImageFileName,

        ]);
        Alert::success('Mission info Updated', 'Mission Info Updated Successfully');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Mission::destroy($id);
        return redirect()->back();
    }
}
