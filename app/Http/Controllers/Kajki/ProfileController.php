<?php

namespace App\Http\Controllers\KajKi;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    public function index()
    {
        return view('auth.profile');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cover_latter' => 'required|string|max:255|min:25',
            'experience'   => 'required|string|max:255|min:25',
            'bio'          => 'required|string|max:255|min:25',
            'phone_number' => 'required|numeric|min:6',
        ]);
        $user_id = auth()->user()->id;
        $data    = [
            'cover_latter' => $request->get('cover_latter'),
            'experience'   => $request->get('experience'),
            'bio'          => $request->get('bio'),
            'phone_number' => $request->get('phone_number'),
        ];
        Profile::where('user_id', $user_id)->update($data);
        $this->setSuccessMsg("Profile Update Successfully!");
        return redirect()->back();
    }

    public function cover(Request $request)
    {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx|max:1024|',
        ]);
        $user_id   = auth()->user()->id;
        $file_name = Str::random(5) . '.' . $request->file('resume')->getClientOriginalExtension();
        if ($request->file('resume')->isValid()) {
            $request->file('resume')->storeAs('files', $file_name);
            Profile::where('user_id', $user_id)->update(['resume' => $file_name]);
        }
        $this->setSuccessMsg("Profile Update Successfully!");
        return redirect()->back();
    }

    public function avatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|mimes:jpg,jpeg,png|max:1024|',
        ]);
        $user_id   = auth()->user()->id;
        $file_name = 'Profile_' . Str::random(5) . '.' . $request->file('avatar')->getClientOriginalExtension();
        if ($request->file('avatar')->isValid()) {
//            $request->file('avatar')->storeAs('uploads', $file_name);
            Image::make($request->file('avatar'))->resize(300, 300)->save('images/uploads/' . $file_name);
            Profile::where('user_id', $user_id)->update(['avatar' => $file_name]);
        }
        $this->setSuccessMsg("Profile Update Successfully!");
        return redirect()->back();
    }
}
