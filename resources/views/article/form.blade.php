<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>

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


<script>
ClassicEditor
		.create( document.querySelector( '#editor' ) )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( error => {
			console.error( 'There was a problem initializing the editor.', error );
		} );
</script>