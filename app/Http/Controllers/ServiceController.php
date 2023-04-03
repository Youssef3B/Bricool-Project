<?php

namespace App\Http\Controllers;

use App\Models\commentaire;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = service::paginate(8);

        return view('services.services', ["services" => $services]);
    }





    public function showAll()
    {
        $services = DB::table('services')->where('id_user', auth()->id())->paginate(2);

        return view('profile.profile')->with('services', $services);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createservice.createservice');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('imgOne')) {
            $filename = uniqid() . '.' . $request->file('imgOne')->getClientOriginalExtension();
            $request->file('imgOne')->move(public_path('imgs'), $filename);
            $imageOne = $filename;
        }
        if ($request->hasFile('imgTow')) {
            $filename = uniqid() . '.' . $request->file('imgTow')->getClientOriginalExtension();
            $request->file('imgTow')->move(public_path('imgs'), $filename);
            $imageTow = $filename;
        }
        if ($request->hasFile('imgTree')) {
            $filename = uniqid() . '.' . $request->file('imgTree')->getClientOriginalExtension();
            $request->file('imgTree')->move(public_path('imgs'), $filename);
            $imageTree = $filename;
        }
        if ($request->hasFile('imgFore')) {
            $filename = uniqid() . '.' . $request->file('imgFore')->getClientOriginalExtension();
            $request->file('imgFore')->move(public_path('imgs'), $filename);
            $imageFore = $filename;
        }
        service::create([
            'id_user' => $request->input('id'),
            'title' => $request->input('title'),
            'image_one' => $imageOne,
            'image_two' => $imageTow,
            'image_three' => $imageTree,
            'image_four' => $imageFore,
            'description' => $request->input('description'),
        ]);
        return redirect()->route('sowAll');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $services = DB::select('SELECT * FROM `users` u INNER JOIN `services` s ON u.id=s.id_user where s.id =' . $id);
        $comments = DB::select('SELECT * FROM `users` u INNER JOIN `commentaires` c ON u.id=c.id_user where c.id_service =' . $id);
        return view('servicesdetails.servicesdetails', ['services' => $services, 'comments' => $comments]);
    }

    public function details($id)
    {
        $service = service::find($id);
        $commentaires = Commentaire::where('id_service', $id)->orderBy('created_at', 'desc')->with('user')->get();

        return view('details.details', ['services' => $service, 'commentaires' => $commentaires]);
    }
    // public function commentaire($id)
    // {
    //     $commentaires = commentaire::where('service_id', $id)->orderBy("created_at", "desc")->get();
    //     return view('details.details', ['commentaires' => $commentaires]);
    // }


    public function filter(Request $request)
    {
        $query = Service::query();

        if ($request->has('cities') && $request->cities !== 'All') {
            session()->put("cities", true);
            $query->whereRelation('user', 'city', $request->cities);
        }

        if ($request->has('servece')) {
            session()->put("servece", $request->servece);
            if ($request->servece != "All categories") {
                $query->whereRelation('user', 'servece', $request->servece);
            }
        }


        $services = $query->get();

        return view('services.services', compact('services'));
    }

    public function filterAjax(Request $request)
    {
        $query = Service::query();
        $services = Service::with(['user'])->get();
        error_log($request->servece);
        error_log($request->cities);
        if ($request->servece != "All categories" || $request->cities !== 'All') {
            if ($request->has('cities') && $request->cities !== 'All') {
                $query->whereRelation('user', 'city', $request->cities)->with(['user']);
            }

            if ($request->has('servece')) {
                if ($request->servece !== "All categories") {
                    $query->whereRelation('user', 'servece', $request->servece)->with(['user']);
                }
            }

            $services = $query->get();
        }
        return response()->json($services);
    }

    public function search(Request $request)
    {
        $query = $request->query("q");
        $services = service::where('title', 'LIKE', "%$query%")->orWhereRelation('user', 'name', 'LIKE', "%$query%")->orWhereRelation('user', 'servece', 'LIKE', "%$query%")->paginate(8);
        return view('services.services', compact("services"));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return view('editaccount.editaccount',['service'=>service::where('id',$id)->first()]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
