@extends('backend.layouts.master')
@section('title', 'Brend qo\'shish | Baraka Development')
@section('main-content')

<div class="card">
  <h5 class="card-header">Brend qo'shish</h5>
  <div class="card-body">
    <form method="post" action="{{route('brand.store')}}">
      {{csrf_field()}}
      <div class="form-group">
        <label for="inputTitle" class="col-form-label">Nomi <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="title" placeholder="Nomini kiriting" value="{{old('title')}}"
          class="form-control">
        @error('title')
      <span class="text-danger">{{$message}}</span>
    @enderror
      </div>
      <div class="form-group">
        <label for="inputPhoto" class="col-form-label">Rasm</label>
        <div class="input-group">
          <span class="input-group-btn" style="color: white">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="far fa-file-image"></i> Tanlang
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
        </div>
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active">Aktiv</option>
            <option value="inactive">Aktiv emas</option>
          </select>
          @error('status')
        <span class="text-danger">{{$message}}</span>
      @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Qayta kiritish</button>
          <button class="btn btn-success" type="submit">Qo'shish</button>
        </div>
    </form>
  </div>
</div>
</div>

@endsection

@push('styles')
  <link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
  <script>
    $('#lfm').filemanager('image');

    $(document).ready(function () {
    $('#description').summernote({
      placeholder: "Write short description.....",
      tabsize: 2,
      height: 150
    });
    });
  </script>
@endpush