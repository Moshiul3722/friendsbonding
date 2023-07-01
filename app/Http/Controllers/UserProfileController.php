<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    public function index() {
        return view('profile.index');
    }

    public function storeUserProfile(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'fname'=>['required','max:255','string'],
            'lname'=>['required','max:255','string'],
            'uname' => ['required', 'max:255', 'string'],
            'group' => ['required', 'string'],
            'session' => ['required', 'string'],
            'batch' => ['required', 'string'],
            'regno' => ['required', 'string'],
            'dob' => ['required', 'string'],
            'religion' => ['required', 'string'],
            'presentadd' => ['required', 'string'],
            'permanentadd' => ['required', 'string'],
            'mobile' => ['required', 'string'],
            'emergencyContact' => ['required', 'string'],
        ]);

        // $request->validate([
        //     'blood_group' => ['required', 'string'],
        //     'fbid' => ['required', 'string'],
        //     'whatapp' => ['required', 'string'],
        //     'occupation' => ['required', 'string'],
        //     'organization' => ['required', 'string'],
        //     'designation' => ['required', 'string'],
        //     'officeaddress' => ['required', 'string'],
        //     'userImg' => ['image'],
        //     'profileImg' => ['image'],
        //     'email' => ['required', 'max:255', 'string', 'unique:clients,email'],
        //     'password' => ['max:255', 'string'],
        //     'status' => ['not_in:none', 'string'],
        // ]);

        Profile::create([
            'uname' => $request->uname,
            'dob' => $request->dob,
            'religion' => $request->religion,
            'presentadd' => $request->presentadd,
            'permanentadd' => $request->permanentadd,
            'mobile' => $request->mobile,
            'emergencyContact' => $request->emergencyContact,
            'user_id' => Auth::user()->id,
        ]);

        Batch::create([
            'group' => $request->group,
            'batch' => $request->batch,
            'session' => $request->session,
            'regno' => $request->regno,
            'user_id' => Auth::user()->id,
        ]);


        return redirect()->route('profile')->with('success', 'Client added successfully');
    }
}
