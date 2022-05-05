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
                  <th>Name</th>
                  <th>Slug </th>
                  <th>Image</th>
                  <th>Rank </th>
                  <th>Status</th>
                  <th>Created Date</th>
                  <th>Created By</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data['rows'] as $row )
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->slug}}</td>
                  <td class="text-center">
                      @if($row->image)
                          <img src="{{asset($img_path.$row->image)}}" width="60"></td>
                          @else
                          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="blue" class="bi bi-camera-video-off" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.961 12.365a1.99 1.99 0 0 0 .522-1.103l3.11 1.382A1 1 0 0 0 16 11.731V4.269a1 1 0 0 0-1.406-.913l-3.111 1.382A2 2 0 0 0 9.5 3H4.272l.714 1H9.5a1 1 0 0 1 1 1v6a1 1 0 0 1-.144.518l.605.847zM1.428 4.18A.999.999 0 0 0 1 5v6a1 1 0 0 0 1 1h5.014l.714 1H2a2 2 0 0 1-2-2V5c0-.675.334-1.272.847-1.634l.58.814zM15 11.73l-3.5-1.555v-4.35L15 4.269v7.462zm-4.407 3.56-10-14 .814-.58 10 14-.814.58z"/>
                          </svg>
                      @endif

                  <td>{{$row->rank}}</td>
                  <td>
                      <input type="checkbox" {{$row->status=='1'? 'checked' : ''}}>
                  </td>
                  <td>{{$row->created_at->format("Y-m-d H:i:s")}} ({{$row->created_at->diffForHumans()}})</td>
                  <td>{{$row->createdBy->name}}</td>
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
