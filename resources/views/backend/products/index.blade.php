@extends('backend.layouts.master',['page'=>'List'])
@section('title',$panel)

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
              @include('backend.includes.flash_message')
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list"></i>&nbsp; List <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                  </svg> <span class="text-primary">{{$panel}}</span></h3>
                  <a href="{{route($base_route.'create')}}" class="btn btn-success float-right"><i class="fas fa-pencil-alt"></i> Create</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Category</th>
                  <th>Subcategory</th>
                  <th>Name</th>
                  <th>Code</th>
                  <th>Price </th>
                  <th>Status</th>
                  <th>Created Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data['rows'] as $row )
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$row->categoryId->name}}</td>
                  <td>{{$row->subcategoryId->name}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->code}}</td>
                  <td>{{$row->price}}</td>
                  <td>
                      <input type="checkbox" {{$row->status=='1'? 'checked' : ''}}>
                  </td>
                  {{--  <td>{{$row->created_at->format("Y-m-d H:i:s")}} ({{$row->created_at->diffForHumans()}})</td>  --}}
                  <td>{{$row->created_at->diffForHumans()}}</td>
                  <td class="d-flex justify-cntent-around">
                      <a href="{{route($base_route.'show', ['id'=>$row->id])}}" class="btn btn-primary btn-sm mr-1">
                      <i class="fas fa-folder"></i>&nbsp;View</a>
                      <a href="{{route($base_route.'edit',['id'=>$row->id])}}" class="btn btn-info btn-sm mr-1">
                        <i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>
                        <form action="{{route($base_route.'destroy',['id'=>$row->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm mr-1 delete-confirm">
                            <i class="fas fa-trash"></i>&nbsp;Delete</button>
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
</div>

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function () {
    $("#dataTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<script>
    $('.delete-confirm').click(function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
               $(this).closest("form").submit();
            }
          })
    });


</script>
@endsection
@endsection
