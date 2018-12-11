@extends('layouts.app')

@section('title', 'News')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            @forelse ($news as $item)
                <div class="card row mb-4">
                    <div class="card-body">
                        <a href="{{route('news', $item->slug)}}">
                            <h4 class="card-title">{{$item->title}}</h4>
                        </a>
                        <p class="card-text">
                            {{$item->text}}
                        </p>
                        <hr>
                        <div class="text-small text-right">{{$item->created_at}}</div>
                    </div>
                </div>
            @empty
                @lang('news.no_news')
            @endforelse
            <ul class="pagination pull-right">
                {{$news->links()}}
            </ul>
        </div>
    </div>
</div>
@endsection