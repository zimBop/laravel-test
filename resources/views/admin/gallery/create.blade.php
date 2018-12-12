@extends('layouts.app')

@section('title', 'Upload image')

@section('content')

<div class="container">


    <h4 class="">@lang('gallery.upload')</h4>
    <hr />

    <form class="form-horizontal" action="{{route('admin.gallery.store')}}"
            method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <hr />
        @endif

        <div class="form-group">
            <input type="file" class="form-control-file" name="image" required>
        </div>
        <hr />

        <input class="btn btn-primary" type="submit" value="@lang('news.save')">
        
        <input type="hidden" name="created_by" value="{{Auth::id()}}">
    </form>
</div>

@endsection