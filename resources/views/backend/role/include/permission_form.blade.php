<div class="form-group">
  <h3>Role name : {{$data['role']->name}}</h3>
</div>

<ul>
  {!! Form::hidden('role_id', $data['role']->id) !!}
@foreach($data['modules'] as $module)
  <li>
    {{$module->name}}
    <ul type="none">
    @foreach ($module->permissions as $permission)
      @if (in_array($permission->id,$data[' assigned_permissions']))
          <li> {!! Form::checkbox('permission_id[]',$permission->id,true ) !!}{{$permission->name}}</li>

        @else
          <li> {!! Form::checkbox('permission_id[]',$permission->id ); !!}{{$permission->name}}</li>

        @endif
    @endforeach
    </ul>
  </li>

@endforeach
</ul>
<div class="form-group">
  {!! Form::submit($button,['class' => 'btn btn-success']) !!}
</div>
