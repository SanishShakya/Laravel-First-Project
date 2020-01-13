@extends('layouts.backend')
@section('title','Tag Create')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tag Management
            <small>it all about tag</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tag</a></li>
            <li class="active">Create Tag</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                        </ul>
                    </div>
                @endif
               {!! Form::open(['route' => 'backend.tag.store', 'method' => 'POST']) !!}
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
                    {!! Form::submit('Save Tag', ['class' => 'btn btn-success']); !!}

                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
