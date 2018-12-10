@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card row">
                <div class="card-body">
                    <h4 class="card-title">{{$news->title}}</h4>
                    <p class="card-text">
                        {{$news->text}}
                    </p>
                    <hr>
                    <div class="m-0 pull-left">
                        <a href="{{route('news_list')}}" title="@lang('news.back')">
                            <i class="fa fa-long-arrow-left" style="font-size: 3em;"></i>
                        </a>
                    </div>
                    <div class="m-0 pull-right">{{$news->created_at}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection