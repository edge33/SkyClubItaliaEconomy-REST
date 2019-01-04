<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index ()
    {
         return Job::all();
    }

    public function get (Job $job) {
        return $job;
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'requiredRank' => 'exists:ranks,id',
            'requiredLicenses' => 'exists:licenses,id',
            'user' => 'exists:users,id'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors, 406);
        }
        $job = Job::create($request->all());

        $licenses = $request->input('requiredLicenses');
        $job->requiredLicenses()->detach();
        $job->requiredLicenses()->attach($licenses);

        return response()->json($job, 201);
    }

    public function update(Request $request, Job $job)
    {
        $validator = Validator::make($request->all(), [
            'requiredRank' => 'exists:ranks,id',
            'requiredLicenses' => 'exists:licenses,id',
            'user' => 'exists:users,id'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors, 406);
        }

        $licenses = $request->input('requiredLicenses');
        $job->requiredLicenses()->detach();
        $job->requiredLicenses()->attach($licenses);

        $job->update($request->all());
        return response()->json($job, 200);
    }

    public function delete(Job $job)
    {
        $job->delete();
        return response()->json(null, 204);
    }
}
