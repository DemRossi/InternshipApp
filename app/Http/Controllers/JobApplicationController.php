<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jobApplicationController extends Controller
{
    public function apply(\App\Internship $internship, Request $request)
    {
        $student = \Auth::user();

        $check = \DB::table('job_applications')
                    ->where('internship_id', $internship->id)
                    ->where('user_id', $student->id)
                    ->exists();

        if ($check == null) {
            if ($internship->available_spots > 0) {
                $application = new \App\JobApplication();
                $application->internship_id = $internship->id;
                $application->user_id = $student->id;
                $application->status = 'new';
                $application->save();
            }
        }

        $data = \App\Company::with('internships')->where('id', '=', $internship->company_id)->first();
        $companyName = $data->name;
        $request->session()->flash('message', "You successfully applied for the job '$internship->internship_function' at $companyName");

        return redirect('/internships');
    }
}
