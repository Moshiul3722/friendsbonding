<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Profile;
use App\Models\Health;
use App\Models\Media;
use App\Models\Occupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    public function index()
    {
        return view('profile.index');
    }

    public function storeUserProfile(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'fname' => ['required', 'max:255', 'string'],
            'lname' => ['required', 'max:255', 'string'],
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
            'blood_group' => ['required', 'string'],
            'occupation' => ['required', 'string'],
            'organization' => ['required', 'string'],
            'designation' => ['required', 'string'],
            'officeaddress' => ['required', 'string'],
            'fbid' => ['required', 'string'],
            'whatapp' => ['required', 'string'],
        ]);

        // $request->validate([
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

        Health::create([
            'blood_group' => $request->blood_group,
            'user_id' => Auth::user()->id,
        ]);

        Occupation::create([
            'occupation' => $request->occupation,
            'organization' => $request->organization,
            'designation' => $request->designation,
            'officeaddress' => $request->officeaddress,
            'user_id' => Auth::user()->id,

        ]);

        $mediaIds =[
            'fbId'=>$request->fbid,
            'whatappId'=>$request->whatapp,
        ];


        // dd($mediaIds);
        foreach($mediaIds as $mediaId){
            Media::create([
                'mediaId' => $mediaId,
                'user_id' => Auth::user()->id
            ]);
        }

        return redirect()->route('profile')->with('success', 'Client added successfully');
    }
}
