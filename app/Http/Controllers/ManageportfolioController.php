<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

use Illuminate\Support\Facades\DB;


class ManageportfolioController extends Controller
{
    public function showAll()
    {
        $portfolios = DB::table('portfolios')->where('id_user', auth()->id())->paginate(8);

        return view('manageportfolio.manageportfolio')->with('portfolios', $portfolios);
    }
    public function destroy($id)
    {
        DB::table('portfolios')->where('id', $id)->delete();
        return redirect()->route('manageportfolio')->with('success', 'Portfolio deleted successfully.');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('editportfolio.editportfolio', compact('portfolio'));
    }
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');
        $portfolio->link = $request->input('link');

        // Handle file uploads
        if ($request->hasFile('image')) {
            // Assuming you have a public disk defined in your config/filesystems.php
            // $path = $request->file('image_one')->store('.');
            // $service->image_one = $path;
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imgs'), $imageName);
            $portfolio->image = $imageName;
        }


        $portfolio->save();
        return redirect()->route('manageportfolio')->with('success', 'Portfolio updated successfully.');
    }
}
