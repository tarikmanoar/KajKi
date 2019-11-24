<?php

namespace App\Http\Controllers\Kajki;

use App\Http\Controllers\Controller;
use App\Mail\SendJobMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index(Request $request)
    {
        $homeUrl  = url('/');
        $job_id   = $request->get('job_id');
        $job_slug = $request->get('job_slug');
$this->validate($request,[
    'friend_name'  => 'required|max:64|min:4',
    'friend_email' => 'required|email',
]);
        $mailArray    = [
            'friend_name'  => $request->get('friend_name'),
            'friend_email' => $request->get('friend_email'),
            'username'     => auth()->user()->name,
            'email'        => auth()->user()->email,
            'jobUrl'       => $homeUrl . '/jobs/' . $job_id . '/' . $job_slug,
        ];
        $friend_email = $request->get('friend_email');
        try{
            Mail::to($friend_email)->send(New SendJobMail($mailArray));
            $this->setSuccessMsg('Invitation Sent successfully!');
            return redirect()->back();
        }catch (\Exception $e){
            $this->setErrorMsg('Sorry Something went wrong!');
            return redirect()->back();
        }
    }
}
