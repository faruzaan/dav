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
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $result->Detail->count() }}" disabled>
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
                    <input type="text" class="form-control" name="duration" id="TourDuration" value="{{ $result->duration }}">
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
            <h3 class="card-title">Itenary</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#modal-itenary">Add Itenary</button>
            <table id="example1" class="table table-bordered table-striped mt-3">
              <thead>
              <tr>
                <th>No</th>
                <th>Description</th>
                <th>Details</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($itenaries as $itenary)
                <tr>
                    <td>{{ !empty($i) ? ++$i : $i = 1 }}</td>
                    <td>{{$itenary->desc}}</td>
                    <td>
                        <div>
                            <button type="button" class="btn btn-success mb-2 btn-add-itenary-detail" data-toggle="modal" data-target="#modal-desc" data-id="{{$itenary->id_itenary}}" data-tour="{{$result->id_tour}}">Add Description</button>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($itenary->Details->count() != 0)
                                        @foreach (\App\Models\ItenaryDetail::where('id_itenary',$itenary->id_itenary)->get() as $detail)
                                            <tr>
                                                <td><img src="{{asset('uploads/'.$detail->foto)}}" alt="" width="50px" class="img-fluid"></td>
                                                <td>{{$detail->desc}}</td>
                                                <td>
                                                    <button class="btn btn-warning edit-detail-itenary" data-toggle="modal" data-target="#modal-edit-detail-itenary" data-id="{{ $detail->id_itenary_detail }}" data-content="{{ $detail->desc }}">Edit</button>
                                                    <form action="{{url("admin/itenaryDetail/$detail->id_itenary_detail/delete")}}" method="POST" style="display: inline;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button href="" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </td>
                    <td>
                    <button class="btn btn-warning btn-edit-itenary" data-toggle="modal" data-target="#modal-edit-itenary" data-id="{{ $itenary->id_itenary }}" data-desc="{{ $itenary->desc }}">Edit</button>
                    <form action="{{url("admin/itenary/$itenary->id_itenary/delete")}}" method="POST" style="display: inline;">
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
                      <button class="btn btn-warning edit" data-toggle="modal" data-target="#modal-edit-desc" data-id="{{ $tourDetail->id_detail_tour }}" data-content="{{ $tourDetail->id_destination }}">Edit</button>
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
                <h4 class="modal-title">Add Destination</h4>
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
                        @foreach (\App\Models\DestinationDetail::all() as $destination)
                          <option value="{{ $destination->id_destination_detail }}">{{ $destination->nama_destination }}</option>
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
<div class="modal fade" id="modal-itenary">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Itenary</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('admin/itenary/add')}}">
            {{ csrf_field() }}
            <input type="hidden" name="id_tour" value="{{$result->id_tour}}">
            <div class="modal-body">
                <div class="form-group">
                    <label for="island">Itenary</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="desc">
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
<div class="modal fade" id="modal-desc">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Itenary Detail </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('admin/addDetailItenary')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id_tour" id="id_tour_add">
            <input type="hidden" name="id_itenary" id="id_itenary_add">
            <div class="modal-body">
                <div class="form-group">
                    <label for="island">Description</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="desc">
                </div>
                <div class="form-group">
                    <label for="customFile">Foto</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="foto">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
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
<div class="modal fade" id="modal-edit-itenary">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Itenary</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('admin/itenary/edit')}}">
            {{ csrf_field() }}
            <input type="hidden" name="id_program" id="id_program_edit">
            <div class="modal-body">
                <div class="form-group">
                    <label for="island">Itenary</label>
                    <input type="hidden" class="form-control" id="id_itenary_edit" name="id_itenary">
                    <input type="text" class="form-control" id="desc_edit" name="desc">
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
<div class="modal fade" id="modal-edit-desc">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Destination</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('admin/tour/tourDetails/edit')}}">
            {{ csrf_field() }}
            <input type="hidden" name="id_detail_tour" id="id_detail_tour_edit">
            <div class="modal-body">
                <div class="form-group">
                    <label for="island">Destination</label>
                    <select class="form-control select2" name='id_destination' id="id_destination_edit">
                        @foreach (\App\Models\DestinationDetail::all() as $destination)
                          <option value="{{ $destination->id_destination_detail }}">{{ $destination->nama_destination }}</option>
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
<div class="modal fade" id="modal-edit-detail-itenary">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Itenary Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('admin/editDetailItenary')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id_itenary_detail" id="id_itenary_detail_edit">
            <input type="hidden" name="id_tour" value="{{$result->id_tour}}">
            <div class="modal-body">
                <div class="form-group">
                    <label for="island">Description</label>
                    <input type="text" class="form-control" id="desc_itenary_edit" name="desc">
                </div>
                <div class="form-group">
                    <label for="customFile">Foto</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="foto">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
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
    <script src="{{asset('assets')}}/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
    $('.edit').click(function(){
      $('#id_detail_tour_edit').val($(this).attr("data-id"))
      $('#id_destination_edit').val($(this).attr("data-content"))
    })
    $('.btn-edit-itenary').click(function(){
      $('#id_itenary_edit').val($(this).attr("data-id"))
      $('#desc_edit').val($(this).attr("data-desc"))
    })
    $('.btn-add-itenary-detail').click(function(){
      $('#id_tour_add').val($(this).attr("data-tour"))
      $('#id_itenary_add').val($(this).attr("data-id"))
    })
    $('.edit-detail-itenary').click(function(){
      $('#id_itenary_detail_edit').val($(this).attr("data-id"))
      $('#desc_itenary_edit').val($(this).attr("data-content"))
    })



    $(function () {
        bsCustomFileInput.init();
    });
    $('.btn-add-itenary-detail').click(function(){
        $("#id_program").val($(this).attr("data-id"));
    })
    $('.btn-edit-itenary').click(function(){

    })
    $('#desc').summernote()
    $('#tour_detail').summernote()
    $('#header1').summernote()
    $('#content1').summernote()
    $('#header2').summernote()
    $('#content2').summernote()
    $('#desc_header').summernote()
    </script>
@endpush
