<?php

namespace App\Http\Controllers\Student;


use App\Role;
use App\students;
use App\User;
use App\educationalInstitution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Sodium\increment;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/home');
    }

    public function edit($id)
    {
        return view('student.profile.edit')->with('study', educationalInstitution::all('educationName'));
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
        // dd(DB::table('students')->where('userId', $id)->value('id'));
        // Запись в поля таблицы студенты.
        $stud = students::find(DB::table('students')->where('userId', $id)->value('id'));

        $stud->id = DB::table('students')->where('userId', $id)->value('id');
        $stud->userId = $id;
        $stud->studentName = $request->input('fio');
        $stud->typeOfLearning = $request->input('vidob');
        // $stud->progress = $request->input('uche');
        $stud->progress = $request->input('dost');
        $stud->diplom = $request->input('diplom');
        $stud->yearStart = $request->input('dateS');
        $stud->yearGraduation = $request->input('date');
        $stud->portfolio = $request->input('partfolo');

        $stud->save();

        // Запись в поля таблицы студенты.
        DB::table('sharedentries')->insert([
          'stud_Id'     => Auth::user()->id,
          'edu_Id'      => $request->input('uche'),
          'special_Id'  => $request->input('speciality'),
        ]);

        // DB::table('sharedentries')->update([
        //   'stud_Id'     => Auth::user()->id,
        //   'edu_Id'      => $request->input('uche'),
        //   'special_Id'  => $request->input('speciality'),
        // ]);





        return redirect()->route('student.profile.index')->with('success', 'Данные были обнавленны.');
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
