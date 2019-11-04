<?php

namespace App\Http\Controllers\Auth;

use App\Models\Company;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EmpController extends Controller
{
    public function store(Request $request)
    {
        $user = User::create([
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
            'phone'       => '',
            'website'     => '',
            'logo'        => '',
            'cover_photo' => '',
            'slogan'      => '',
            'description' => '',

        ]);
        return redirect()->to('login');
    }
}
