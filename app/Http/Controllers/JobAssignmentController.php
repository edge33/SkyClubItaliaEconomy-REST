<?php

namespace App\Http\Controllers;
use App\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class JobAssignmentController extends Controller
{
    public function assignJob(Request $request, User $user) {
        $validator = Validator::make($request->all(), [
            'job' => 'required|exists:jobs,id'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors, 406);
        }

        $job = Job::find($request->input('job'));
        $count = $user->jobs()->count();
        if ($count > 2) {
            $errors = array("Error" => "User has already 3 jobs assigned");
            return response()->json($errors, 406);
        }
        $user->jobs()->save($job);
        return response()->json($user->load('jobs'), 200);
    }
}
