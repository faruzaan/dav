@extends('admin/templates/header')
@push('style')
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/summernote/summernote-bs4.min.css">
@endpush
@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ $result->nama_destination }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{url('admin/destination')}}">Destination</a></li>
          <li class="breadcrumb-item active">{{ $result->nama_destination }}</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ $result->nama_destination }}</h3>
          </div>
          <div class="card-body">
            <form action="{{url('admin/destination/edit')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <input type="hidden" name="id_destination" value="{{$result->id_destination}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Destination</label>
                            <input type="text" class="form-control" name="nama_destination" value="{{ $result->nama_destination }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto</label>
                            <img src="{{asset('uploads/'.$result->foto)}}" alt="" width="100%">
                            <input type="file" class="form-control" name="foto" value="">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Header Desc</label>
                            <textarea id="header" name="header">{!!$result->header!!}</textarea>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Content</label>
                        <textarea id="content" name="content">{!!$result->content!!}</textarea>
                    </div>
                </div>

          </div>
          <div class="card-footer">
            <button class="btn btn-primary" id="btn-test">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@push('script')
    <script src="{{asset('assets')}}/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#header').summernote()
            $('#content').summernote()
        })
    </script>
@endpush
