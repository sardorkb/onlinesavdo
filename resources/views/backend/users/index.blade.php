@extends('backend.layouts.master')
@section('title', 'Foydalanuvchilar | Baraka Development')
@section('main-content')
<!-- DataTales Example -->
<div class="row g-3 mb-4">
  <div class="col-auto">
    <h2 class="mb-0">Foydalanuvchilar ro'yxati</h2>
  </div>
</div>
<div class="card shadow mb-4">
  <div class="row">
    <div class="col-md-12">
      @include('backend.layouts.notification')
    </div>
  </div>
  <div class="card-header py-3">
    <a href="{{route('users.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
      data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Foydalanuvchi qo'shish</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="user-dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="sort align-middle ps-4" scope="col" data-sort="name" style="width:200px;">F.I.Sh.</th>
            <th class="sort align-middle ps-4" scope="col" data-sort="email" style="width:200px;">elektron pochta</th>
            <th class="sort align-middle ps-4" scope="col" style="width:150px;">Rasmi</th>
            <th class="sort align-middle ps-4" scope="col" data-sort="created_at" style="width:200px;">Ro'yxatdan o'tgan
              sanasi</th>
            <th class="sort align-middle ps-4" scope="col" data-sort="role" style="width:200px;">Roli</th>
            <th class="sort align-middle ps-4" scope="col" data-sort="status" style="width:150px;">Status</th>
            <th class="sort align-middle ps-4" scope="col" style="width:100px;">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)          
        <tr>
        <td class="product align-middle ps-4">{{$user->name}}</td>
        <td class="product align-middle ps-4">{{$user->email}}</td>
        <td class="align-middle white-space-nowrap py-0">
          @if($user->photo)
        <img src="{{$user->photo}}" class="img-fluid rounded-circle" style="max-width:50px"
        alt="{{$user->photo}}">
      @else
      <img src="{{asset('backend/img/avatar.png')}}" class="img-fluid rounded-circle" style="max-width:50px"
      alt="avatar.png">
    @endif
        </td>
        <td class="product align-middle ps-4">{{(($user->created_at) ? $user->created_at->diffForHumans() : '')}}
        </td>
        <td class="product align-middle ps-4">{{$user->role}}</td>
        <td>
          @if($user->status == 'active')
        <span class="badge badge-phoenix fs-10 badge-phoenix-success">{{$user->status}}</span>
      @else
      <span class="badge badge-warning">{{$user->status}}</span>
    @endif
        </td>
        <td>
          <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip"
          title="Tahrirlash"><i class="far fa-edit"></i></a>
          <form method="POST" action="{{route('users.destroy', [$user->id])}}" class="d-inline">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm dltBtn" data-toggle="tooltip" data-id="{{$user->id}}"
            title="O'chirish"><i class="far fa-trash-alt"></i></button>
          </form>
        </td>
        </tr>
      @endforeach
        </tbody>
      </table>
      <div class="pagination-wrapper" style="float:right;">
        {{$users->links()}}
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
    /* Removed pagination hiding CSS */
  </style>
@endpush

@push('scripts')
  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>
    $(document).ready(function () {
    $('#user-dataTable').DataTable({
      "paging": true, // Ensure pagination is enabled
      "searching": true, // Ensure searching is enabled
      "pageLength": 10, // Number of records per page
      "columnDefs": [
      {
        "orderable": false,
        "targets": [6] // Columns that are not sortable
      }
      ]
    });

    // Sweet alert
    $('.dltBtn').click(function (e) {
      var form = $(this).closest('form');
      var dataID = $(this).data('id');
      e.preventDefault();
      swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
        form.submit();
        } else {
        swal("Your data is safe!");
        }
      });
    });
    });
  </script>
@endpush