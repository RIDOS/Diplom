<?php

namespace App\Http\Controllers\Study;

use App\educationalInstitution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('study.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $name = $request->input('name');
        $spot =$request->input('spot');

        educationalInstitution::insert(array(
            'id'=>DB::table('educational_institutions')->increment('id'),
            'userId'=>$id,
            'educationName'=>$name,
            'educationLogo'=>'',
            'educationLocation'=>$spot,
        ));
        return redirect()->route('study.profile.index')->with('success', 'Данные были обнавленны.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
