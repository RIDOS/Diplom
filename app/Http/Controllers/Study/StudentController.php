<?php

namespace App\Http\Controllers\Study;


use App\students;
use App\User;
use App\Specialties;
use App\educationalInstitution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //DB::table('sharedentries')->where('edu_id', educationalInstitution::where('userId', Auth::user()->id)->value('id'))->get()
      // dd();
      return view('study.students.index')->with('st', students::paginate(10));
      // ->with('st', students::where('id', students::where('id', DB::table('sharedentries')->where('edu_id', educationalInstitution::where('userId', Auth::user()->id)->value('id'))->get('stud_Id'))->get()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(students $students)
    {
      return view('student.profile.edit')->with('study', educationalInstitution::all('educationName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, students $students)
    {
      $stud = students::find($id);

      $stud->id = Auth::user()->id;
      $stud->userId = Auth::user()->id;
      $stud->studentName = $request->input('fio');
      $stud->typeOfLearning = $request->input('vidob');
      // $stud->progress = $request->input('uche');
      $stud->progress = $request->input('dost');
      $stud->diplom = $request->input('diplom');

      $stud->yearGraduation = $request->input('date');
      $stud->portfolio = $request->input('partfolo');

      $stud->save();

      // Запись в поля таблицы студенты.
      DB::table('sharedentries')->insert([
        'stud_Id'     => Auth::user()->id,
        'edu_Id'      => $request->input('uche'),
        'special_Id'  => $request->input('speciality'),
      ]);

      return redirect()->route('study.students.index')->with('success', 'Данные были обнавленны.');

    }
}
