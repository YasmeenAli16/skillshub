@extends('admin.layout')

@section('main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Skills</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Skills</li>
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
                      <h3 class="card-title">All Skills</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-sm btn-outline btn-primary py-2 mb-2" data-toggle="modal" data-target="#modal-lg">
                            Add New Skill <i class="fa fa-plus" style="font-size: 12px;"></i>
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
                      <th>Image</th>
                      <th>Category</th>
                      <th>Active</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($skills as $skill)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $skill->name('en') }}</td>
                        <td>{{ $skill->name('ar') }}</td>
                        <td><img src="{{ asset("uploads/$skill->img") }}" height="50px" alt=""></td>
                        <td>{{ $skill->category->name('en') }}</td>
                        <td>
                            @if ($skill->active)
                            <span class="badge bg-success">yes</span>
                            @else
                            <span class="badge bg-danger">no</span>
                            @endif
                        </td>
                        <td><a href="{{ url("dashboard/skills/delete/$skill->id") }}" class="btn btn-sm btn-danger"><i style="font-size:18px" class="fa">&#xf014;</i></a>
                             <button type="button" class="btn btn-sm btn-info edit-btn" data-toggle="modal" data-target="#edit-modal" data-id="{{ $skill->id }}" data-name-ar="{{ $skill->name('ar') }}" data-name-en="{{ $skill->name('en') }}" data-img="{{ $skill->img }}" data-category-id="{{ $skill->category_id }}"><i style="font-size:18px" class="fa fa-edit"></i></button>
                             <a href="{{ url("dashboard/skills/toggle/$skill->id") }}" class="btn btn-sm btn-secondary"><i style="font-size:18px" class="fa fa-toggle-on"></i></a></td>
                        <td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
                <div class="d-flex my-3 justify-content-center">
                {{ $skills->links() }}
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
          <h4 class="modal-title">Add New Skill</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @include('admin.inc.error')
            <form id="add-form" action="{{ url('dashboard/skills/store') }}" method="POST" enctype="multipart/form-data">
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
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Category</label>
                    <select class="custom-select form-control" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name('en') }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
    <div class="col-6">
        <div class="form-group">
            <label>Image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="img">
                    <label class="custom-file-label">Choose file</label>
              </div>
            </div>
          </div>
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
          <h4 class="modal-title">Edit skill</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @include('admin.inc.error')
            <form id="edit-form" action="{{ url('dashboard/skills/update') }}" method="POST" enctype="multipart/form-data">
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
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id" id="edit-form-cat-id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name('en') }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img">
                                <label class="custom-file-label">Choose file</label>
                          </div>
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
        let category = $(this).attr('data-category-id')
    //console.log(id, en, ar);
        $('#edit-form-id').val(id)
        $('#edit-form-en').val(en)
        $('#edit-form-ar').val(ar)
        $('#edit-form-cat-id').val(category)
    })

</script>

@endsection
