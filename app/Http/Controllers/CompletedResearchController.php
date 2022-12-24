<?php

namespace App\Http\Controllers;

use App\Models\CompletedResearch;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CompletedResearchController extends Controller
{
    public function index()
    {
        $data = [
            'rows' => CompletedResearch::get()->toQuery()->paginate(5),
        ];
        return view('admin.completed-researches.index', $data);
    }
    public function create()
    {
        return view('admin.completed-researches.create');
    }
    public function store(Request $request)
    {
        $data = CompletedResearch::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $data = [
            'rows' => CompletedResearch::get()->toQuery()->paginate(5),
        ];
        Alert::success('Information Created', 'Completed Research info added successfully');
        return view('admin.completed-researches.index', $data);
    }
    public function show(CompletedResearch $data)
    {
        //
    }
    public function edit($id)
    {
        $data = CompletedResearch::find($id);
        return view('admin.completed-researches.edit', compact('data'));
    }
    public function update(Request $request, CompletedResearch $completedResearch)
    {
        $completedResearch->update([
            'title' => $request->title,
            'description' => $request->description,

        ]);

        Alert::success('Information Updated', 'Completed Research info updated successfully');
        return redirect()->route('completed-research.index');
    }
    public function destroy($id)
    {
        CompletedResearch::destroy($id);
        return redirect()->back();
    }
}
