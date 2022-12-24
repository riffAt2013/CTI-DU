<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = [
            'members' => Member::get()->toQuery()->paginate(5),
        ];
        return view('admin.members.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.members.create');
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
            $imageFileName = 'member' . time() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('assets/uploads/member')) {
                mkdir('assets/uploads/member', 0777, true);
            }
            $image->move('assets/uploads/member', $imageFileName);
            Image::make('assets/uploads/member/'.$imageFileName)->resize(600,600)->save('assets/uploads/member/'.$imageFileName);
        } else {
            $imageFileName = 'default_logo.png';
        }

//        dd($request->all());
        $member = Member::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'message' => $request->message,
            'image' => $imageFileName,
        ]);


        $data = [
            'members' => Member::get()->toQuery()->paginate(5),
        ];
        Alert::success('Member info Added', 'Member Info Added Successfully');
        return view('admin.members.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Member $member)
    {
        $memberImageFileName = $member->image;
        if ($request->hasFile('image')){
            $memberImage = $request->file('image');
            $memberImageFileName = 'member'.time() . '.' . $memberImage->getClientOriginalExtension();


            if (!file_exists('assets/uploads/member')){
                mkdir('assets/uploads/member', 0777, true);
            }

            //delete old image if exist


            if (file_exists('assets/uploads/member/'.$member->image) and $member->image != 'default.png'){
                unlink('assets/uploads/member/'.$member->image);
            }
            $memberImage->move('assets/uploads/member', $memberImageFileName);
            Image::make('assets/uploads/member/'.$memberImageFileName)->resize(600,600)->save('assets/uploads/member/'.$memberImageFileName);
        }

        $member->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'message' => $request->message,
            'image' => $memberImageFileName,

        ]);
        Alert::success('Member info Updated', 'Member Info Updated Successfully');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Member::destroy($id);
        return redirect()->back();
    }
}
