<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showAll()
    {
        $services = DB::table('services')->where('id_user', auth()->id())->paginate(2);

        return view('profile.profile')->with('services', $services);
    }
    public function profiles($id)
    {
        $user = User::find($id);
        return view('profiles.profiles', ['user' => $user]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("editaccount.editaccount");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);




        // update the user's image if a new one is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imgs'), $imageName);
            $user->image = $imageName;
            // dd($user);
        }

        // update the user's other information
        $user->name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->servece = $request->input('service');
        $user->city = $request->input('city');
        $user->facebook = $request->input('facebook');
        $user->instagram = $request->input('instagram');
        $user->linkden = $request->input('linkden');
        $user->tele = $request->input('tele');
        $user->dscription = $request->input('dscription');


        // $request->validate([
        //     'password' => 'nullable|min:6|confirmed'
        // ]);

        // update the user's password if a new one is provided

        // check if the entered password matches the user's current password
        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()->back()->with('error', 'The entered password does not match the current password.');
        }
        // update the user's password



        $user->save();

        return redirect(route('sowAll'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
