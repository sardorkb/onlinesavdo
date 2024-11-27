@extends('backend.layouts.master')
@section('title', 'Yangilik qo\'shish | Baraka Development')
@section('main-content')

<div class="card">
  <h5 class="card-header">Yangilik qo'shish</h5>
  <div class="card-body">
      <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Sarlavha <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="quote" class="col-form-label">Sitata</label>
          <textarea class="form-control" id="quote" name="quote">{{old('quote')}}</textarea>
          @error('quote')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Qisqa matn <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Matn</label>
          <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="post_cat_id">Kategoriya <span class="text-danger">*</span></label>
          <select name="post_cat_id" class="form-control">
              <option value="">--Kategoriya tanlang--</option>
              @foreach($categories as $key=>$data)
                  <option value='{{$data->id}}'>{{$data->title}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="tags">Teg</label>
          <select name="tags[]" multiple data-live-search="true" class="form-control selectpicker">
              <option value="">--Tegni tanlang--</option>
              @foreach($tags as $key=>$data)
                  <option value='{{$data->title}}'>{{$data->title}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="added_by">Avtor</label>
          <select name="added_by" class="form-control">
              <option value="">--Select any one--</option>
              @foreach($users as $key=>$data)
                <option value='{{$data->id}}' {{($key==0) ? 'selected' : ''}}>{{$data->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Media Type <span class="text-danger">*</span></label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mediaType" id="mediaPhoto" value="photo" checked>
            <label class="form-check-label" for="mediaPhoto">
              Rasm yuklash
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mediaType" id="mediaYouTube" value="youtube">
            <label class="form-check-label" for="mediaYouTube">
              YouTube havolasi
            </label>
          </div>
        </div>

        <div class="form-group" id="photoUpload">
          <label for="inputPhoto" class="col-form-label">Rasm <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Tanlang
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group" id="youtubeLink" style="display: none;">
          <label for="youtube" class="col-form-label">YouTube havolasi <span class="text-danger">*</span></label>
          <input id="youtube" type="url" name="youtube_link" placeholder="YouTube havolasini kiriting" value="{{old('youtube_link')}}" class="form-control">
          @error('youtube_link')
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
          <button type="reset" class="btn btn-warning">Qayta kiritish</button>
          <button class="btn btn-success" type="submit">Qo'shish</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
        tabsize: 2,
        height: 100
      });
    });

    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
        tabsize: 2,
        height: 150
      });
    });

    $(document).ready(function() {
      $('#quote').summernote({
        placeholder: "Write detail Quote.....",
        tabsize: 2,
        height: 100
      });
    });

    $(document).ready(function() {
      $('input[name="mediaType"]').change(function() {
        if ($(this).val() == 'photo') {
          $('#photoUpload').show();
          $('#youtubeLink').hide();
        } else {
          $('#photoUpload').hide();
          $('#youtubeLink').show();
        }
      });
    });
</script>
@endpush
