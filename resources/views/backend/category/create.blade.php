@extends('backend.layouts.master')
@section('title', ' Kategoriya qo\'shish | Baraka Development')
@section('main-content')
<div class="card">
  <h5 class="card-header">Kategoriya qo'shish</h5>
  <div class="card-body">
    <form method="post" action="{{route('category.store')}}">
      {{csrf_field()}}
      <div class="form-group">
        <label for="inputTitle" class="col-form-label">Nomi <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="title" placeholder="Nomi" value="{{old('title')}}"
          class="form-control">
        @error('title')
      <span class="text-danger">{{$message}}</span>
    @enderror
      </div>

      <div class="form-group">
        <label for="summary" class="col-form-label">Izoh</label>
        <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
        @error('summary')
      <span class="text-danger">{{$message}}</span>
    @enderror
      </div>

      <div class="form-group">
        <label for="is_parent">1-daraja kategoriyami?</label><br>
        <input type="checkbox" name='is_parent' id='is_parent' value='1' checked> Ha
      </div>
      {{-- {{$parent_cats}} --}}

      <div class="form-group d-none" id='parent_cat_div'>
        <label for="parent_id">1-daraja kategoriya</label>
        <select name="parent_id" class="form-control">
          <option value="">--1-daraja kategoriya tanlang--</option>
          @foreach($parent_cats as $key => $parent_cat)
        <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
      @endforeach
        </select>
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
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>

        @error('photo')
      <span class="text-danger">{{$message}}</span>
    @enderror
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
        <button type="reset" class="btn btn-warning">Qaytadan kiritish</button>
        <button class="btn btn-success" type="submit">Qo'shish</button>
      </div>
    </form>
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
    $('#summary').summernote({
      placeholder: "Qisqacha izoh yozing.....",
      tabsize: 2,
      height: 120
    });
    });
  </script>

  <script>
    $('#is_parent').change(function () {
    var is_checked = $('#is_parent').prop('checked');
    // alert(is_checked);
    if (is_checked) {
      $('#parent_cat_div').addClass('d-none');
      $('#parent_cat_div').val('');
    }
    else {
      $('#parent_cat_div').removeClass('d-none');
    }
    })
  </script>
@endpush