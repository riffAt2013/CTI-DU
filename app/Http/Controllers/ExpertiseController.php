<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ExpertiseController extends Controller
{
    public function index()
    {
        $data = [
            'expertises' => Expertise::get()->toQuery()->paginate(5),
        ];
        return view('admin.expertises.index', $data);
    }

    public function create()
    {
        return view('admin.expertises.create');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $expertiseImage = $request->file('image');
            $expertiseImageFileName = 'expertise' . time() . '.' . $expertiseImage->getClientOriginalExtension();
            if (!file_exists('assets/uploads/expertise')) {
                mkdir('assets/uploads/expertise', 0777, true);
            }
            $expertiseImage->move('assets/uploads/expertise', $expertiseImageFileName);
                        Image::make('assets/uploads/expertise/'.$expertiseImageFileName)->resize(480,480)->save('assets/uploads/expertise/'.$expertiseImageFileName);
        } else {
            $expertiseImageFileName = 'default_logo.png';
        }
        $expertise = Expertise::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $expertiseImageFileName,
        ]);
        $data = [
            'expertises' => Expertise::get()->toQuery()->paginate(5),
        ];
        Alert::success('Expertise created', 'Expertise  info created successfully');
        return view('admin.expertises.index', $data);
    }
    public function show(Expertise $expertise)
    {
        //
    }
    public function edit($id)
    {
        $expertise = Expertise::find($id);
        return view('admin.expertises.edit', compact('expertise'));
    }

    public function update(Request $request, Expertise $expertise)
    {

        $expertiseImageFileName = $expertise->image;
        if ($request->hasFile('image')) {
            $expertiseImage = $request->file('image');
            $expertiseImageFileName = 'expertise' . time() . '.' . $expertiseImage->getClientOriginalExtension();


            if (!file_exists('assets/uploads/expertise')) {
                mkdir('assets/uploads/expertise', 0777, true);
            }

            //delete old image if exist
            if (file_exists('assets/uploads/expertise/' . $expertise->image) and $expertise->image != 'default.png') {
                unlink('assets/uploads/expertise/' . $expertise->image);
            }
            $expertiseImage->move('assets/uploads/expertise', $expertiseImageFileName);
            Image::make('assets/uploads/expertise/'.$expertiseImageFileName)->resize(480,480)->save('assets/uploads/expertise/'.$expertiseImageFileName);

        }

        $expertise->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $expertiseImageFileName,

        ]);
        Alert::success('Expertise updated', 'Expertise  info updated successfully');
        return redirect()->route('expertise.index');
    }
    public function destroy($id)
    {
        Expertise::destroy($id);
        return redirect()->back();
    }
}
