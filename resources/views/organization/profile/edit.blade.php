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
                        <form action="{{ route('organization.profile.update', ['user'=>Auth::user()->id]) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Наименование организации</label>
                                    <input type="text" class="form-control" id="firstName"
                                           placeholder="Наименование организации"
                                           required=""
                                           name="name"
                                    >
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Адрес</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Адрес организации"
                                           required=""
                                           name="address">
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="tel">Телефон организации</label>
                                <input type="tel" class="form-control" id="tel" placeholder="+7 (XXX) XXX XX XX"
                                       value=""
                                name="number">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Веб сайт</label>
                                <input type="text" class="form-control" id="address" placeholder="Сайт организации"
                                       required=""
                                name="web">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Специализация</label>
                                <input type="text" class="form-control" id="address" placeholder="Специфика организации"
                                       required=""
                                name="spec">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
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
