<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = [
            'plan' => Plan::first(),
        ];

        return view('admin.plans.edit', $data);
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
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Plan $plan)
    {
        $planImageFileName = $plan->image;
        if ($request->hasFile('image')) {
            $planImage = $request->file('image');
            $planImageFileName = 'plan' . time() . '.' . $planImage->getClientOriginalExtension();


            if (!file_exists('assets/uploads/plan')) {
                mkdir('assets/uploads/plan', 0777, true);
            }

            //delete old image if exist
            if (file_exists('assets/uploads/plan/' . $plan->image) and $plan->image != 'default.png') {
                unlink('assets/uploads/plan/' . $plan->image);
            }
            $planImage->move('assets/uploads/plan', $planImageFileName);
            Image::make('assets/uploads/plan/' . $planImageFileName)->resize(600, 400)->save('assets/uploads/plan/' . $planImageFileName);
        }

        $plan->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $planImageFileName,

        ]);
        Alert::success('Plan info Updated', 'Plan Info Updated Successfully');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Plan::destroy($id);
        return redirect()->back();
    }
}
