@extends('backend.layouts.master')

@section('title', 'Mahsulotlar | Baraka Development')

@section('main-content')
<!-- DataTales Example -->
<div class="row g-3 mb-4">
  <div class="col-auto">
    <h2 class="mb-0">Mahsulotlar ro'yxati</h2>
  </div>
</div>
<div class="card shadow mb-4">
  <div class="row">
    <div class="col-md-12">
      @include('backend.layouts.notification')
    </div>
  </div>
  <div class="card-header py-3">
    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
      data-placement="bottom" title="Add Product"><i class="fas fa-plus"></i> Qo'shish</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      @if(count($products) > 0)
      <table class="table table-bordered" id="product-dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:250px;">Nomi</th>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:150px;">Kategoriya</th>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:100px;">Aksiyadami?</th>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:200px;">Narxi</th>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:150px;">Brend</th>
        <th class="sort align-middle ps-4" scope="col" data-sort="title" style="width:100px;">Soni</th>
        <th class="sort align-middle ps-4" scope="col" style="width:150px;">Rasmi</th>
        <th class="sort align-middle ps-4" scope="col" data-sort="status" style="width:100px;">Statusi</th>
        <th class="sort align-middle ps-4" scope="col" style="width:100px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        @php
        $sub_cat_info = DB::table('categories')->select('title')->where('id', $product->child_cat_id)->get();
        $brands = DB::table('brands')->select('title')->where('id', $product->brand_id)->get();
      @endphp
        <tr>
        <td class="product align-middle ps-4">{{ $product->title }}</td>
        <td class="product align-middle ps-4">{{ $product->cat_info['title'] }} <br>
          <sub>
          {{ $product->sub_cat_info->title ?? '' }}
          </sub>
        </td>
        <td class="product align-middle ps-4">{{ $product->is_featured == 1 ? 'Ha' : 'Yo\'q' }}</td>
        <td class="product align-middle ps-4">{{ $product->price }} so'm</td>
        <td class="product align-middle ps-4">{{ ucfirst($product->brand->title) }}</td>
        <td class="product align-middle ps-4">
          @if($product->stock > 0)
        <span class="badge badge-primary">{{ $product->stock }}</span>
      @else
      <span class="badge badge-danger">{{ $product->stock }}</span>
    @endif
        </td>
        <td class="align-middle white-space-nowrap py-0">
          @if($product->photo)
        @php
        $photo = explode(',', $product->photo);
    @endphp
        <img src="{{ $photo[0] }}" class="img-fluid zoom" style="max-width:80px" alt="{{ $product->photo }}">
      @else
      <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="img-fluid" style="max-width:80px"
      alt="avatar.png">
    @endif
        </td>
        <td>
          @if($product->status == 'active')
        <span class="badge badge-phoenix fs-10 badge-phoenix-success">{{ $product->status }}</span>
      @else
      <span class="badge badge-warning">{{ $product->status }}</span>
    @endif
        </td>
        <td>
          <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip"
          title="Tahrirlash"><i class="far fa-edit"></i></a>
          <form method="POST" action="{{ route('product.destroy', [$product->id]) }}" class="d-inline">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger btn-sm dltBtn" data-id="{{ $product->id }}"
          data-toggle="tooltip" title="O'chirish"><i class="far fa-trash-alt"></i></button>
          </form>
        </td>
        </tr>
    @endforeach
      </tbody>
      </table>
    @else
      <h6 class="text-center">Mahsulot topilmadi!!!</h6>
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
    $('#product-dataTable').DataTable({
      "paging": true, // Ensure pagination is enabled
      "searching": true, // Ensure searching is enabled
      "pageLength": 10 // Set number of records per page
    });

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