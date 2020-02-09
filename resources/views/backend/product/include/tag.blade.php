<h1>Tag Information</h1>
<div class="form-group">
    {!! Form::label('tag_id', 'Tag') !!}
    {!! Form::select('tag_id[]', $data['tags'], null, ['class' => 'form-control tag_id','multiple' => 'multiple','style' => 'width: 100%'])!!}
</div>
