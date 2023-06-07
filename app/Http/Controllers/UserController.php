<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('userRole.index')->with('users', $users);
    }


    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {

    }
    /**
     * Display the user's profile form.
     */
    public function update(Request $request)
    {

    }

    /**
     * Display the user's profile form.
     */
    public function destroy(Request $request){

    }
}
