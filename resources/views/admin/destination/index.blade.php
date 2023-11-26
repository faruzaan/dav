@extends('admin/templates/header')
@push('style')
<link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('contents')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Island</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Island</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @include('admin/templates/feedback')
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Island Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#modal-lg">
                  Create Island
                </button>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Destination</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($result as $row)
                      <tr>
                        <td>{{ !empty($i) ? ++$i : $i = 1 }}</td>
                        <td><a href="{{url("admin/destination/$row->id_destination")}}">{{ $row->nama_destination }}</a></td>
                        <td>
                          <button class="btn btn-warning edit" data-toggle="modal" data-target="#modal-edit" data-id="{{ $row->id_destination }}">Edit</button>
                          <form action="{{url("admin/destination/$row->id_destination/delete")}}" method="POST" style="display: inline;">
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Island</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('admin/destination')}}">
                    {{ csrf_field() }}
                <div class="modal-body">
                        <div class="form-group">
                            <label for="island">Destination</label>
                            <input type="text" class="form-control" id="island" name="nama_destination" placeholder="Enter destination">
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
		<!-- /.modal -->
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Destination</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{url('admin/destination/edit')}}">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <div class="modal-body">
                  <div class="form-group">
                      <label for="island">Destination</label>
                      <input type="hidden" id="id_destination" name="id" value="">
                      <input type="text" class="form-control" id="edit_destination" name="nama_destination" value="">
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit_edit" type="submit" class="btn btn-primary" disabled>Submit</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@push('script')
<script src="{{asset('assets')}}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  $("#edit_destination").on('change', function(){
    if($("#edit_destination").val() == null){
      $("#submit_edit").prop("disabled", true);
    }else{
      $("#submit_edit").prop("disabled", false);
    }
  });

  $(".edit").on("click", function(){
    // console.log($(this).attr("data-id"))
    $.ajax({
        type: 'GET',
        url: '/admin/destination/getDestination',
        data: {
            data: $(this).attr("data-id")
        },
        success: function (response) {
          console.log(response)
          $("#edit_destination").val(response[0].nama_destination)
          $("#id_destination").val(response[0].id_destination)
            // $('#message').text(response.message);
        },
        error: function (error) {
            console.log(error);
        }
    });
  })
</script>
@endpush
