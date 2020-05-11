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
                                <th scope="col">Имя</th>
                                <th scope="col">E-mail почта</th>
                                <th scope="col">Роль</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if(isset($_GET['search']))
                                    @if('' == $_GET['search'])
                                        <tr>
                                            <th>{{ $user->name }}</th>
                                            <th>{{ $user->email }}</th>
                                            <th>{{ implode(', ' ,  $user->roles()->get()->pluck('name')->toArray()) }}</th>
                                            <th>
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left">
                                                    <button type="button" class="btn btn-primary btn-sm">Редактировать
                                                    </button>
                                                </a>
                                                <form action="{{ route('admin.users.destroy', $user->id ) }}"
                                                      method="POST" class="float-left">
                                                    @csrf
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                                </form>
                                            </th>
                                        </tr>
                                    @endif
                                    @if($user->id == $_GET['search'] || $user->name == $_GET['search'] || $user->email == $_GET['search'] || implode(', ' ,  $user->roles()->get()->pluck('name')->toArray()) == $_GET['search'])
                                        <tr>
                                            <th>{{ $user->name }}</th>
                                            <th>{{ $user->email }}</th>
                                            <th>{{ implode(', ' ,  $user->roles()->get()->pluck('name')->toArray()) }}</th>
                                            <th>
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left">
                                                    <button type="button" class="btn btn-primary btn-sm">Редактировать
                                                    </button>
                                                </a>
                                                <form action="{{ route('admin.users.destroy', $user->id ) }}"
                                                      method="POST" class="float-left">
                                                    @csrf
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                                </form>
                                            </th>
                                        </tr>
                                    @endif
                                @else
                                    <tr>
                                        <th>{{ $user->name }}</th>
                                        <th>{{ $user->email }}</th>
                                        <th>{{ implode(', ' ,  $user->roles()->get()->pluck('name')->toArray()) }}</th>
                                        <th>
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left">
                                                <button type="button" class="btn btn-primary btn-sm">Редактировать
                                                </button>
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user->id ) }}"
                                                  method="POST" class="float-left">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                            </form>
                                        </th>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
