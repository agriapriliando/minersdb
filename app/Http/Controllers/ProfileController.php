<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        // return view('profile.index');
        // $json = File::get(database_path('data/all.json'));
        // return json_decode($json, true);

        $alldata = Profile::with([
            'ktts',
            'kims',
            'handaks',
            'bbcs',
            'les',
            'stks',
            'rrs',
            'rpts',
            'rippms',
            'rkabops',
            'reportmonths',
            'triwulans',
            'iurans',
            'tbs',
            'pas',
            'pls',
            'pelabuhans',
            'iuis'
        ])->get();

        return $alldata;
    }
}
