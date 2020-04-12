<?php

namespace App\Http\Controllers;

use App\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index() {
        return License::all();
    }

    public function get(License $license) {
        return $license;
    }

    public function save(Request $request) {
        $this->checkAuthorization("create-data");
        $license = License::create($request->all());
        return response()->json($license, 201);
    }

    public function update(Request $request, License $license) {
        $this->checkAuthorization("create-data");
        $license->update($request->all());
        return response()->json($license, 200);
    }

    public function delete(License $license)
    {
        $this->checkAuthorization("create-data");
        $license->delete();
        return response()->json(null, 204);
    }
}
