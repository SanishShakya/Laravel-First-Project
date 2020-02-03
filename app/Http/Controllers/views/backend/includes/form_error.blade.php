@if ($errors->has($field))
  <label class="text text-danger"> {{$errors->first($field)}}</label>
@endif