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
        <h1>Tour</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{url('admin/tour')}}">Tour</a></li>
          <li class="breadcrumb-item active">{{ $result->nama_tour }}</li>
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
            <h3 class="card-title">Tour</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('admin/tour/edit')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('patch') }}
            <input type="hidden" name="id_tour" value="{{$result->id_tour}}">
            <div class="row">
              <div class="col-md-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Tour</label>
                    <input type="text" class="form-control" name="nama_tour" id="TourName" value="{{ $result->nama_tour }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Destination</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $result->Tour->count() }}" disabled>
                  </div>
                    <div class="form-group">
                        <label for="" class="control-label">Desc</label>
                        <textarea id="desc" name="desc">{!! $result->desc !!}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="" class="control-label">Tour Detail</label>
                      <textarea id="tour_detail" name="tour_detail">{!! $result->tour_detail !!}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="" class="control-label">Header 2</label>
                      <textarea id="header2" name="header2">{!! $result->header2 !!}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="" class="control-label">Content 2</label>
                      <textarea id="content2" name="content2">{!! $result->content2 !!}</textarea>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Duration (Day)</label>
                    <input type="text" class="form-control" name="duration" id="TourDuration" value="{{ $result->Tour->duration }}">
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label">Foto</label>
                    <img src="{{asset('uploads/'.$result->foto)}}" width="100%" alt="">
                    <input type="file" class="form-control" name="foto">
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label">USD</label>
                    <input type="text" class="form-control" name="price_usd" value="{{ $result->price_usd }}">
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label">IDR</label>
                    <input type="text" class="form-control" name="price_idr" value="{{ $result->price_idr }}">
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label">Header 1</label>
                    <textarea id="header1" name="header1">{!! $result->header1 !!}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label">Desc Header</label>
                    <textarea id="desc_header" name="desc_header">{!! $result->desc_header !!}</textarea>
                  </div>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success" id="btn-tour-save">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Destination</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#modal-lg">Add Destination</button>
            <table id="example1" class="table table-bordered table-striped mt-3">
              <thead>
              <tr>
                <th>No</th>
                <th>Destination</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($tourDetails as $tourDetail)
                  <tr>
                    <td>{{ !empty($i) ? ++$i : $i = 1 }}</td>
                    <td><a href="{{url("/admin/destination/$tourDetail->id_destination")}}">{{ $tourDetail->Destination->nama_destination }}</a></td>
                    <td>
                      <form action="{{url("admin/tourDetail/$tourDetail->id_detail_tour/delete")}}" method="POST" style="display: inline;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button href="" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Tour</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('admin/tour/tourDetails')}}">
                {{ csrf_field() }}
                <input type="hidden" name="id_tour" value="{{$result->id_tour}}">
            <div class="modal-body">
                <div class="form-group">
                    <label for="island">Destination</label>
                    <select class="form-control select2" name='id_destination' id="id_category_edit">
                        @foreach (\App\Models\Destination::all() as $destination)
                          <option value="{{ $destination->id_destination }}">{{ $destination->nama_destination }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@push('script')
    <script src="{{asset('assets')}}/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
      $('#desc').summernote()
      $('#tour_detail').summernote()
      $('#header1').summernote()
      $('#content1').summernote()
      $('#header2').summernote()
      $('#content2').summernote()
      $('#desc_header').summernote()
    </script>
@endpush
