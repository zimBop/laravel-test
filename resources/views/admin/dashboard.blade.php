@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                @lang('admin.news_count', ['news_count' => $news_count])
            </div>
            <div class="col-sm">
                @lang('admin.images_count', ['image_count' => $image_count])
            </div>
        </div>
    </div>
@endsection

