@extends('layouts.backend')

@section('title',$panel . ' ' . $page_title)

@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/bower_components/select2/dist/css/select2.min.css')}}"/>
@endsection

@section('js')
    <script src="{{asset('assets/backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tag_id').select2();
        });
    </script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('description', options);
    </script>
    @include('backend.product.include.add_rows_script')
    @endsection
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
        @include('backend.includes.flash_message')

      @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        {!! Form::open(['route' =>  $base_route. '.store', 'method' => 'post','files' =>true]) !!}
          <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Basic Information</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Meta Information</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Tag Information</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Image Information</a></li>
                  <li><a href="#tab_5" data-toggle="tab">Attribute Information</a></li>
              </ul>
              <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                        @include('backend.product.include.basic')
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                      @include('backend.product.include.meta')
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                      @include('backend.product.include.tag')
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
                      @include('backend.product.include.image')
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_5">
                      @include('backend.product.include.attributes')
                  </div>
                  <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
          </div>
          <div class="form-group">
              {!! Form::submit("Create Product",['class' => 'btn btn-success']) !!}
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
