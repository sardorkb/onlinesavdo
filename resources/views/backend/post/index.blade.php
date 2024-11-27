@extends('backend.layouts.master')

@section('title', 'Yangiliklar | Baraka Development')

@section('main-content')
<div class="row g-3 mb-4">
  <div class="col-auto">
    <h2 class="mb-0">Yangiliklar ro'yxati</h2>
  </div>
</div>
<div class="card shadow mb-4">
  <div class="row">
    <div class="col-md-12">
      @include('backend.layouts.notification')
    </div>
  </div>
  <div class="card-header py-3">
    <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
      data-placement="bottom" title="Add Post"><i class="fas fa-plus"></i> Yangilik qo'shish</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      @if(count($posts) > 0)
      <table class="table table-bordered" id="post-dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:200px;">Nomi</th>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:100px;">Kategoriya</th>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:100px;">Teg</th>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:150px;">Avtor</th>
        <th class="sort align-middle ps-4" scope="col" style="width:150px;">Rasmi</th>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:100px;">Statusi</th>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:100px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        @php 
        $author_info = DB::table('users')->select('name')->where('id', $post->added_by)->first();
      @endphp
        <tr>
        <td class="product align-middle ps-4">{{ $post->title }}</td>
        <td class="product align-middle ps-4">{{ $post->cat_info->title }}</td>
        <td class="product align-middle ps-4">{{ $post->tags }}</td>
        <td class="product align-middle ps-4">{{ $author_info ? $author_info->name : 'N/A' }}</td>
        <td class="align-middle white-space-nowrap py-0">
          @if($post->photo)
        <img src="{{ $post->photo }}" class="img-fluid zoom" style="max-width: 80px;" alt="{{ $post->photo }}">
      @else
      <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid" style="max-width: 80px;"
      alt="thumbnail-default.jpg">
    @endif
        </td>
        <td>
          @if($post->status == 'active')
        <span class="badge badge-phoenix fs-10 badge-phoenix-success">{{$post->status}}</span>
      @else
      <span class="badge badge-warning">{{$post->status}}</span>
    @endif
        </td>
        <td>
          <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip"
          title="Tahrirlash"><i class="far fa-edit"></i></a>
          <form method="POST" action="{{ route('post.destroy', $post->id) }}" class="d-inline">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm dltBtn" data-id="{{ $post->id }}"
          data-toggle="tooltip" title="O'chirish"><i class="far fa-trash-alt"></i></button>
          </form>
        </td>
        </tr>
    @endforeach
      </tbody>
      </table>
      <div class="pagination-wrapper" style="float:right;">
      {{ $posts->links() }}
      </div>
    @else
      <h6 class="text-center">No posts found!!! Please create Post</h6>
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
    display: block;
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
    $('#post-dataTable').DataTable({
      "columnDefs": [
      {
        "orderable": false,
        "targets": [6] // Adjust column index for non-orderable Action column
      }
      ],
      "paging": true,  // Ensure pagination is enabled
      "searching": true // Ensure searching is enabled
    });

    // Sweet alert
    $('.dltBtn').click(function (e) {
      var form = $(this).closest('form');
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