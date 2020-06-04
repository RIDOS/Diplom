@extends('layouts.app')

@section('sidebar')
    @extends('layouts.sidebar')
@endsection

@section('content')

<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
?>
    <form class="form-inline col-md-12" method="GET">
        <input class="form-control col-md-11" type="search" placeholder="Поиск" name="search" aria-label="Search">
        <button class="btn btn-outline-success col-md-1 my-2 my-sm-0" type="submit">Искать</button>
    </form>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Вакансиями</div>

                    <div class="card-body">

                      @foreach ($vakansii as $value)
                      <div class="card" style="width: 65rem; margin: 1em">
                        <div class="card-body">
                          <h5 class="card-title">{{ $value->title }}</h5>
                          <h6 class="card-subtitle mb-2 text-muted">Организация: {{ DB::table('organizations')
                            ->where('id' , $value->organization_id)
                            ->value('name') }}</h6>
                          <h6 class="card-subtitle mb-2 text-muted">Заработная плата: {{ $value->cost }} руб.</h6>
                          <p class="card-text">Описание: {{ $value->description }}</p>
                        </div>
                      </div>
                      @endforeach
                      {{ $vakansii->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
