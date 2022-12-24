<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = [
            'services' => Service::get()->toQuery()->paginate(5),
        ];
        return view('admin.services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.services.create');
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
            $serviceImage = $request->file('image');
            $serviceImageFileName = 'service' . time() . '.' . $serviceImage->getClientOriginalExtension();
            if (!file_exists('assets/uploads/service')) {
                mkdir('assets/uploads/service', 0777, true);
            }
            $serviceImage->move('assets/uploads/service', $serviceImageFileName);
            Image::make('assets/uploads/service/' . $serviceImageFileName)->resize(600, 400)->save('assets/uploads/service/' . $serviceImageFileName);
        } else {
            $serviceImageFileName = 'default_logo.png';
        }

        //        dd($request->all());

        $service = Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $serviceImageFileName,
        ]);


        $data = [
            'services' => Service::get()->toQuery()->paginate(5),
        ];
        Alert::success('Service info Added', 'Service Info Added Successfully');
        return view('admin.services.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Service $service)
    {

        $serviceImageFileName = $service->image;
        if ($request->hasFile('image')) {
            $serviceImage = $request->file('image');
            $serviceImageFileName = 'service' . time() . '.' . $serviceImage->getClientOriginalExtension();


            if (!file_exists('assets/uploads/service')) {
                mkdir('assets/uploads/service', 0777, true);
            }

            //delete old image if exist


            if (file_exists('assets/uploads/service/' . $service->image) and $service->image != 'default.png') {
                unlink('assets/uploads/service/' . $service->image);
            }
            $serviceImage->move('assets/uploads/service', $serviceImageFileName);
            Image::make('assets/uploads/service/' . $serviceImageFileName)->resize(600, 400)->save('assets/uploads/service/' . $serviceImageFileName);
        }

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $serviceImageFileName,

        ]);

        Alert::success('Service info Updated', 'Service Info Updated Successfully');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Service::destroy($id);
        return redirect()->back();
    }
}
