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
        <table class="table table-bordered">
          <tr>
            <th>Name</th>
            <td>{{$data['row']->name}}</td>
          </tr>

          <tr>
            <th>Status</th>
            <td>
              @if ($data['row']->status == 1)
                <span class="label label-success">Active</span>
              @else
                <span class="label label-danger">DeActive</span>
              @endif
            </td>
          </tr>

          <tr>
            <th>Created At</th>
            <td>{{$data['row']->created_at}}</td>
          </tr><tr>
            <th>updated_at</th>
            <td>{{$data['row']->updated_at}}</td>
          </tr>
          <tr>
            <th>Created By</th>
            <td>{{$data['row']->createdBy->name}}</td>
          </tr>

          <tr>
            <td>
              <a href="{{route( $base_route . '.edit',$data['row']->id)}}" class="btn btn-info">Edit</a>
            </td>
            <td>

              {!! Form::open(['route' => [$base_route . '.destroy',$data['row']->id], 'method' => 'delete','onsubmit' => "return confirm('are you sure to delete?')"]) !!}
              {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>

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
