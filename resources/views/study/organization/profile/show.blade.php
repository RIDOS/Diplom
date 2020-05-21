@extends('layouts.app')
<?php
use App\educationalInstitution;
use Illuminate\Support\Facades\DB;
?>

@section('sidebar')
    @extends('layouts.sidebar')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Организация {{ $org->name}}</div>
                    <div class="card-body">
                      <div>
                        <span>Адресс организации: {{ $org->address}}</span>
                      </div>

                      <div>
                        <span>Телефон: {{ $org->phone}}</span>
                      </div>
                      <div>
                        <span>Специализация: {{ $org->specialty}}</span>
                      </div>
                      <div>
                        <a href="http://{{ DB::table('organizations')->where('id', $org->id)->value('web-site') }}">Web-сайт</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
