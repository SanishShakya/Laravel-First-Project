@extends('layouts.backend')

@section('title',$panel . ' ' . $page_title)

@section('content')
    <!-- Content Header (Page header) -->
    @include('backend.includes.breadcrumb')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">

                <h3 class="box-title">
                    {{$panel}} {{$page_title}}
                    <a href="{{route($base_route . '.create')}}" class="btn btn-info"> <i class="fa fa-plus"></i> Create {{$panel}} </a>
                    <a href="{{route($base_route . '.index')}}" class="btn btn-success"> <i class="fa fa-list"></i> List {{$panel}} </a>
                </h3>

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
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{--        {!! Form::open(['route' => ['backend.tag.update',$data['row']->id], 'method' => 'post']) !!}--}}
                {!! Form::model($data['row'], ['route' => [$base_route.'.update', $data['row']->id],'method' => 'PUT']) !!}
                @include($view_path . '.include.main_form',['button' => 'Update ' . $panel])
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
