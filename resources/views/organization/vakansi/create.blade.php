@extends('layouts.app')

@section('sidebar')
    @extends('layouts.sidebar')
@endsection
<?php
use Illuminate\Support\Facades\Auth;
?>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Создание вакансии</div>
                    <div class="card-body">
                      <form method="POST" action="{{ route('organization.vakansi.store') }}">
                          @csrf
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Введите название</label>
                          <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="название вакан">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Зароботная плата</label>
                          <input type="number" class="form-control" name="cost" id="exampleFormControlInput1" placeholder="предпологаемая зароботная плата">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Описание</label>
                          <textarea class="form-control" name="description" placeholder="описание вакансии" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Добавить</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
