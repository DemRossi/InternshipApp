<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        //$data['companies'] = \App\Company::get();
        $data['tags'] = \App\CompanyTag::get();
        $data['states'] = \App\State::get();

        if ($request->has('state')) {
            $state = $request->input('state');
            $query = \App\Company::where('state', '=', $state)->get();
        }
        if ($request->has('tag')) {
            $tag = $request->input('tag');
            $query = \App\Company::where('company_tags', 'company_id', '=', 'company', 'id')

            ->join('company_tags', 'name', '=', $tag)

            ->get();
        }
        $data['companies'] = $query;
        //dd($data['companies']);

        return view('companies/index', $data);
        //dd(view('companies/index')->withCompanies($companies, $data));
        //return $companies->get();
    }
}
