<?php

namespace App\Http\Controllers;

use App\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function index() {
        return Rank::all();
    }

    public function get(Rank $rank) {
        return $rank;
    }

    public function save(Request $request) {
        $rank = Rank::create($request->all());
        return response()->json($rank, 201);
    }

    public function update(Request $request, Rank $rank) {
        $rank->update($request->all());
        return response()->json($rank, 200);
    }
}
