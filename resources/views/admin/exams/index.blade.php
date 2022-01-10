@extends('admin.layout')

@section('main')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Exams</li>
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
                      <h3 class="card-title">All Exams</h3>

                      <div class="card-tools">
                        <a href="{{url('dashboard/exams/create')}}" class="btn btn-small btn-primary">Add New Exam <i class="fa fa-plus" style="font-size: 12px;"></i></a>
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
                                <th>Skill</th>
                                <th>Questions no.</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach ($exams as $exam)
                        <tbody id="exams-table">
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$exam->name('en')}}</td>
                                <td>{{$exam->name('ar')}}</td>
                                <td>
                                    <img src="{{asset("uploads/$exam->img")}}" height="50px">
                                </td>
                                <td>{{$exam->skill->name('en')}}</td>
                                <td>{{$exam->question_no}}</td>
                                <td>
                                    @if($exam->active)

                                    <span class="badge bg-success">yes</span>
                                    @else

                                    <span class="badge bg-danger">no</span>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{url("dashboard/exams/show/$exam->id")}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    <a href="{{url("dashboard/exams/show-questions/$exam->id")}}" class="btn btn-sm btn-success"><i class="fas fa-question"></i></a>
                                    <a href="{{url("dashboard/exams/edit/$exam->id")}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{url("dashboard/exams/delete/$exam->id")}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    <a href="{{url("dashboard/exams/toggle/$exam->id")}}" class="btn btn-sm btn-secondary"><i class="fas fa-toggle-on"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center my-3">

        {{$exams->links()}}

    </div>
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  {{--<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Exam</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @include('admin.inc.error')
            <form id="add-form" action="{{ url('dashboard/exams/store') }}" method="POST" enctype="multipart/form-data">
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
  </div>--}}


  {{--<div class="modal fade" id="edit-modal" aria-hidden="true" style="display: none;">
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
            <form id="edit-form" action="{{ url('dashboard/exams/update') }}" method="POST" enctype="multipart/form-data">
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
  </div>--}}
  <!-- /.modal -->

  <!-- Control Sidebar -->
@endsection



