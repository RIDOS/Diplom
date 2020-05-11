@extends('layouts.app')

@section('sidebar')
@extends('layouts.sidebar')
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Мои вакансии</div>
        <div class="card-body">
          <a class="nav-link pl-0" href="{{ route('organization.vakansi.create') }}">
            <button type="button" class="btn btn-success" name="button">Добавить вакансию</button>
          </a>
          <div class="card" style="width: 65rem;">
            <div class="card-body">
              <h5 class="card-title">Название карточки</h5>
              <h6 class="card-subtitle mb-2 text-muted">Подзаголовок карты</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">
                <a href="#" class="float-left">
                  <button type="button" class="btn btn-primary btn-sm">
                    Редактировать
                  </button>
                </a>
              </a>
              <a href="#" class="card-link">
                <form action="#"
                method="POST" class="float-left ml-2">
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
