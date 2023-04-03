<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Get all users from the database
        return view('admin', ['users' => $users]); // Pass the users data to the view
    }
}
