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


        @foreach ($vakansii as $value)
        @if(isset($_GET['search']))
        @if('' == $_GET['search'])
        <div class="card" style="width: 65rem; margin: 1em">
          <div class="card-body">
            <h5 class="card-title">{{ $value->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Организация: {{ DB::table('organizations')->where('userId', $value->id)->value('name') }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Заработная плата: {{ $value->cost }} руб.</h6>
            <p class="card-text">Описание: {{ $value->description }}</p>
            <a href="#" class="card-link">
              <form action="{{ route('admin.vakansii.destroy', $value->id) }}"
                method="POST" class="float-left">
                @csrf
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
              </form>
            </a>
          </div>
        </div>
        @endif
        @if($value->cost == $_GET['search'] || $value->title == $_GET['search'] || $value->description == $_GET['search'])
        <div class="card" style="width: 65rem; margin: 1em">
          <div class="card-body">
            <h5 class="card-title">{{ $value->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Организация: {{ DB::table('organizations')->where('userId', $value->id)->value('name') }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Заработная плата: {{ $value->cost }} руб.</h6>
            <p class="card-text">Описание: {{ $value->description }}</p>
            <a href="#" class="card-link">
              <form action="{{ route('admin.vakansii.destroy', $value->id) }}"
                method="POST" class="float-left">
                @csrf
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
              </form>
            </a>
          </div>
        </div>
        @endif
        @else
        <div class="card" style="width: 65rem; margin: 1em">
          <div class="card-body">
            <h5 class="card-title">{{ $value->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Организация: {{ DB::table('organizations')->where('userId', $value->id)->value('name') }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Заработная плата: {{ $value->cost }} руб.</h6>
            <p class="card-text">Описание: {{ $value->description }}</p>
            <a href="#" class="card-link">
              <form action="{{ route('admin.vakansii.destroy', $value->id) }}"
                method="POST" class="float-left">
                @csrf
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
              </form>
            </a>
          </div>
        </div>
        @endif
        @endforeach

        {{ $vakansii->links() }}
      </div>
    </div>
  </div>
</div>
</div>
@endsection
