@extends('layouts.app')

@section('sidebar')
    @extends('layouts.sidebar')
@endsection


@section('content')

    <?php
    use Illuminate\Support\Facades\Auth;
    ?>
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Основная информация</div>

                    <div class="card-body">
                        @if (Auth::user()->hasAnyRole('Администратор'))
                            <h2>Добро пожаловать в ATLAS!</h2>
                            <br>
                            <h4>В панеле администратора реализованны функции</h4>
                            <ul>
                              <li>редактирование/ удаление пользователей</li>
                              <li>добовление новостей на главную страницу сайта</li>
                              <li>удаление вакансий, которые по тем или иным причинам не действительны</li>
                            </ul>
                            <p>Для продолжения работы, воспользуйтесь боковой панелью</p>
                        @endif
                        @if (Auth::user()->hasAnyRole('Студент'))
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Фамилия Имя Отчество</label>
                                    <input type="text" class="form-control" id="firstName"
                                           placeholder="Введите ваше ФИО"
                                           value="{{ DB::table('students')->where('userId', Auth::user()->id)->value('studentName') }}"
                                           required="" disabled>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Вид обучения</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Бюджет/Комерция"
                                           value="{{ DB::table('students')->where('userId', Auth::user()->id)->value('typeOfLearning') }}"
                                           required="" disabled>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="email">Email </label>
                                <input type="email" class="form-control" id="email" placeholder="почта@mail.ru"
                                       value="{{ Auth::user()->email }}"
                                       disabled>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Учебное заведение</label>
                                <input type="text" class="form-control" id="address"
                                       placeholder="Название учебного заведения" required="" value="" disabled>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Достижения</label>
                                <input type="text" class="form-control" id="address" placeholder="Ваши достижения"
                                       required="" disabled
                                       value="{{ DB::table('students')->where('userId', Auth::user()->id)->value('progress') }}">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Диплом</label>
                                <input type="text" class="form-control" id="address" placeholder="Красный/Синий"
                                       required="" disabled>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Год оканчания учебного заведения</label>
                                <input type="text" class="form-control" id="address" placeholder="День.Месяц.Год"
                                       required="" disabled
                                       value="{{ DB::table('students')->where('userId', Auth::user()->id)->value('yearGraduation') }}">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Портфолио</label>
                                <input type="text" class="form-control " id="address" placeholder="Ваше портфолио"
                                       required="" disabled
                                       value="{{ DB::table('students')->where('userId', Auth::user()->id)->value('portfolio') }}">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <hr class="mb-4">
                            <a href="{{ route('student.profile.edit', Auth::user()->id) }}">
                                <button class="btn btn-primary btn-lg btn-block">Редактировать</button>
                            </a>
                        @endif


                        @if (Auth::user()->hasAnyRole('Учебное заведение'))
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Название учебного заведения</label>
                                    <input type="text" class="form-control" id="firstName"
                                           placeholder="Учебное заведение"
                                           value="{{ DB::table('educational_institutions')->where('userId', Auth::user()->id)->value('educationName') }}"
                                           required="" disabled>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Место расположение</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Расположение"
                                           value="{{ DB::table('educational_institutions')->where('userId', Auth::user()->id)->value('educationLocation') }}"
                                           required="" disabled>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-4">
                            <a href="{{ route('study.profile.edit', Auth::user()->id) }}">
                                <button class="btn btn-primary btn-lg btn-block">Редактировать</button>
                            </a>
                        @endif
                        @if (Auth::user()->hasAnyRole('Организация'))
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">Наименование организации</label>
                                        <input type="text" class="form-control" id="firstName"
                                               placeholder="Введите ваше ФИО"
                                               value="{{ DB::table('organizations')->where('userId', Auth::user()->id)->value('name') }}"
                                               required="" disabled>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Адрес</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="Адрес организации"
                                               value="{{ DB::table('organizations')->where('userId', Auth::user()->id)->value('address') }}"
                                               required="" disabled>
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="tel">Телефон организации</label>
                                    <input type="tel" class="form-control" id="tel" placeholder="+7 (XXX) XXX XX XX"
                                           value="{{ DB::table('organizations')->where('userId', Auth::user()->id)->value('phone') }}"
                                           disabled>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Email</label>
                                    <input type="email" class="form-control" id="address"
                                           placeholder="Эл-почта организации" required=""
                                           value="{{ Auth::user()->email }}"
                                           disabled>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Веб сайт</label>
                                    <input type="text" class="form-control" id="address" placeholder="Сайт организации"
                                           required="" disabled
                                           value="{{ DB::table('organizations')->where('userId', Auth::user()->id)->value('web-site') }}"
                                    >
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address">Специализация</label>
                                    <input type="text" class="form-control" id="address" placeholder="Специфика организации"
                                           required=""
                                           value="{{ DB::table('organizations')->where('userId', Auth::user()->id)->value('specialty') }}" disabled>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>

                                <hr class="mb-4">
                                <a href="{{ route('organization.profile.edit', Auth::user()->id) }}">
                                    <button class="btn btn-primary btn-lg btn-block">Редактировать</button>
                                </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
