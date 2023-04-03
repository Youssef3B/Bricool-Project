<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\service;


use Illuminate\Http\Request;

class Manageservices extends Controller
{
    public function showAll()
    {
        $services = DB::table('services')->where('id_user', auth()->id())->paginate(2);

        return view('manageservices.manageservices')->with('services', $services);
    }
    public function deleteservice($id)
    {
        $service = service::find($id);
        $service->delete();
        return redirect()->route('manageServices')->with('success', 'Service deleted successfully');

        // return back();
    }
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('editservice.editservice', compact('service'));
    }
    /**
     * Update the specified service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $service->title = $request->input('title');
        $service->description = $request->input('description');

        // Handle file uploads
        if ($request->hasFile('image_one')) {
            // Assuming you have a public disk defined in your config/filesystems.php
            // $path = $request->file('image_one')->store('.');
            // $service->image_one = $path;
            $image = $request->file('image_one');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imgs'), $imageName);
            $service->image_one = $imageName;
        }
        if ($request->hasFile('image_two')) {
            // Assuming you have a public disk defined in your config/filesystems.php
            // $path = $request->file('image_one')->store('.');
            // $service->image_one = $path;
            $image = $request->file('image_two');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imgs'), $imageName);
            $service->image_two = $imageName;
        }
        if ($request->hasFile('image_three')) {
            // Assuming you have a public disk defined in your config/filesystems.php
            // $path = $request->file('image_one')->store('.');
            // $service->image_one = $path;
            $image = $request->file('image_three');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imgs'), $imageName);
            $service->image_three = $imageName;
        }
        if ($request->hasFile('image_four')) {
            // Assuming you have a public disk defined in your config/filesystems.php
            // $path = $request->file('image_one')->store('.');
            // $service->image_one = $path;
            $image = $request->file('image_four');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imgs'), $imageName);
            $service->image_four = $imageName;
        }


        $service->save();
        return redirect(route('sowAll'));
    }
}
