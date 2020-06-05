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
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Вакансии</div>
        <div class="card-body">
          <a class="nav-link pl-0" href="{{ route('organization.vakansi.create') }}">
            <button type="button" class="btn btn-success" name="button">Добавить вакансию</button>
          </a>
          <br>
          <h4>Ваши вакансии:</h2>
          <br>
          @foreach ($vakansii as $value)
          <div class="card" style="width: 65rem; margin: 1em">
            <div class="card-body">
              <h5 class="card-title">{{ $value->title }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">Организация: {{ DB::table('organizations')->where('userId', Auth::user()->id)->value('name') }}</h6>
              <h6 class="card-subtitle mb-2 text-muted">Заработная плата: {{ $value->cost }} руб.</h6>
              <p class="card-text">Описание: {{ $value->description }}</p>
              <a href="#" class="card-link">
                <form action="{{ route('organization.vakansi.destroy', $value->id) }}"
                  method="POST" class="float-left">
                  @csrf
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                </form>
              </a>
            </div>
          </div>
          @endforeach

          @if (count($vakansii) == 0)
          <h3>-- Список пуст --</h3>
          @endif

      </div>
    </div>
  </div>
</div>
</div>
@endsection
