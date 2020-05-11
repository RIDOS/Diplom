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
        $name = $request->input('name');
        $address = $request->input('address');
        $number = $request->input('number');
        $web = $request->input('web');
        $spec = $request->input('spec');

        organization::insert(array(
            'id'=>"1",
            'userId'=>$id,
            'name'=>$name,
            'address'=>$address,
            'web-site'=>$web,
            'phone'=>$number,
            'img'=>"",
            'specialty'=>$spec
        ));
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
