<?php

namespace App\Http\Controllers\Student;


use App\Role;
use App\students;
use App\User;
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
        return view('student.profile.edit');
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
        $fio = $request->input('fio');
        $vidob = $request->input('vidob');
        $email = $request->input('email');
        $uche = $request->input('uche');
        $dost = $request->input('dost');
        $diplom = $request->input('diplom');
        $date = $request->input('date');
        $date = date('Y-m-d');
        $partfolo = $request->input('partfolo');

//       (". $id .",".$fio.",".$vidob.",".$email.",".$uche.",".$dost.",".$diplom.",".$date.",".$partfolo.")");
//        DB::insert("INSERT INTO `students` (`userId`, `studentName`, `typeOfLearning`, `progress`, `img`, `portfolio`, `yearGraduation`, `created_at`, `updated_at`) VALUES (". mysqli_real_escape_string($id) .",".mysqli_real_escape_string($fio).",".mysqli_real_escape_string($vidob).",".mysqli_real_escape_string($email).",".mysqli_real_escape_string($uche).",".mysqli_real_escape_string($dost).",".mysqli_real_escape_string($diplom).",".mysqli_real_escape_string($date).",".mysqli_real_escape_string($partfolo).")");
        students::insert(array(
            'id'=>DB::table('students')->increment('id'),
            'userId'=>$id,
            'studentName'=>$fio,
            'typeOfLearning'=>$vidob,
            'progress'=>$dost,
            'img'=>'',
            'portfolio'=>$partfolo,
            'yearGraduation'=> date("m.d.y")
        ));

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
