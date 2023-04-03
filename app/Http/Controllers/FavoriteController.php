<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\favorite;
use App\Models\service;


class FavoriteController extends Controller
{
    public function add(Request $request)
    {
        $query = favorite::where('id_service', $request->input('id_service'))->getQuery();
        if ($query->exists()) {
            $favorite = $query->first();
            favorite::where('id', $favorite->id)->delete();
        } else {
            $favorite = new favorite();
            $favorite->id_service = $request->input('id_service');
            $favorite->id_user = auth()->user()->id;
            $favorite->save();
        }

        return redirect()->back()->with('success', 'Service added to favorites successfully!');
    }

    public function index()
    {
        $favorites = Favorite::where('id_user', auth()->user()->id)->get();
        $services = Service::whereIn('id', $favorites->pluck('id_service'))->paginate(10);

        return view('favorites.favorites', ['services' => $services, 'favorites' => $favorites]);
    }
    public function deletefavorite($id)
    {
        $favorite = Favorite::find($id);
        $favorite->delete();

        return back();
    }
}
