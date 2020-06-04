@extends('layouts.app')

@section('sidebar')
@extends('layouts.sidebar')
@endsection


@section('content')

<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
?>
<div class="container">
  <div class="row justify-content-left">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Основная информация</div>
        <div class="card-body">
          @foreach($id as $user)
          <div class="row">
              <div class="col-md-6 mb-3">
                  <label for="firstName">Фамилия Имя Отчество</label>
                  <input type="text" class="form-control" id="firstName"
                         placeholder="Введите ваше ФИО"
                         value="{{ $user->studentName }}"
                         required="" disabled>
                  <div class="invalid-feedback">
                      Valid first name is required.
                  </div>
              </div>
              <div class="col-md-6 mb-3">
                  <label for="lastName">Вид обучения</label>
                  <input type="text" class="form-control" id="lastName" placeholder="Бюджет/Комерция"
                         value="{{ $user->typeOfLearning }}"
                         required="" disabled>
                  <div class="invalid-feedback">
                      Valid last name is required.
                  </div>
              </div>
          </div>
          <div class="mb-3">
              <label for="email">Email </label>
              <input type="email" class="form-control" id="email" placeholder="почта@mail.ru"
                     value="{{ DB::table('users')->where('id', $user->userId)->value('email') }}"
                     disabled>
              <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
              </div>
          </div>

          <div class="mb-3">
              <label for="address">Учебное заведение</label>
              <input type="text" class="form-control" id="address"
                     placeholder="Название учебного заведения" required="" value="{{ DB::table('educational_institutions')->where('id', DB::table('sharedentries')->where('stud_Id', $user->id)->value('edu_Id'))->value('educationName') }}" disabled>
              <div class="invalid-feedback">
                  Please enter your shipping address.
              </div>
          </div>

          <div class="mb-3">
              <label for="address">Специальность</label>
              <!-- <input type="text" name="diplom" class="form-control" id="address" placeholder="Красный/Синий"
              required="" > -->
              <input type="text" class="form-control" id="address" placeholder="Специальность"
                     required="" value="{{ DB::table('specialties')->where('id', DB::table('sharedentries')->where('stud_Id', $user->id)->value('special_Id'))->value('specialtiName') }}" disabled>
          </div>

          <div class="mb-3">
              <label for="address">Достижения</label>
              <textarea type="text" name="dost" class="form-control" id="address" rows="4" placeholder="Ваши достижения" required=""
              disabled>{{ $user->progress }}</textarea>
          </div>

          <div class="mb-3">
              <label for="address">Диплом</label>
              <input type="text" class="form-control" id="address" placeholder="Красный/Синий"
                     required="" value="{{ $user->diplom }}" disabled>
              <div class="invalid-feedback">
                  Please enter your shipping address.
              </div>
          </div>

          <div class="mb-3">
              <label for="address">Год оканчания учебного заведения</label>
              <input type="text" class="form-control" id="address" placeholder="День.Месяц.Год"
                     required="" disabled
                     value="{{ $user->yearGraduation }}">
              <div class="invalid-feedback">
                  Please enter your shipping address.
              </div>
          </div>

          <div class="mb-3">
              <label for="address">Портфолио</label>
              <!-- <input type="text" class="form-control " id="address" placeholder="Ваше портфолио"
                     required="" disabled
                     value="{{ DB::table('students')->where('userId', Auth::user()->id)->value('portfolio') }}"> -->
              <textarea type="text" name="partfolo" class="form-control" id="address" rows="4" placeholder="Ваше портфолио"
              disabled>{{ $user->portfolio }}</textarea>
          </div>

          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
