@extends('layouts.app')

@section('title', 'Create News')

@section('content')

<div class="container">


    <h4 class="">@lang('news.add')</h4>
    <hr />

    <form class="form-horizontal" action="{{route('admin.news.store')}}" method="post">
        {{ csrf_field() }}

        {{-- Form include --}}
        @include('admin.news.components.form')
        
        <input type="hidden" name="created_by" value="{{Auth::id()}}">
    </form>
</div>

@endsection