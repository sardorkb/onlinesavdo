@extends('backend.layouts.master')
@section('title', ' Kategoriyalar | Baraka Development')
@section('main-content')
<!-- DataTales Example -->
<div class="row g-3 mb-4">
    <div class="col-auto">
        <h2 class="mb-0">Kategoriyalar ro'yxati</h2>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
            @include('backend.layouts.notification')
        </div>
    </div>
    <div class="card-header py-3">
        <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
            data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Kategoriya qo'shish</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            @if (count($categories) > 0)
                <table class="table table-bordered" id="category-dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:150px;">Nomi</th>
                            <th class="sort align-middle ps-4" scope="col" data-sort="category" style="width:100px;">Kategoriya</th>
                            <th class="sort align-middle ps-4" scope="col" data-sort="child_category" style="width:100px;">Pastki kategoriya</th>
                            <th class="sort align-middle ps-4" scope="col" style="width:150px;">Rasmi</th>
                            <th class="sort align-middle ps-4" scope="col" data-sort="status" style="width:100px;">Statusi
                            </th>
                            <th class="sort align-middle ps-4" scope="col" style="width:100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="product align-middle ps-4">{{ $category->title }}</td>
                                <td class="sort align-middle ps-4">{{ $category->is_parent == 1 ? 'Ha' : 'Yo\'q' }}</td>
                                <td class="sort align-middle ps-4">
                                    {{ $category->parent_info->title ?? '' }}
                                </td>
                                <td class="align-middle white-space-nowrap py-0">
                                    @if ($category->photo)
                                    <img src="{{ $category->photo }}" class="img-fluid zoom" style="max-width: 80px;" alt="{{ $category->photo }}">
                                   
                                    @else
                                        <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid"
                                            style="max-width:80px" alt="avatar.png">
                                    @endif
                                </td>
                                <td>
                                    @if ($category->status == 'active')
                                        <span class="badge badge-phoenix fs-10 badge-phoenix-success">{{ $category->status }}</span>
                                    @else
                                        <span class="badge badge-phoenix fs-10 badge-phoenix-danger">{{ $category->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip"
                                    title="Tahrirlash"><i class="far fa-edit"></i></a>
                                    <form method="POST" action="{{ route('category.destroy', [$category->id]) }}" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="O'chirish"><i
                                    class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Remove the custom pagination --}}
                {{-- <span style="float:right">{{ $categories->links() }}</span> --}}
            @else
                <h6 class="text-center">Kategoriyalar topilmadi!!! Iltimos yangi kategoriya qo'shing</h6>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
    .zoom {
    transition: transform .2s;
    }

    .zoom:hover {
    transform: scale(3.2);
    }
  </style>
@endpush

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#category-dataTable').DataTable({
                "paging": true, // Enable DataTables pagination
                "columnDefs": [{
                    "orderable": false,
                    "targets": [5] // Adjusted column index for non-orderable Actions column
                }]
            });

            // Sweet alert
            $('.dltBtn').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                e.preventDefault();
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
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
