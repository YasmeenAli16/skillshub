@extends('admin.layout')

@section('main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
                <div class="col-12">
                    @include('admin.inc.message')
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">All Categories</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-sm btn-outline btn-primary py-2 mb-2" data-toggle="modal" data-target="#modal-lg">
                            Add New Category <i class="fa fa-plus" style="font-size: 12px;"></i>
                          </button>
                      </div>
                    </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name (en)</th>
                      <th>Name (ar)</th>
                      <th>Active</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $category)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name('en') }}</td>
                        <td>{{ $category->name('ar') }}</td>
                        <td>
                            @if ($category->active)
                            <span class="badge bg-success">yes</span>
                            @else
                            <span class="badge bg-danger">no</span>
                            @endif
                        </td>
                        <td><a href="{{ url("dashboard/categories/delete/$category->id") }}" class="btn btn-sm btn-danger"><i style="font-size:18px" class="fa">&#xf014;</i></a>
                             <button type="button" class="btn btn-sm btn-info edit-btn" data-toggle="modal" data-target="#edit-modal" data-id="{{ $category->id }}" data-name-ar="{{ $category->name('ar') }}" data-name-en="{{ $category->name('en') }}"><i style="font-size:18px" class="fa fa-edit"></i></button>
                             <a href="{{ url("dashboard/categories/toggle/$category->id") }}" class="btn btn-sm btn-secondary"><i style="font-size:18px" class="fa fa-toggle-on"></i></a></td>
                        <td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
                <div class="d-flex my-3 justify-content-center">
                {{ $categories->links() }}
                </div>
              </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @include('admin.inc.error')
            <form id="add-form" action="{{ url('dashboard/categories/store') }}" method="POST">
                @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                <label>Name (en)</label>
                <input type="text" name="name_en" class="form-control">
              </div>


                    <div class="col-6">
              <div class="form-group">
                <label>Name (ar)</label>
                <input type="text" name="name_ar" class="form-control">
            </div>
        </div>
    </div>
</div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" form="add-form" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


  <div class="modal fade" id="edit-modal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @include('admin.inc.error')
            <form id="edit-form" action="{{ url('dashboard/categories/update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="edit-form-id">
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                <label>Name (en)</label>
                <input type="text" name="name_en" id="edit-form-en" class="form-control">
              </div>


                    <div class="col-6">
              <div class="form-group">
                <label>Name (ar)</label>
                <input type="text" name="name_ar" id="edit-form-ar" class="form-control">
            </div>
        </div>
            </div>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" form="edit-form" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Control Sidebar -->
@endsection

@section('script')
<script>
    $('.edit-btn').click(function(){
        let id = $(this).attr('data-id')
        let en = $(this).attr('data-name-en')
        let ar = $(this).attr('data-name-ar')
    //console.log(id, en, ar);
        $('#edit-form-id').val(id)
        $('#edit-form-en').val(en)
        $('#edit-form-ar').val(ar)
    })

</script>

@endsection
