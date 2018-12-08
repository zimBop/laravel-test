@extends('admin.layouts.app_admin')

@section('content')

<div class="container">


    <h4 class="">Редактировать новость</h4>
    <hr />

    <form class="form-horizontal" action="{{route('admin.news.update', $news)}}" method="post">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}

        {{-- Form include --}}
        @include('admin.news.components.form')
        
        <input type="hidden" name="modified_by" value="{{Auth::id()}}">
    </form>
</div>

@endsection