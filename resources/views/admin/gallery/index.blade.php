@extends('layouts.app')

@section('title', 'Image list')

@section('content')

<div class="container">
    
    <a href="{{route('admin.gallery.create')}}" class="btn btn-primary pull-right mb-4 mr-4">@lang('gallery.upload')</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>@lang('gallery.preview')</th>
                <th>@lang('gallery.image_name')</th>
                <th>@lang('news.actions')</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($images as $image)
                <tr>
                    <td class="align-middle"><img src="{{$image->thumbnails_url}}" class="img-thumbnail"></td>
                    <td class="align-middle">{{$image->name}}</td>
                    <td class="align-middle">
                        <form action="{{route('admin.gallery.destroy', $image->id)}}" method="POST"
                              onsubmit="if(confirm('{{ __('gallery.delete_confirm')}}')){ return true; }else{ return false; }">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-primary" title="@lang('news.delete')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">@lang('gallery.no_images')</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <ul class="pagination pull-right">
        {{$images->links()}}
    </ul>

</div>

@endsection