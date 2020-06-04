<?php

namespace App\Http\Controllers\Organization;

use App\organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
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

    public function edit($id)
    {
        return view('organization.profile.edit');

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
      $org = organization::find(DB::table('organizations')->where('userId', $id)->value('id'));

      $org->id = DB::table('organizations')->where('userId', $id)->value('id');
      $org->userId = $id;
      $org->name = $request->input('name');
      $org->address = $request->input('address');
      $org->web_site = $request->input('web');
      $org->phone = $request->input('number');
      $org->specialty = $request->input('spec');

      $org->save();

      return redirect()->route('organization.profile.index')->with('success', 'Данные были обнавленны.');
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
