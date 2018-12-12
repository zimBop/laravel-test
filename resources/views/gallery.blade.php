@extends('layouts.app')

@section('title', 'Gallery')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        @forelse ($images as $image)
            <div class="col-3 mb-4 text-center">
                <image class="img-thumbnail" src="{{$image->thumbnails_url}}" style="cursor: pointer;"
                       alt="{{$image->file_name}}" data-url="{{$image->url}}" data-name="{{$image->file_name}}"
                       data-toggle="modal" data-target="#modal-with-image">
                <div>
                    {{$image->file_name}}
                </div>
            </div>
        @empty
            @lang('gallery.no_images')
        @endforelse

    </div>
    
    <ul class="pagination pull-right">
        {{$images->links()}}
    </ul>
    
    <div class="modal fade" id="modal-with-image" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body justify-content-center text-center">
            <image class="img-fluid" id="modal-image">
          </div>
        </div>
      </div>
    </div>
    
</div>

@endsection