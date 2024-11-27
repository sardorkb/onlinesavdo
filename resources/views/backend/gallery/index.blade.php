@extends('backend.layouts.master')
@section('title', 'Galereya | Baraka Development')
@section('main-content')
<!-- DataTales Example -->
<div class="row g-3 mb-4">
    <div class="col-auto">
        <h2 class="mb-0">Galereya (Kompaniya haqida sahifasi uchun)</h2>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
            @include('backend.layouts.notification')
        </div>
    </div>
    <div class="card-header py-3">
        <a href="{{route('gallery.create')}}" class="btn btn-primary float-right" data-toggle="tooltip"
            data-placement="bottom" title="Add User"><i class="fas fa-plus"></i>Rasm qo'shish</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($galleries) > 0)
                <table class="table table-bordered" id="gallery-dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:200px;">Nomi</th>
                            <th class="sort align-middle ps-4" scope="col" data-sort="status" style="width:150px;">Statusi
                            </th>
                            <th class="sort align-middle ps-4" scope="col" style="width:150px;">Rasmi</th>
                            <th class="sort align-middle ps-4" scope="col" style="width:100px;">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $gallery)          
                            <tr>
                                <td class="product align-middle ps-4">{{$gallery->title}}</td>
                                <td class="product align-middle ps-4">
                                    @if($gallery->status === 'active')
                                        <div class="badge badge-phoenix fs-10 badge-phoenix-success">
                                            <span class="fw-bold">Aktiv</span>
                                            <span class="ms-1 fas fa-check"></span>
                                        </div>
                                    @else
                                        <div class="badge badge-phoenix fs-10 badge-phoenix-danger">
                                            <span class="fw-bold">Aktiv emas</span>
                                            <span class="ms-1 fas fa-times"></span>
                                        </div>
                                    @endif
                                </td>
                                <td class="align-middle white-space-nowrap py-0">
                                    <img src="{{ $gallery->photo }}" class="img-fluid zoom" style="max-width: 80px;"
                                        alt="{{ $gallery->photo }}">
                                </td>
                                <td>
                                    <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-primary btn-sm"
                                        data-toggle="tooltip" title="Tahrirlash"><i class="far fa-edit"></i></a>
                                    <form method="POST" action="{{ route('gallery.destroy', $gallery->id) }}" class="d-inline">
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
                {{-- Remove Laravel pagination --}}
                {{-- <span style="float:right">{{$galleries->links()}}</span> --}}
            @else
                <h6 class="text-center">Rasm topilmadi!!! Iltimos yangi rasm qo'shing.</h6>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }

        .zoom {
            transition: transform .2s;
            /* Animation */
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
            $('#gallery-dataTable').DataTable({
                "paging": true, // Enable DataTables pagination
                "columnDefs": [
                    {
                        "orderable": false,
                        "targets": [3] // Adjust column index for non-orderable Actions column
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