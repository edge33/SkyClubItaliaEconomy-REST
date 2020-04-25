<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function checkAuthorization(String $authorizationToCheck) {
        if (Gate::denies($authorizationToCheck)) {
            throw new AuthorizationException("Unauthorized.");
        };
    }

    protected function checkAuthorizationForModel(String $authorizationToCheck, Model $model) {
        if (Gate::denies($authorizationToCheck, $model)) {
            throw new AuthorizationException("Unauthorized.");
        };
    }
}
