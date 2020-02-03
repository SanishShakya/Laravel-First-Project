@extends('layouts.backend')
@section('title','Role List')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Role Management
            <small>it all about role</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Role</a></li>
            <li class="active">List Role</li>
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
                <table class="table table-bordered">
                  <tr>
                      <th>Name:</th>
                      <td>{{ucFirst($data['row']->name)}}</td>
                  </tr>
                    <tr>
                        <th>Status:</th>
                         <td> @if($data['row']->status == 1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">De-active</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created At:</th>
                        <td>{{$data['row']->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Created By:</th>
                        <td>{{$data['row']->createdBy->name}}</td>
                    </tr>
                    <tr>
                        <th>Updated At:</th>
                        <td>{{$data['row']->updated_at}}</td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>Updated By:</th>--}}
{{--                        <td>{{$data['row']->updatedBy->name}}</td>--}}
{{--                    </tr>--}}
                </table>
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
