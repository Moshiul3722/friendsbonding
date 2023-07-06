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
            // 'userInfo'=> User::where('id', Auth::user()->id)->first(),
            // 'profileInfo'=>Profile::where('user_id', Auth::user()->id)->first(),
            // 'batchInfo'=>Batch::where('user_id', Auth::user()->id)->first(),
            // 'healthInfo'=>Health::where('user_id', Auth::user()->id)->first(),
            // 'occupationInfo'=>Occupation::where('user_id', Auth::user()->id)->first(),
            // 'mediaInfo'=>Media::where('user_id', Auth::user()->id)->first(),
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

        Profile::updateOrCreate(['user_id' => Auth::user()->id],
        [
            'uname' => $request->uname,
            'dob' => $request->dob,
            'religion' => $request->religion,
            'presentadd' => $request->presentadd,
            'permanentadd' => $request->permanentadd,
            'mobile' => $request->mobile,
            'emergencyContact' => $request->emergencyContact,
            'profileImg'=>$profile_thumb
        ]);

        Batch::updateOrCreate(['user_id' => Auth::user()->id,],[
            'group' => $request->group,
            'batch' => $request->batch,
            'session' => $request->session,
            'regno' => $request->regno,
        ]);

        Health::updateOrCreate(['user_id' => Auth::user()->id],[
            'blood_group' => $request->blood_group,
        ]);

        Occupation::updateOrCreate(['user_id' => Auth::user()->id],[
            'occupation' => $request->occupation,
            'organization' => $request->organization,
            'designation' => $request->designation,
            'officeaddress' => $request->officeaddress,
        ]);

        $mediaIds =[
            'fbId'=>$request->fbid,
            'whatappId'=>$request->whatapp,
        ];


        // dd($mediaIds);
        foreach($mediaIds as $key=> $mediaId){
            Media::updateOrCreate(['user_id' => Auth::user()->id],['meta_key'=>$key],
            [
                'mediaId' => $mediaId,
            ]);
        }

        return redirect()->route('view.profile')->with('success', 'Client added successfully');
    }
}
