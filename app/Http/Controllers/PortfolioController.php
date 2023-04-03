<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    public function portfolio($userId)
    {
        $user = User::findOrFail($userId);
        return view('portfolio.portfolio', compact('user'));
    }


    public function create()
    {
        return view('createportfolio.createportfolio');
    }
    public function store(Request $request)
    {
        $id_user = auth()->user()->id;
        $image = null;

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('imgs'), $filename);
            $image = $filename;
        }

        Portfolio::create([
            'id_user' => $id_user,
            'title' => $request->input('title'),
            'image' => $image,
            'description' => $request->input('description'),
            'link' => $request->input('link'),
        ]);

        return redirect()->route('portfolio', ['userId' => $id_user]);
    }
}
