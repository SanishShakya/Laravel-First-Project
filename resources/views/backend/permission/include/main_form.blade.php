<div class="form-group">
  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', null,['placeholder' => 'Enter Name','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'name'])
</div>
<div class="form-group">
  {!! Form::label('route', 'Route') !!}
  {!! Form::text('route', null,['placeholder' => 'Enter Route','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'route'])
</div>
<div class="form-group">
    {!! Form::label('module_id', 'Module') !!}
    {!! Form::select('module_id', $data['modules'], null, ['placeholder' => 'Select the Module...','class' => 'form-control'])!!}
    @include('backend.includes.form_error', ['field' => 'module_id'])
</div>
<div class="form-group">
  {!! Form::label('status', 'Status') !!}
  {!! Form::radio('status', 1) !!} Active
  {!! Form::radio('status', 0,true) !!} De Active
</div>
<div class="form-group">
  {!! Form::submit($button,['class' => 'btn btn-success']) !!}
</div>
