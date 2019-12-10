<div class="form-group">
    {{ Form::label('name', 'Title:') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>
<div class="form-group">
    {{ Form::label('body', 'Сontent:') }}
    {{ Form::textarea('body', null, ['id' => 'editor', 'class' => 'form-control']) }}
    @if ($errors->has('body'))
        <span class="text-danger">{{ $errors->first('body') }}</span>
    @endif
</div>

<script src="{{ asset('ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor5-build-classic/build/translations/ru.js') }}"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo', ],
            language: 'ru',
        } )
        .catch( error => {
            console.log( error );
        } );
</script>