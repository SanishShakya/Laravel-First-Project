<div class="form-group">
  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', null,['placeholder' => 'Enter Name','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'name'])
</div>
<div class="form-group">
  {!! Form::label('slug', 'Slug') !!}
  {!! Form::text('slug', null,['placeholder' => 'Enter Slug','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'slug'])
</div>
<div class="form-group">
  {!! Form::label('rank', 'Rank') !!}
  {!! Form::number('rank', null,['placeholder' => 'Enter Rank','class' => 'form-control']) !!}
  @include('backend.includes.form_error', ['field' => 'rank'])
</div>
<div class="form-group">
  {!! Form::label('description', 'Description') !!}
  {!! Form::textarea('description', null,['placeholder' => 'Enter Description','class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('meta_keyword', 'Meta Keyword') !!}
  {!! Form::textarea('meta_keyword', null,['placeholder' => 'Enter Meta Keyword','class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('meta_description', 'Meta Description') !!}
  {!! Form::textarea('meta_description', null,['placeholder' => 'Enter Meta Description','class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Image') !!}
    {!! Form::file('category_image',['class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'image'])
</div>
<div class="form-group">
  {!! Form::label('status', 'Status') !!}
  {!! Form::radio('status', 1) !!} Active
  {!! Form::radio('status', 0,true) !!} De Active
</div>
<div class="form-group">
  {!! Form::submit($button,['class' => 'btn btn-success']) !!}
</div>
