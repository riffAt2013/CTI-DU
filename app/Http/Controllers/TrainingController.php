<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class TrainingController extends Controller
{
    public function index()
    {
        $data = [
            'trainings' => Training::get()->toQuery()->paginate(5),
        ];
        return view('admin.trainings.index', $data);
    }

    public function create()
    {
        return view('admin.trainings.create');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $trainingImage = $request->file('image');
            $trainingImageFileName = 'training' . time() . '.' . $trainingImage->getClientOriginalExtension();
            if (!file_exists('assets/uploads/training')) {
                mkdir('assets/uploads/training', 0777, true);
            }
            $trainingImage->move('assets/uploads/training', $trainingImageFileName);
                        Image::make('assets/uploads/training/'.$trainingImageFileName)->resize(600,400)->save('assets/uploads/training/'.$trainingImageFileName);
        } else {
            $trainingImageFileName = 'default_logo.png';
        }
        $training = Training::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $trainingImageFileName,
        ]);
        $data = [
            'trainings' => Training::get()->toQuery()->paginate(5),
        ];
        Alert::success('Training info Added', 'Training Info Added Successfully');
        return view('admin.trainings.index', $data);
    }
    public function show(Training $training)
    {
        //
    }
    public function edit($id)
    {
        $training = Training::find($id);
        return view('admin.trainings.edit', compact('training'));
    }

    public function update(Request $request, Training $training)
    {

        $trainingImageFileName = $training->image;
        if ($request->hasFile('image')) {
            $trainingImage = $request->file('image');
            $trainingImageFileName = 'training' . time() . '.' . $trainingImage->getClientOriginalExtension();


            if (!file_exists('assets/uploads/training')) {
                mkdir('assets/uploads/training', 0777, true);
            }

            //delete old image if exist
            if (file_exists('assets/uploads/training/' . $training->image) and $training->image != 'default.png') {
                unlink('assets/uploads/training/'.$training->image);
            }
            $trainingImage->move('assets/uploads/training', $trainingImageFileName);
            Image::make('assets/uploads/training/'.$trainingImageFileName)->resize(600,400)->save('assets/uploads/training/'.$trainingImageFileName);

        }

        $training->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $trainingImageFileName,

        ]);
        Alert::success('Training info Updated', 'Training Info Updated Successfully');
        return redirect()->route('training.index');
    }
    public function destroy($id)
    {
        Training::destroy($id);
        return redirect()->back();
    }
}
