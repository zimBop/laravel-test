@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            {!! $page->content !!}
        </div>
    </div>
</div>
@endsection
