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
                    <div class="card-header">Управление вакансиями</div>

                    <div class="card-body">

                        <div class="card" style="width: 65rem; margin: 1em">
                            <div class="card-body">
                                <h5 class="card-title">JS программист</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Организация: Creapoint</h6>
                                <h6 class="card-subtitle mb-2 text-muted">Зарплата: 25000</h6>
                                <p class="card-text">Ищем молодых, перспективных JS программистов!</p>
                                <a href="#" class="card-link">
                                    <form action="#"
                                          method="POST" class="float-left">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                    </form>
                                </a>
                            </div>
                        </div>

                        <div class="card" style="width: 65rem; margin: 1em">
                            <div class="card-body">
                                <h5 class="card-title">С# программист</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Организация: CHICAGO</h6>
                                <h6 class="card-subtitle mb-2 text-muted">Зарплата: 25000</h6>
                                <p class="card-text">Ищем midl web developer'а, на позицию C# разработчик.</p>
                                <a href="#" class="card-link">
                                    <form action="#"
                                          method="POST" class="float-left">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                    </form>
                                </a>
                            </div>
                        </div>

                        <div class="card" style="width: 65rem; margin: 1em">
                            <div class="card-body">
                                <h5 class="card-title">PHP программист</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Организация: RainboWEB</h6>
                                <h6 class="card-subtitle mb-2 text-muted">Зарплата: 50000</h6>
                                <p class="card-text">Ищем молодых, перспективных JS программистов!</p>
                                <a href="#" class="card-link">
                                    <form action="#"
                                          method="POST" class="float-left">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
