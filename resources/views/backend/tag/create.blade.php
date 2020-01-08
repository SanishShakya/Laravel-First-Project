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
               {!! Form::open(['route' => 'backend.tag.store', 'method' => 'post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name'); !!}
                    {!! Form::text('name', null, ['placeholder' => 'Enter Name','class'=> 'form-control']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug'); !!}
                    {!! Form::text('slug', null, ['placeholder' => 'Enter Slug','class'=> 'form-control']); !!}
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
