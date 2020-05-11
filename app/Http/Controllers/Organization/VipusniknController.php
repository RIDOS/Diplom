<?php

namespace App\Http\Controllers\Organization;

use App\students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VipusniknController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('organization.students.index')->with('students', students::paginate(10));
    }

    public function edit($id)
    {
    }

}
