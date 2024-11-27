@extends('backend.layouts.master')
@section('title', 'Aksiyalar | Baraka Development')

@section('main-content')
<!-- DataTales Example -->
<div class="row g-3 mb-4">
    <div class="col-auto">
        <h2 class="mb-0">Aksiyalar ro'yxati</h2>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
            @include('backend.layouts.notification')
        </div>
    </div>
    <div class="card-header py-3">
        <a href="{{ route('promotion.create') }}" class="btn btn-primary float-right" data-toggle="tooltip"
            data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Aksiya qo'shish</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            @if(count($promotions) > 0)
            <table class="table table-sm fs-9 mb-0" id="promotion-dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:200px;">Nomi</th>
                        <th class="sort align-middle ps-4" scope="col" style="width:150px;">Rasm</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:200px;">Boshlanish sana</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:200px;">Tugash sana</th>
                        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:200px;">Tugashiga qolgan kun</th>
                        <th class="sort align-middle ps-4" scope="col" style="width:100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promotions as $promotion)
                    <tr>
                        <td class="promotion align-middle ps-4">{{ $promotion->title }}</td>
                        <td class="align-middle white-space-nowrap py-0">
                            @if($promotion->photo)
                            <img src="{{ $promotion->photo }}" class="img-fluid zoom" style="max-width:80px" alt="{{ $promotion->photo }}">
                            @else
                            <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                            @endif
                        </td>
                        <td class="promotion align-middle ps-4">{{ $promotion->start_date }}</td>
                        <td class="promotion align-middle ps-4">{{ $promotion->end_date }}</td>
                        <td class="promotion align-middle ps-4">{{ $promotion->days_left }} kun</td>
                        <td>
                            <a href="{{ route('promotion.edit', $promotion->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Tahrirlash"><i class="far fa-edit"></i></a>
                            <form method="POST" action="{{ route('promotion.destroy', $promotion->id) }}" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm dltBtn" data-toggle="tooltip" title="O'chirish"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <span style="float:right">{{ $promotions->links() }}</span>
            @else
            <h6 class="text-center">Aksiya topilmadi!!! Iltimos yangi aksiya qo'shing.</h6>
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
        transform: scale(5);
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
    $(document).ready(function () {
        $('#promotion-dataTable').DataTable({
            "paging": true, // Enable pagination
            "searching": true, // Enable searching
            "pageLength": 10, // Set number of records per page
            "columnDefs": [
                {
                    "orderable": false,
                    "targets": [4, 5]
                }
            ]
        });

        // Sweet alert for delete
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
