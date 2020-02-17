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
        @include('backend.includes.flash_message')
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>SN</th>
              <th>Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($data['rows'] as $key => $row)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$row->name}}</td>
              <td>
                @if ($row->status == 1)
                  <span class="label label-success">Active</span>
                    @else
                  <span class="label label-danger">DeActive</span>
                @endif
              </td>
              <td>
                <a href="{{route( $base_route . '.edit',$row->id)}}" class="btn btn-info">Edit</a>
                <a href="{{route($base_route . '.show',$row->id)}}" class="btn btn-info">Show</a>
                {!! Form::open(['route' => [$base_route . '.destroy',$row->id], 'method' => 'delete','onsubmit' => "return confirm('are you sure to delete?')"]) !!}
                {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
          </tbody>
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