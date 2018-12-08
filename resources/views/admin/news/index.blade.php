@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    
</div>

<a href="{{route('admin.news.create')}}" class="btn btn-primary pull-right mb-4">Добавить новость</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Заголовок новости</th>
            <th>Статус</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($news as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->published ? 'Опубликовано' : 'Неопубликовано'}}</td>
                <td>
                    <form action="{{route('admin.news.destroy', $item)}}" method="post"
                          onsubmit="if(confirm('Вы действительно хотите удалить новость?')){ return true; }else{ return false; }">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}

                        <a href="{{route('admin.news.edit', ['id' => $item->id])}}" class="btn btn-primary" title="Редактировать">
                            <i class="fa fa-edit"></i>
                        </a>
                        
                        <button type="submit" class="btn btn-primary" title="Удалить">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">Новости еще не добавлены.</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                <ul class="pagination pull-right">
                    {{$news->links()}}
                </ul>
            </td>
        </tr>
    </tfoot>
</table>

@endsection