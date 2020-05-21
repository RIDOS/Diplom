@extends('layouts.app')

@section('sidebar')
{{--    @extends('layouts.sidebar')--}}
@endsection


@section('content')

    <?php
    use Illuminate\Support\Facades\Auth;
    ?>
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Редактировать профиль</div>

                    <div class="card-body">
                        <form action="{{ route('student.profile.update', ['user'=>Auth::user()->id]) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="id">id пользователя</label>
                                    <input type="text" name="iduser" class="form-control" id="iduser" placeholder="Введите ваше ФИО" value="{{ $result = Auth::user()->id }}" disabled >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Фамилия Имя Отчество</label>
                                    <input type="text" name="fio" class="form-control" id="firstName" placeholder="Введите ваше ФИО" value="{{ DB::table('students')->where('userId', Auth::user()->id)->value('studentName') }}"
                                           required="" >
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Вид обучения</label>
                                    <!-- <input type="text" name="vidob" class="form-control" id="lastName" placeholder="Бюджет/Комерция" value=""
                                           required="" > -->
                                    <select class="form-control"  id="type" name="vidob">
                                      <option value="Бюджет">Бюджет</option>
                                      <option value="Комерция">Комерция</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="address">Учебное заведение</label>
                                <!-- <input type="text" name="uche" class="form-control" id="address"
                                       placeholder="Название учебного заведения" required="" value=""> -->
                                       <select class="form-control @error('roleId') is-invalid @enderror"  id="type" name="uche">
                                           @foreach($study as $s => $key)
                                            <option value="{{ $s+1 }}">{{ $key->educationName }}</option>
                                           @endforeach
                                       </select>
                            </div>

                            <div class="mb-3">
                                <label for="address">Специальность</label>
                                <!-- <input type="text" name="diplom" class="form-control" id="address" placeholder="Красный/Синий"
                                required="" > -->
                                <select class="form-control @error('roleId') is-invalid @enderror"  id="type" name="speciality">
                                @foreach(DB::table('specialties')->pluck('specialtiName') as $s => $key)
                                    <option value="{{ $s+1 }}">{{ $s+1 }} | {{ $key }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                              <label for="address">Достижения</label>
                              <textarea type="text" name="dost" class="form-control" id="address" rows="4" placeholder="Ваши достижения" required="">{{ DB::table('students')->where('userId', Auth::user()->id)->value('progress') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="address">Диплом</label>
                                <!-- <input type="text" name="diplom" class="form-control" id="address" placeholder="Красный/Синий"
                                required="" > -->
                                <select class="form-control @error('roleId') is-invalid @enderror"  id="type" name="diplom">
                                  <option value="Красный">Красный</option>
                                  <option value="Синий">Синий</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="address">Год оканчания учебного заведения</label>
                                <input type="date" name="date" class="form-control" id="address" placeholder="День.Месяц.Год"
                                       required="" >
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Портфолио</label>
                                <textarea type="text" name="partfolo" class="form-control" id="address" rows="4" placeholder="Ваше портфолио" required="">{{ DB::table('students')->where('userId', Auth::user()->id)->value('portfolio') }}</textarea>
                            </div>

                            <hr class="mb-4">
                            <button class="btn btn-success btn-lg btn-block" type="submit">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
