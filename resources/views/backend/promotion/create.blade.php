@extends('backend.layouts.master')
@section('title','Aksiya qo\'shish | Baraka Development')
@section('main-content')

<div class="card">
    <h5 class="card-header">Aksiya qo'shish</h5>
    <div class="card-body">
        <form method="post" action="{{route('promotion.store')}}">
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
                <label for="description" class="col-form-label">Tavsifi</label>
                <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="start_date" class="col-form-label">Boshlanish sanasi</label>
                <div class="col-3">
                <input type="date" class="form-control" id="start_date" name="start_date"
                    value="{{ old('start_date') }}"></div>
                @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="end_date" class="col-form-label">Tugash sanasi</label>
                <div class="col-3">
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}"></div>
                @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputPhoto" class="col-form-label">Rasmi <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Tanglang
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
                </div>
                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                @error('photo')
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
<br>

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

        $(document).ready(function () {
            $('#description').summernote({
                placeholder: "Aksiya tavsifini kiriting.....",
                tabsize: 2,
                height: 150
            });
        });


    </script>
@endpush