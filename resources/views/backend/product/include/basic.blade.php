<h1>Basic Information</h1>
<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', $data['categories'], null, ['placeholder' => 'Select the category...','class' => 'form-control'])!!}
    @include('backend.includes.form_error', ['field' => 'category_id'])
</div>
<div class="form-group">
    {!! Form::label('subcategory_id', 'SubCategory') !!}
    {!! Form::select('subcategory_id', $data['subcategories'], null, ['placeholder' => 'Select the subCategory...','class' => 'form-control'])!!}
    @include('backend.includes.form_error', ['field' => 'subcategory_id'])
</div>
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
    {!! Form::label('price', 'Price') !!}
    {!! Form::number('price', null,['placeholder' => 'Enter Price','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'price'])
</div>
<div class="form-group">
    {!! Form::label('quantity', 'Quantity') !!}
    {!! Form::number('quantity', null,['placeholder' => 'Enter Quantity','class' => 'form-control']) !!}
    @include('backend.includes.form_error', ['field' => 'quantity'])
</div>
<div class="form-group">
    {!! Form::label('unit_id', 'Units') !!}
    {!! Form::select('unit_id', $data['units'], null, ['placeholder' => 'Select the Units...','class' => 'form-control'])!!}
    @include('backend.includes.form_error', ['field' => 'unit_id'])
</div>
<div class="form-group">
    {!! Form::label('short_description', 'Short Description') !!}
    {!! Form::textarea('short_description', null,['placeholder' => 'Enter Short Description','class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null,['placeholder' => 'Enter Description','class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('status', 'Status') !!}
    {!! Form::radio('status', 1) !!} Active
    {!! Form::radio('status', 0,true) !!} De Active
</div>
