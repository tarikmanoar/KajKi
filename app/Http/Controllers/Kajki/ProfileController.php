<?php

namespace App\Http\Controllers\KajKi;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
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
        ]);
        $user_id = auth()->user()->id;
        $data    = [
            'cover_latter' => $request->get('cover_latter'),
            'experience'   => $request->get('experience'),
            'bio'          => $request->get('bio'),
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
        $user_id = auth()->user()->id;
        $file_name = Str::random(5).'.'.$request->file('resume')->getClientOriginalExtension();
        if ($request->file('resume')->isValid()){
            $request->file('resume')->storeAs('files',$file_name);
            Profile::where('user_id', $user_id)->update(['resume' => $file_name]);
        }
        $this->setSuccessMsg("Profile Update Successfully!");
        return redirect()->back();
    }
}
