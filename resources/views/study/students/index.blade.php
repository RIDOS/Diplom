@extends('layouts.app')
<?php
use App\educationalInstitution;
use App\students;
?>

@section('sidebar')
    @extends('layouts.sidebar')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Студенты {{ DB::table('educational_institutions')->where('userId', Auth::user()->id)->value('educationName') }}</div>

                    <div class="card-body">
                      <table class="table">
                          <thead>
                          <tr>
                              <th scope="col">ФИО</th>
                              <th scope="col">Дата поступление</th>
                              <th scope="col">Дата окончания</th>
                              <th scope="col">Редактировать</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($st as $user)
                          
                                  <tr>
                                      <th>{{ $user->studentName }}</th>
                                      <th>{{ date($user->yearStart) }}</th>
                                      <th>{{ date($user->yearGraduation) }}</th>
                                      <th>
                                        <a href="{{ route('study.student.edit', $user->id) }}" class="float-left">
                                            <button type="button" class="btn btn-primary btn-sm">Редактировать
                                            </button>
                                        </a>
                                      </th>
                                  </tr>
                          @endforeach
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
