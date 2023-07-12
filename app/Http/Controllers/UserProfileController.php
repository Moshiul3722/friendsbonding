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
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{

    public function index()
    {
        return view('profile.index');
    }

    public function show()
    {
        return view('profile.view');
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

        $mediaIds =[
            'fbId'=>$request->fbid,
            'whatappId'=>$request->whatapp,
        ];

        $userData=User::find(Auth::user()->id);

        if(empty($userData->image)){
            $user_thumb='';
        }else{
            $user_thumb = $userData->image;
        }

        if (!empty($request->file('userImg'))) {
            Storage::delete('public/uploads/' . $user_thumb);
            $user_thumb = time() . '-' . $request->file('userImg')->getClientOriginalName();
            $request->file('userImg')->storeAs('public/uploads', $user_thumb);
        }

        User::find(Auth::user()->id)->update([
            'image'=>$user_thumb
        ]);

        $profileData=Profile::where('user_id' ,'=', Auth::user()->id)->first();

        // dd($profileData);

        if(empty($profileData->profileImg)){
            $profile_thumb = '';
        }else{
            $profile_thumb = $profileData->profileImg;
        }
        if (!empty($request->file('profileImg'))) {
            Storage::delete('public/uploads/' . $profile_thumb);
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
            'socialId' => json_encode($mediaIds),
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

        return redirect()->route('view.profile')->with('success', 'Profile add/Updated successfully');
    }

}
