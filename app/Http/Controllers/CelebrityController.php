<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Celebrity;
use Illuminate\Http\Request;

class CelebrityController extends Controller
{
    // public function index()
    // {
    //     $query = "
    //         SELECT *
    //         FROM `celebrities`
    //         WHERE `image` IS NOT null
    //         LIMIT 10
    //     ";
        
    //     $celebrities = DB::select($query);

    //     return view('celebrities.celebrities', ['celebrities' => $celebrities]);
    // }
    //ELOQUENT BELOW
    public function index()
{
    $celebrities = Celebrity::whereNotNull('image')
        ->take(10)
        ->get();

    return view('celebrities.celebrities', compact('celebrities'));
}
}