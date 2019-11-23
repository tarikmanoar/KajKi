<?php

namespace App\Http\Controllers\KajKi;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer','verified'], ['except' => ['index', 'show','allCompany']]);
    }

    public function index($id, Company $company)
    {
        return view('company.index', compact('company'));
    }

    public function allCompany()
    {
        $companies = Company::paginate(10);
        return view('company.allCompany',compact('companies'));
    }
}
