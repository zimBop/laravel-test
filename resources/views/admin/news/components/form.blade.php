<label for="">Статус</label>
<select class="form-control mb-4" name="published">
    @if (isset($news->id))
        <option value="0" @if ($news->published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if ($news->published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Заголовок новости</label>
<input type="text" class="form-control  mb-4" name="title" 
       placeholder="Заголовок новости" value="{{$news->title ?? ""}}" required>

<label for="">Текст новости</label>
<textarea type="text" class="form-control  mb-4" name="text" 
          placeholder="Текст новости" required>{{$news->text ?? ""}}</textarea>
<hr />

<label for="">Мета описание</label>
<input type="text" class="form-control  mb-4" name="meta_description" 
       placeholder="Мета описание" value="{{$news->meta_description ?? ""}}">

<label for="">Ключевые слова</label>
<input type="text" class="form-control  mb-4" name="meta_keywords" 
       placeholder="Ключевые слова, через запятую" value="{{$news->meta_keywords ?? ""}}">
<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">