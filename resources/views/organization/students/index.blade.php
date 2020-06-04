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
                                <th scope="col">ФИО</th>
                                <th scope="col">Учебное заведение</th>
                                <th scope="col">Год оканчания обучения</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($students as $a)
                              @if(isset($_GET['search']))
                              @if('' == $_GET['search'])
                              <tr>
                                <th>{{ $a->studentName }}</th>
                                <th>{{ DB::table('educational_institutions')
                                  ->where('id', DB::table('sharedentries')
                                  ->where('stud_Id', $a->id)
                                  ->value('edu_Id'))
                                  ->value('educationName') }}</th>

                                  <th>{{ $a->yearGraduation }}</th>
                                  <th>
                                    <a href="{{ route('organization.students.show', $a->id) }}" class="float-left">
                                      <button type="button" class="btn btn-primary btn-sm">Подробнее
                                      </button>
                                    </a>
                                  </th>
                                </tr>
                                @endif
                                @if($a->studentName == $_GET['search'] || $a->yearGraduation == $_GET['search'] || DB::table('educational_institutions')
                                  ->where('id', DB::table('sharedentries')
                                  ->where('stud_Id', $a->id)
                                  ->value('edu_Id'))
                                  ->value('educationName') == $_GET['search'])

                                <tr>
                                  <th>{{ $a->studentName }}</th>
                                  <th>{{ DB::table('educational_institutions')
                                    ->where('id', DB::table('sharedentries')
                                    ->where('stud_Id', $a->id)
                                    ->value('edu_Id'))
                                    ->value('educationName') }}</th>

                                    <th>{{ $a->yearGraduation }}</th>
                                    <th>
                                      <a href="{{ route('organization.students.show', $a->id) }}" class="float-left">
                                        <button type="button" class="btn btn-primary btn-sm">Подробнее
                                        </button>
                                      </a>
                                    </th>
                                  </tr>
                                  @endif
                                  @else

                                  <tr>
                                    <th>{{ $a->studentName }}</th>
                                    <th>{{ DB::table('educational_institutions')
                                      ->where('id', DB::table('sharedentries')
                                      ->where('stud_Id', $a->id)
                                      ->value('edu_Id'))
                                      ->value('educationName') }}</th>

                                      <th>{{ $a->yearGraduation }}</th>
                                      <th>
                                        <a href="{{ route('organization.students.show', $a->id) }}" class="float-left">
                                          <button type="button" class="btn btn-primary btn-sm">Подробнее
                                          </button>
                                        </a>
                                      </th>
                                    </tr>

                                    @endif

                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
