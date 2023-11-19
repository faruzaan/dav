@extends('admin/templates/header')
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
          <li class="breadcrumb-item active">{{ $result[0]->Tour->nama_tour }}</li>
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
          <form>
            <div class="row">
              <div class="col-md-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Tour</label>
                    <input type="text" class="form-control" id="TourName" value="{{ $result[0]->Tour->nama_tour }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Destination</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $result[0]->Destination->count() }}" disabled>
                  </div>

                </div>
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Duration (Day)</label>
                    <input type="text" class="form-control" id="TourDuration" value="{{ $result[0]->Tour->duration }}" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="button" class="btn btn-warning" id="btn-tour-edit">Edit</button>
              <button type="submit" class="btn btn-success" id="btn-tour-save" disabled>Save</button>
              <button type="button" class="btn btn-danger" id="btn-tour-cancel" disabled>Cancel</button>
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
          <!-- form start -->
          <form>
            <div class="row">
              <div class="col-md-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Tour</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $result[0]->Tour->nama_tour }}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Destination</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $result[0]->Destination->count() }}" disabled>
                  </div>

                </div>
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Duration (Day)</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $result[0]->Tour->duration }}" disabled>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('script')
    <script>
        var tourName = "";
        var tourDuration = "";

        $('#btn-tour-edit').click(function(){
            $('#btn-tour-edit').prop("disabled", true);
            $('#btn-tour-save').prop("disabled", false);
            $('#btn-tour-cancel').prop("disabled", false);

            var tourName = $('#TourName').val();
            var tourDuration = $('#TourDuration').val();

            $('#TourName').prop("disabled", false);
            $('#TourDuration').prop("disabled", false);
        });
        $('#btn-tour-cancel').click(function(){
            $('#btn-tour-edit').prop("disabled", false);
            $('#btn-tour-save').prop("disabled", true);
            $('#btn-tour-cancel').prop("disabled", true);

            $('#TourName').prop("disabled", true);
            $('#TourDuration').prop("disabled", true);
        });
    </script>
@endpush
