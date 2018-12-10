@extends('layouts.app')

@section('content')

<div class="container">
    
    <a href="{{route('admin.news.create')}}" class="btn btn-primary pull-right mb-4 mr-4">@lang('news.add')</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>@lang('news.title')</th>
                <th>@lang('news.status')</th>
                <th>@lang('news.actions')</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($news as $item)
                <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->published ? __('news.published') : __('news.not_published')}}</td>
                    <td>
                        <form action="{{route('admin.news.destroy', $item)}}" method="post"
                              onsubmit="if(confirm('{{ __('news.delete_confirm')}}')){ return true; }else{ return false; }">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}

                            <a href="{{route('admin.news.edit', ['slug' => $item->slug])}}" class="btn btn-primary" title="@lang('news.edit')">
                                <i class="fa fa-edit"></i>
                            </a>

                            <button type="submit" class="btn btn-primary" title="@lang('news.delete')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">@lang('news.no_news')</td>
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

</div>

@endsection