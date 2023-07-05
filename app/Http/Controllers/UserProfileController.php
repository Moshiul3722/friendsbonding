<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Profile;
use App\Models\Health;
use App\Models\Media;
use App\Models\Occupation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    public function index()
    {
        return view('profile.index');
    }

    public function show()
    {
        return view('profile.view')->with([
            'userInfo'=> User::where('id', Auth::user()->id)->get(),
            'profileInfo'=>Profile::where('user_id', Auth::user()->id)->get(),
            'batchInfo'=>Batch::where('user_id', Auth::user()->id)->get(),
            'healthInfo'=>Health::where('user_id', Auth::user()->id)->get(),
            'occupationInfo'=>Occupation::where('user_id', Auth::user()->id)->get(),
            'mediaInfo'=>Media::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    public function storeUserProfile(Request $request)
    {
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
            // 'userImg'=>['image'],
            // 'profileImg'=>['image']
        ]);

        // dd($request->all());


        // dd($request->file('userImg'));

        $user_thumb = '';
        if (!empty($request->file('userImg'))) {
            $user_thumb = time() . '-' . $request->file('userImg')->getClientOriginalName();
            $request->file('userImg')->storeAs('public/uploads', $user_thumb);
        }

        // dd($user_thumb);

        User::find(Auth::user()->id)->update([
            'image'=>$user_thumb
        ]);

        $profile_thumb = '';
        if (!empty($request->file('profileImg'))) {
            $profile_thumb = time() . '-' . $request->file('profileImg')->getClientOriginalName();
            $request->file('profileImg')->storeAs('public/uploads', $profile_thumb);
        }

        Profile::create([
            'uname' => $request->uname,
            'dob' => $request->dob,
            'religion' => $request->religion,
            'presentadd' => $request->presentadd,
            'permanentadd' => $request->permanentadd,
            'mobile' => $request->mobile,
            'emergencyContact' => $request->emergencyContact,
            'user_id' => Auth::user()->id,
            'profileImg'=>$profile_thumb
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

        return redirect()->route('view.profile')->with('success', 'Client added successfully');
    }
}
