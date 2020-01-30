<div class="form-group">
    {!! Form::label('name', 'Name'); !!}
    {!! Form::text('name', null, ['placeholder' => 'Enter Name','class'=> 'form-control']); !!}
    @if ($errors->has('name'))
        <label class="text text-danger">{{$errors->first('name')}}</label>
    @endif
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug'); !!}
    {!! Form::text('slug', null, ['placeholder' => 'Enter Slug','class'=> 'form-control']); !!}
    @if ($errors->has('slug'))
        <label class="text text-danger">{{$errors->first('slug')}}</label>
    @endif
</div>
<div class="form-group">
    {!! Form::label('meta_keyword', 'Meta Keyword'); !!}
    {!! Form::textarea('meta_keyword', null, ['placeholder' => 'Enter Meta Keyword','class'=> 'form-control']); !!}
</div>
<div class="form-group">
    {!! Form::label('meta_description', 'Meta Description'); !!}
    {!! Form::textarea('meta_description', null, ['placeholder' => 'Enter Meta Description','class'=> 'form-control']); !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Status'); !!}
    {!! Form::radio('status', 1); !!} Active
    {!! Form::radio('status', 0, true); !!} Deactive
</div>
<div class="form-group">
    {!! Form::submit($button, ['class' => 'btn btn-success']); !!}

</div>
