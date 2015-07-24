@extends('product::app')
@section('content')
    <h1>Админка продуктов</h1>
    <table class="table">
        <thead>
        <tr class="row">
            <th>#</th>
            <th>Имя</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach ( $items as $i=>$item )
                <tr class="row">
                    <th class="col-md-1">{{ ($items->currentPage() - 1) * $items->perPage() + $i+1 }}</th>
                    <td class="col-md-2">{{ $item->name }}</td>
                    <td class="col-md-8">
                        <div class="table-btns pull-right">
                            <a class="btn btn-default btn-md" href="/admin/product/{{ $item->id }}/edit" >Редактировать</a>
                            <form class="inline" action="/admin/photo/{{ $item->id }}" method="post"><input type="hidden" name="_token" value="{{ csrf_token() }}"/><input type="hidden" name="_method" value="delete"/><button class="btn btn-default btn-md">Удалить</button></form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <div class="col-md-12">{!! $items->render() !!}</div>
    </div>
    <a class="btn btn-default" href="/admin/product/create">Добавить</a>
@endsection