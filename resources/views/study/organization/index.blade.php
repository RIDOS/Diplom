@extends('layouts.app')
<?php
use App\educationalInstitution;
?>

@section('sidebar')
    @extends('layouts.sidebar')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Организации</div>
                    <div class="card-body">
                      @foreach($orgs as $value)
                      <!-- Место для карточки -->
                      <div class="card" style="width: 65rem;">
                        <div class="card-body">
                          <h5 class="card-title">Название организации: "{{ $value->name }}"</h5>
                          <h6 class="card-subtitle mb-2 text-muted">Адрес: {{ $value->address }}</h6>
                          <p class="card-text">Специализация: {{ $value->specialty }}</p>
                          <a href="{{ route('study.profile.show', $value->id) }}" class="card-link">Подробнее</a>
                        </div>
                      </div>
                      <br>
                      <!--  -->
                      @endforeach
                      {{ $orgs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
