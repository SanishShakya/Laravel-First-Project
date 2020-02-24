<div class="form-group">
  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', null,['placeholder' => 'Enter Name','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'name'])
</div>
<div class="form-group">
  {!! Form::label('email', 'Email') !!}
  {!! Form::text('email', null,['placeholder' => 'Enter Email','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'email'])
</div>
<div class="form-group">
  {!! Form::label('password', 'Password') !!}
  {!! Form::password('password',['placeholder' => 'Enter Password','class' => 'form-control']) !!}
  @include('backend.includes.form_error', ['field' => 'password'])
</div>
<div class="form-group">
    {!! Form::label('role_id', 'Role') !!}
    {!! Form::select('role_id', $data['roles'], null, ['placeholder' => 'Select the Role...','class' => 'form-control'])!!}
</div>
<div class="form-group">
  {!! Form::label('status', 'Status') !!}
  {!! Form::radio('status', 1) !!} Active
  {!! Form::radio('status', 0,true) !!} De Active
</div>
<div class="form-group">
  {!! Form::submit($button,['class' => 'btn btn-success']) !!}
</div>
