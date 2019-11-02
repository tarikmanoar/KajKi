<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setSuccessMsg($msg)
    {
        session()->flash('message',$msg);
        session()->flash('type','success');
    }
    public function setErrorMsg($msg)
    {
        session()->flash('message',$msg);
        session()->flash('type','danger');
    }
}
