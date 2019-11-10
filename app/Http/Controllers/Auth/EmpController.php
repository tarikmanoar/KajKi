<?php

namespace App\Http\Controllers\Auth;

use App\Models\Company;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class EmpController extends Controller
{
    public function store(Request $request)
    {
        $user = User::create([
            'name'     => ' ',
            'email'    => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role'     => $request->get('role')
        ]);
        Company::create([
            'user_id'     => $user->id,
            'cname'       => request('cname'),
            'address'     => request('address'),
            'slug'        => str_slug(request('cname')),
            'email'       => request('email'),

        ]);
        $user->sendEmailVerificationNotification();
        $this->setSuccessMsg("Please Active Your Account!");
        return redirect()->to('login');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'phone'       => 'required|min:6',
            'website'     => 'required|string',
            'cover_photo' => 'required|mimes:jpeg,jpg,png|max:2048',
            'slogan'      => 'required|string|max:150',
            'description' => 'required|string|min:50',
        ]);
        $user_id   = auth()->user()->id;
        $file      = $request->file('cover_photo');
        $file_name = 'Company_cover_' . str_random('10') . '.' . $file->getClientOriginalExtension();
        if ($file->isValid()) {
            $file->storeAs('uploads', $file_name);
            $data = [
                'phone'       => $request->get('phone'),
                'website'     => $request->get('website'),
                'cover_photo' => $file_name,
                'slogan'      => $request->get('slogan'),
                'description' => $request->get('description'),
            ];
            Company::where('user_id', $user_id)->update($data);
            $this->setSuccessMsg("Profile Update Successfully!");
            return redirect()->back();
        }
    }

    public function logo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'required|mimes:jpg,png,jpeg|max:1024'
        ]);
        $user_id   = auth()->user()->id;
        $file      = $request->file('logo');
        $file_name = 'Company_Logo_' . str_random('10') . '.' . $file->getClientOriginalExtension();
        if ($file->isValid()) {
            Image::make($file)->resize(300, 300)->save('images/uploads/' . $file_name);
            Company::where('user_id', $user_id)->update(['logo' => $file_name]);
            $this->setSuccessMsg("Profile Update Successfully!");
            return redirect()->back();
        }
    }
}
