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

<label for="">@lang('news.status')</label>
<select class="form-control mb-4" name="published">
    @if (isset($news->id))
        <option value="0" @if ($news->published == 0) selected="" @endif>@lang('news.not_published')</option>
        <option value="1" @if ($news->published == 1) selected="" @endif>@lang('news.published')</option>
    @else
        <option value="0">@lang('news.not_published')</option>
        <option value="1">@lang('news.published')</option>
    @endif
</select>

<label for="">@lang('news.title')</label>
<input type="text" class="form-control  mb-4" name="title" 
       placeholder="@lang('news.title')" value="{{$news->title ?? old('title')}}" required>

<label for="">@lang('news.text')</label>
<textarea type="text" class="form-control  mb-4" name="text" 
          placeholder="@lang('news.text')" required>{{$news->text ?? old('text')}}</textarea>
<hr />

<label for="">@lang('news.meta_descr')</label>
<input type="text" class="form-control  mb-4" name="meta_description" 
       placeholder="@lang('news.meta_descr')" value="{{$news->meta_description ?? old('meta_description')}}">

<label for="">@lang('news.keywords')</label>
<input type="text" class="form-control  mb-4" name="meta_keywords" 
       placeholder="@lang('news.meta_keywords')" value="{{$news->meta_keywords ?? old('meta_keywords')}}">
<hr />

<input class="btn btn-primary" type="submit" value="@lang('news.save')">
