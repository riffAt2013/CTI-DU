<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PublicationController extends Controller
{
    public function index()
    {
        $data = [
            'rows' => Publication::get()->toQuery()->paginate(5),
        ];
        return view('admin.publications.index', $data);
    }
    public function create()
    {
        return view('admin.publications.create');
    }
    public function store(Request $request)
    {
        $data = Publication::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $data = [
            'rows' => Publication::get()->toQuery()->paginate(5),
        ];
        Alert::success('Publication info Added', 'Publication Info Added Successfully');
        return view('admin.publications.index', $data);
    }
    public function show(Publication $data)
    {
        //
    }
    public function edit($id)
    {
        $data = Publication::find($id);
        return view('admin.publications.edit', compact('data'));
    }
    public function update(Request $request, Publication $publication)
    {
        $publication->update([
            'title' => $request->title,
            'description' => $request->description,

        ]);

        Alert::success('Publication info Updated', 'Publication Info Updated Successfully');
        return redirect()->route('publication.index');
    }
    public function destroy($id)
    {
        Publication::destroy($id);
        return redirect()->back();
    }
}
