<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commentaire;
use App\Models\commentaireblog;
use App\Models\service;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // public function store(Request $request, $id)
    // {
    //     $request->validate([
    //         'description' => 'required',
    //     ]);
    //     $service = service::findOrFail($id);
    //     $commentaire = new commentaire([
    //         'id_service' => $service->id,
    //         'id_user' => Auth::id(),
    //         'description' => $request->input('description'),
    //     ]);
    //     $commentaire->save();
    //     return redirect()->back()->with('success', 'Comment added successfully.');
    // }
    public function store(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);
        $service = Service::findOrFail($id);
        $commentaire = new Commentaire([
            'id_service' => $service->id,
            'id_user' => Auth::id(),
            'description' => $request->input('description'),
        ]);
        $commentaire->save();

        $commentaire = Commentaire::where('id', $commentaire->id)->with('user')->first();
        return response()->json($commentaire);
    }



    public function store2(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $blog = Blog::findOrFail($id);

        $commentaires = new commentaireblog([
            'id_blog' => $blog->id,
            'id_user' => Auth::id(),
            'description' => $request->input('description'),
        ]);

        $commentaires->save();

        // $commentaires = commentaireblog::where('id_blog', $blog->id)->get();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}
