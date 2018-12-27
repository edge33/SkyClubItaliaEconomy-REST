<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

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
        $job = Job::create($request->all());
        return response()->json($job, 201);
    }

    public function update(Request $request, Job $job)
    {
        $job->update($request->all());
        return response()->json($job, 200);
    }
}
