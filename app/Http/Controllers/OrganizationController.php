<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = [
            'organizations' => Organization::get()->toQuery()->paginate(5),
        ];
        return view('admin.organizations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.organizations.create');
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
            $imageFileName = 'organization' . time() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('assets/uploads/organization')) {
                mkdir('assets/uploads/organization', 0777, true);
            }
            $image->move('assets/uploads/organization', $imageFileName);
            Image::make('assets/uploads/organization/' . $imageFileName)->resize(400, 400)->save('assets/uploads/organization/' . $imageFileName);
        } else {
            $imageFileName = 'default_logo.png';
        }

        //        dd($request->all());
        $organization = Organization::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageFileName,
        ]);


        $data = [
            'organizations' => Organization::get()->toQuery()->paginate(5),
        ];
        Alert::success('Organization info Added', 'Organization Info Added Successfully');
        return view('admin.organizations.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $organization = Organization::find($id);
        return view('admin.organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Organization $organization)
    {
        $organizationImageFileName = $organization->image;
        if ($request->hasFile('image')) {
            $organizationImage = $request->file('image');
            $organizationImageFileName = 'organization' . time() . '.' . $organizationImage->getClientOriginalExtension();


            if (!file_exists('assets/uploads/organization')) {
                mkdir('assets/uploads/organization', 0777, true);
            }

            //delete old image if exist


            if (file_exists('assets/uploads/organization/' . $organization->image) and $organization->image != 'default.png') {
                unlink('assets/uploads/organization/' . $organization->image);
            }
            $organizationImage->move('assets/uploads/organization', $organizationImageFileName);
            Image::make('assets/uploads/organization/' . $organizationImageFileName)->resize(600, 600)->save('assets/uploads/organization/' . $organizationImageFileName);
        }

        $organization->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $organizationImageFileName,

        ]);
        Alert::success('Organization info Updated', 'Organization Info Updated Successfully');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Organization::destroy($id);
        return redirect()->back();
    }
}
