<section class="content-header">
  <h1>
    {{$panel}} Management
    <small>it all about {{strtolower($panel)}}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{route($base_route . '.index')}}">{{$panel}}</a></li>
    <li class="active" >{{$page_title}}</li>
  </ol>
</section>