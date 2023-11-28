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
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                <h3 class="card-title">Product Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#modal-lg">
                  Create Product
                </button>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($result as $row)
                      <tr>
                        <td>{{ !empty($i) ? ++$i : $i = 1 }}</td>
                        <td>
                            <img src="{{asset('uploads/'.$row->foto)}}" width="80px" class="img" alt="">
                        </td>
                        <td>{{ $row->nama_product }}</td>
                        <td>{{ $row->category->nama_category }}</td>
                        <td>
                          <button class="btn btn-warning edit" data-toggle="modal" data-target="#modal-edit" data-id="{{ $row->id_product }}">Edit</button>
                          <form action="{{url("admin/product/$row->id_product/delete")}}" method="POST" style="display: inline;">
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
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('admin/product')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="modal-body">
                        <div class="form-group">
                            <label for="island">Product</label>
                            <input type="text" class="form-control" id="product" name="nama_product" placeholder="Enter product">
                        </div>
                        <label for="island">Category</label>
                        <select class="form-control" name='id_category'>
                            @foreach (\App\Models\Category::all() as $category)
                              <option value="{{ $category->id_category }}">{{ $category->nama_category }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="" class="control-label">Foto</label>
                            <input type="file" class="form-control" name="foto">
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
                  <h4 class="modal-title">Edit Product</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{url('admin/product/edit')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <div class="modal-body">
                  <div class="form-group">
                      <label for="island">Product</label>
                      <input type="hidden" id="id_product_edit" name="id_product" value="">
                      <input type="text" class="form-control" id="nama_product_edit" name="nama_product" value="">
                  </div>
                  <label for="island">Island</label>
                  <select class="form-control" name='id_category' id="id_category_edit">
                        @foreach (\App\Models\Category::all() as $category)
                          <option value="{{ $category->id_category }}">{{ $category->nama_category }}</option>
                        @endforeach
                  </select>
                  <div class="form-group">
                      <label for="" class="control-label">Foto</label>
                      <input type="file" class="form-control" name="foto">
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit_edit" type="submit" class="btn btn-primary">Submit</button>
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

  $(".edit").on("click", function(){
    $.ajax({
        type: 'GET',
        url: '/admin/product/getProduct',
        data: {
            data: $(this).attr("data-id")
        },
        success: function (response) {
          $("#id_product_edit").val(response[0].id_product)
          $("#nama_product_edit").val(response[0].nama_product)
          $("#id_category_edit").val(response[0].id_category)
        },
        error: function (error) {
            console.log(error);
        }
    });
  })
</script>
@endpush
