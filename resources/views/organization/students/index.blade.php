@extends('layouts.app')

@section('sidebar')
    @extends('layouts.sidebar')
@endsection

@section('content')
    <form class="form-inline col-md-12" method="GET">
        <input class="form-control col-md-11" type="search" placeholder="Поиск" name="search" aria-label="Search">
        <button class="btn btn-outline-success col-md-1 my-2 my-sm-0" type="submit">Искать</button>
    </form>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Управление пользователями</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ФИО</th>
                                <th scope="col">Учебное заведение</th>
                                <th scope="col">Год оканчания обучения</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $a)
                                <tr>
                                    <th>{{ $a->studentName }}</th>
                                    <th>УКСИВТ</th>
                                    <th>{{ $a->yearGraduation }}</th>
                                    <th>
                                        <a href="#" class="float-left">
                                            <button type="button" class="btn btn-primary btn-sm">Подробнее
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
