<?php

namespace App\Http\Controllers\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\organization;
use App\Vakansii;


class VakansiiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('organization.vakansi.index')->with('vakansii', Vakansii::where('organization_id' , DB::table('organizations')->where('userId' , Auth::user()->id)->value('id'))->get());
    }

    public function create(Request $request)
    {
      $organ = organization::where('userId', Auth::user()->id)->value('name');

      if ($organ == "") {
          return redirect()->route('organization.vakansi.index')->with('vakansii', Vakansii::where('organization_id' , DB::table('organizations')->where('userId' , Auth::user()->id)->value('id'))->get())
                ->with('warning', 'Для создания вакансии, необходимо заполнить анкету.');
      }
      else {
        return view('organization.vakansi.create');
      }
    }

    public function store(Request $request)
    {
      $vakan = new Vakansii;
      $vakan->organization_id = DB::table('organizations')->where('userId', Auth::user()->id)->value('id');
      $vakan->title = $request->input("title");
      $vakan->description = $request->input("description");
      $vakan->cost = $request->input("cost");

      $vakan->save();

      return redirect()->route('organization.vakansi.index')->with('vakansii', Vakansii::where('organization_id' , DB::table('organizations')->where('userId' , Auth::user()->id)->value('id'))->get())
      ->with('success', 'Вакансия создана.');
    }

    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $vakan = Vakansii::find($id);
       $vakan->delete();
       return redirect()->route('organization.vakansi.index')
       ->with('vakansii', Vakansii::where('organization_id' , DB::table('organizations')->where('userId' , Auth::user()->id)->value('id'))->get())->with('success', 'Вакансия была удалена.');
    }
}
