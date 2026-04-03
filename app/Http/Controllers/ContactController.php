<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('website.contact_us');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $table=new contact();
        $table->name=$request->name;
        $table->email=$request->email;
        $table->comment=$request->comment;
        $table->save();
        return redirect('/contact')->with('success', 'Message sent successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = contact::all();
        return view('admin.admin_contact_reports', ["contact" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contact $contact)
    {
        //
    }
}
