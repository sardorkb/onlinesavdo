@extends('backend.layouts.master')
@section('title', 'Bo\'sh ish o\'rinlari | Baraka Development')
@section('main-content')
<!-- DataTales Example -->
<div class="row g-3 mb-4">
    <div class="col-auto">
        <h2 class="mb-0">Bo'sh ish o'rinlar ro'yxati</h2>
    </div>
</div>
<div class="card shadow mb-4">

    <div class="row">
        <div class="col-md-12">
            @include('backend.layouts.notification')
        </div>
    </div>
    <div class="card-header py-3">
        <a href="{{ route('job.create') }}" class="btn btn-primary float-right" data-toggle="tooltip"
            data-placement="bottom" title="Add Job"><i class="fas fa-plus"></i> Bo'sh ish o'rin qo'shish</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($jobs) > 0)
                <table class="table table-bordered" id="job-dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:150px;">Nomi</th>
                            <th class="sort align-middle ps-4" scope="col" data-sort="requirements" style="width:200px;">
                                Talablar</th>
                            <th class="sort align-middle ps-4" scope="col" data-sort="close_date" style="width:150px;">Qabul
                                tugash muddati</th>
                            <th class="sort align-middle ps-4" scope="col" style="width:100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)               
                            <tr>
                                <td class="product align-middle ps-4">{{ $job->title }}</td>
                                <td class="product align-middle ps-4">{!! $job->requirements !!}</td>
                                <td class="product align-middle ps-4">{{ $job->close_date }}</td>
                                <td>
                                    <a href="{{ route('job.edit', $job->id) }}" class="btn btn-primary btn-sm"
                                        data-toggle="tooltip" title="Tahrirlash"><i class="far fa-edit"></i></a>
                                    <form method="POST" action="{{ route('job.destroy', $job->id) }}" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                            title="O'chirish"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Pagination --}}
                <span style="float:right">{{ $jobs->links() }}</span>
            @else
                <h6 class="text-center">Vakansiya topilmadi!!! Iltimos yangi vakansiya qo'shing.</h6>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: block; /* Ensure pagination is visible */
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
            $('#job-dataTable').DataTable({
                "paging": true, // Ensure pagination is enabled
                "columnDefs": [
                    {
                        "orderable": false,
                        "targets": [3] // Make Actions column non-orderable
                    }
                ]
            });

            // Sweet alert for delete confirmation
            $('form').on('submit', function (e) {
                e.preventDefault();
                var form = $(this);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.off('submit').submit(); // Proceed with form submission
                    } else {
                        swal("Your data is safe!");
                    }
                });
            });
        });
    </script>
@endpush
