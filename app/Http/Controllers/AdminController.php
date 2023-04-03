<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\service;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;







use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        // return view('admin.dashboard');

        $users = User::all();
        $userCount = User::count();
        $serviceCount = service::count();
        $blogCount = blog::count();
        return view('admin.dashboard', compact('users'), ['userCount' => $userCount, 'serviceCount' => $serviceCount, 'blogCount' => $blogCount]);
    }
    public function profiles($id)
    {
        $user = User::find($id);
        return view('profiles.profiles', ['user' => $user]);
    }
    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('listofusers')->with('success', 'User deleted successfully');
    }

    public function listofusers()
    {
        $users = User::whereNull('role')->paginate(8); // change 10 to the number of users per page you want to display
        return view('admin.listofusers', compact('users'));
    }
    public function listofadmins()
    {
        $users = User::where('role', '!=', true)->paginate(10); // change 10 to the number of users per page you want to display
        return view('admin.listofadmins', compact('users'));
    }

    public function listofservices()
    {
        $services = service::all();
        return view('admin.listofservices', compact('services'));
    }

    public function deleteService(service $service)
    {
        $service->delete();
        return redirect()->route('listofservices')->with('success', 'Service deleted successfully');
    }
    public function test()
    {
        return view('admin/addadmin');
    }
    public function addadmin(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'tele' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'city' => 'required|string|max:255',
        ]);

        // Create a new admin instance
        $users = new User();
        $users->name = $validatedData['name'];
        $users->last_name = $validatedData['last_name'];
        $users->tele = $validatedData['tele'];
        $users->email = $validatedData['email'];
        $users->password = Hash::make($validatedData['password']);
        $users->city = $validatedData['city'];
        $users->servece = $request['servece'];
        $users->dscription = $request->input('description');
        $users->facebook = $request->input('facebook');
        $users->instagram = $request->input('instagram');
        $users->role = $request->input('role');
        $users->save();

        // Redirect to a success page
        // return view('admin.listofadmins', compact('users'));

        return redirect()->route('addadmin')->with('success', 'New Admin add successfully');
    }


    public function listofmessages()
    {
        $contacts = Contact::all();
        return view('admin.listofmessages', compact('contacts'));
    }

    public function deletemessage(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('listofmessages')->with('success', 'Message deleted successfully');
    }

    public function test2()
    {
        return view('admin/addpost');
    }
    public function addpost(Request $request)
    {

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('imgs'), $filename);
            $image = $filename;
        }
        Blog::create([
            'id_user' => $request->input('id'),
            'title' => $request->input('title'),
            'image' => $image,
            'description' => $request->input('description'),
            'category' => $request->input('category'),
        ]);
        return redirect()->route('addpost')->with('success', 'New Post added successfully');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('name', 'like', "%$query%")
            ->orWhere('servece', 'like', "%$query%")
            ->orWhere('city', 'like', "%$query%")
            ->paginate(10);

        return view('admin.listofusers')
            ->with('users', $users) // add search results to view's data
            ->with('query', $query); // add search query to view's data
    }
    public function searchServices(Request $request)
    {
        $query = $request->input('query');
        $services = service::where('title', 'LIKE', "%$query%")->orWhereRelation('user', 'name', 'LIKE', "%$query%")->orWhereRelation('user', 'servece', 'LIKE', "%$query%")->get();
        return view('admin.listofservices', compact('services'));
    }
}
