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
        <div class="col-md-12">
<div class="card">
    <div class="card-header py-4 d-flex justify-content-between ">
    <div>
        <h5 class="mb-0 "><strong></strong><span></span><span class="text-primary">Order Details</span></h5></div>

    </div>
    @if(session('status'))
    <div class="alert alert-success" role="alert">{{session('status')}}</div>
    @endif
</div>

<div class="card shadow-lg">
<div class="row py-3 px-3">

    <div class="col-md-12">
        <table class="table table-striped table-bordered ">
            <thead>
                <th>S.n</th>
                <th>Order Id</th>
                <th>Order Date</th>
                <th>Client Name</th>
                <th>Total</th>
                <th>Phone</th>
                <th>Order Status</th>
                <th class="text-center">Action</th>

            </thead>
            <tbody>
                @foreach ($data['row'] as $datas )
                    <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$datas->id}}</td>
                            <td>{{$datas->created_at}}</td>
                            <td>{{$datas->first_name}}</td>
                            <td>{{$datas->total}}</td>
                            <td>{{$datas->phone}}</td>
                            <td>
                                @if($datas->status==0)
                                <span class="text-danger">Pending</span>
                                @elseif($datas->status==1)
                                <span class="text-success">Completed</span>
                                @endif


                            </td>
                            <td class="d-flex justify-content-around">
                            <a href="{{route('order.show',$datas->id)}}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{route('order.proceed',$datas->id)}}" class="btn btn-success btn-sm">Proceed</a>
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
