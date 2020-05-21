<?php

namespace App\Http\Controllers\study;

use App\organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrgProController extends Controller
{

    public function show($id)
    {
        return view('study.organization.profile.show',  organization::find($id))->with('org', organization::find($id));
    }
}
