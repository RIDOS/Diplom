@extends('layouts.app')

@section('sidebar')
    {{--    @extends('layouts.sidebar')--}}
@endsection


@section('content')

    <?php
    use Illuminate\Support\Facades\Auth;
    ?>
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Редактировать профиль</div>

                    <div class="card-body">
                        <form action="{{ route('study.profile.update', ['user'=>Auth::user()->id]) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="id">Название учебного заведения</label>
                                    <input type="text" name="educationName" class="form-control" id="iduser" placeholder="Учебное заведение" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Место расположение</label>
                                    <input type="text" name="spot" class="form-control" id="lastName" placeholder="Расположение" value=""
                                           required="" >
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>


                            <hr class="mb-4">
                            <button class="btn btn-success btn-lg btn-block" type="submit">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
