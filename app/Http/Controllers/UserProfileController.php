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

        // dd($request->all());


        // dd($request->file('userImg'));

        $user_thumb = '';
        if (!empty($request->file('userImg'))) {
            $user_thumb = time() . '-' . $request->file('userImg')->getClientOriginalName();
            $request->file('userImg')->storeAs('public/uploads', $user_thumb);
        }

        $thumb = $course->thumbnail;


        // dd($thumb);
        if (!empty($request->file('thumbnail'))) {
            Storage::delete('public/uploads/' . $thumb);
            $thumb = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->storeAs('public/uploads', $thumb);
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



        // dd($mediaIds);
        // foreach($mediaIds as $mediaId){
        //     Media::Create(['user_id' => Auth::user()->id],
        //     [
        //         'mediaId' => $mediaId,
        //     ]);
        // }

        return redirect()->route('view.profile')->with('success', 'Client added successfully');
    }

}
