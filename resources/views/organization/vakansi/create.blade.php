@extends('layouts.app')

@section('sidebar')
    @extends('layouts.sidebar')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Добавление вакансии</div>
                    <div class="card-body">
                      <form>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Введите название</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="название вакан">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Зароботная плата</label>
                          <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="предпологаемая зароботная плата">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Описание</label>
                          <textarea class="form-control" placeholder="начните писать..." id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Добавить</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
