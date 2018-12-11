@extends('layouts.app')

@section('title', 'Edit home page')

@section('content')
<div class="container justify-content-center">
    <div class="row">
        <div class="col">
            <form class="form-horizontal" action="{{route('admin.home_page_store')}}" method="post">
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
                @if (isset($changed))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    @lang('admin.home_page_changed')
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <input type="hidden" name="modified_by" value="{{Auth::id()}}">

                <label for="content">@lang('admin.home_page')</label>
                <textarea type="text" class="form-control  mb-4" name="content" 
                        required rows="10">
                    {{$page->content ?? old('content')}}
                </textarea>
                <hr />

                <input class="btn btn-primary" type="submit" value="@lang('news.save')">
            </form>
            
        </div>
    </div>
</div>
@endsection

