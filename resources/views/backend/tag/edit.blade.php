@extends('layouts.backend')
@section('title','Tag Edit')
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
            <li class="active">Edit Tag</li>
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
{{--               {!! Form::open(['route' => 'backend.tag.update', 'method' => 'PUT']) !!}--}}
                    {!! Form::model($data['row'], ['route' => ['backend.tag.update', $data['row']->id],'method' => 'PUT']) !!}
                @include('backend.tag.include.main_form',['button' => 'Update Tag'])
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
