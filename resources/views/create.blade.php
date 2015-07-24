@extends('product::app')
@section('content')
    <h1>Создание продукта</h1>
    <ol class="breadcrumb">
        <li><a href="/admin/product">Админка продуктов</a></li>
        <li class="active">Создание продукта</li>
    </ol>

    <form action="/admin/product" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>


        @if(Config::get('app.current_user_type') == 'admin')
            @if($errors->has('art'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('art') }}
                </div>
            @endif
            <div class="form-group @if($errors->has('art'))has-error has-feedback @endif ">
                <label class="control-label" for="art">Артикул</label>
                <input name="art" type="text" class="form-control" id="art" value="{{ old('art') }}">
            </div>
        @endif

        @if($errors->has('name'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('name') }}
        </div>
        @endif
        <div class="form-group @if($errors->has('name'))has-error has-feedback @endif ">
            <label class="control-label" for="name">Имя</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
        </div>
        <button class="btn btn-default">Сохранить</button>
    </form>
@endsection