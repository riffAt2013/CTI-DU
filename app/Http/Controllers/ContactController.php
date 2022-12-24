<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'rows' => Contact::get()->toQuery()->paginate(5),
        ];
        return view('admin.contacts.index', $data);
    }
    public function create()
    {
        return view('admin.contacts.create');
    }
    public function store(Request $request)
    {
        $data = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message
        ]);
        $data = [
            'rows' => Contact::get()->toQuery()->paginate(5),
        ];
        Alert::success('Message Submitted', 'You Message has been sent successfully');
        return redirect()->back();
    }
    public function show(Contact $data)
    {
        //
    }
    public function edit($id)
    {
        $data = Contact::find($id);
        return view('admin.contacts.edit', compact('data'));
    }
    public function update(Request $request, Contact $contact)
    {
        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message

        ]);

        return redirect()->route('contact.index');
    }
    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->back();
    }
}
