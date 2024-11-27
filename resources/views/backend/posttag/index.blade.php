@extends('backend.layouts.master')

@section('title', 'Yangilik teglari | Baraka Development')

@section('main-content')
<!-- DataTales Example -->
<div class="row g-3 mb-4">
  <div class="col-auto">
    <h2 class="mb-0">Yangilik teglari ro'yxati</h2>
  </div>
</div>
<div class="card shadow mb-4">
  <div class="row">
    <div class="col-md-12">
      @include('backend.layouts.notification')
    </div>
  </div>
  <div class="card-header py-3">
    <a href="{{ route('post-tag.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
      data-placement="bottom" title="Add Post Tag"><i class="fas fa-plus"></i> Qo'shish</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      @if(count($postTags) > 0)
      <table class="table table-bordered" id="post-tag-dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:200px;">Nomi</th>
            <th class="sort align-middle ps-4" scope="col" data-sort="status" style="width:150px;">Statusi</th>
            <th class="sort align-middle ps-4" scope="col" style="width:100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($postTags as $data)
          <tr>
            <td class="product align-middle ps-4">{{ $data->title }}</td>
            <td>
              @if($data->status == 'active')
              <span class="badge badge-phoenix fs-10 badge-phoenix-success">{{ $data->status }}</span>
              @else
              <span class="badge badge-warning">{{ $data->status }}</span>
              @endif
            </td>
            <td>
              <a href="{{ route('post-tag.edit', $data->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip"
                title="Tahrirlash"><i class="far fa-edit"></i></a>
              <form method="POST" action="{{ route('post-tag.destroy', [$data->id]) }}" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm dltBtn" data-id="{{ $data->id }}"
                  data-toggle="tooltip" title="O'chirish"><i class="far fa-trash-alt"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="pagination-wrapper" style="float:right;">
        {{ $postTags->links() }}
      </div>
      @else
      <h6 class="text-center">No Post Tag found!!! Please create post tag</h6>
      @endif
    </div>
  </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
@endpush

@push('scripts')
<!-- Page level plugins -->
<script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function () {
    $('#post-tag-dataTable').DataTable({
      "columnDefs": [
        {
          "orderable": false,
          "targets": [2] // Non-orderable column index for actions
        }
      ],
      "paging": true,  // Ensure pagination is enabled
      "searching": true // Ensure searching is enabled
    });

    // Sweet alert for delete
    $('.dltBtn').click(function (e) {
      e.preventDefault();
      var form = $(this).closest('form');
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
