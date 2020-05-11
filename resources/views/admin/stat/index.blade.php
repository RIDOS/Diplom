@extends('layouts.app')

@section('sidebar')
    @extends('layouts.sidebar')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Статистика сайта</div>
                    <div class="card-body">
                        <p>Всего зарегестированно пользователей: 35</p>
                        <p>Пользователи онлайн: 1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
