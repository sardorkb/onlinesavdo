@extends('backend.layouts.master')
@section('title', 'Brendni tahrirlash | Baraka Development')
@section('main-content')

<div class="card">
    <h5 class="card-header">Vakansiyani tahrirlash</h5>
    <div class="card-body">
        <form method="post" action="{{route('job.update', $job->id)}})}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="inputTitle" class="col-form-label">Nomi <span class="text-danger">*</span></label>
                <input id="inputTitle" type="text" name="title" value="{{$job->title}}" class="form-control">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="col-form-label">Ish haqida</label>
                <textarea class="form-control" id="description" name="description">{{$job->description}}</textarea>
                @error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="requirements" class="col-form-label">Talablar</label>
                <textarea class="form-control" id="requirements" name="requirements">{{$job->requirements}}</textarea>
                @error('requirements')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="conditions" class="col-form-label">Shartlar</label>
                <textarea class="form-control" id="conditions" name="conditions">{{$job->conditions}}</textarea>
                @error('conditions')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="skills" class="col-form-label">Mahoratlar/Ko'nikmalar/Skills</label>
                <textarea class="form-control" id="skills" name="skills">{{$job->skills}}</textarea>
                @error('skills')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="location" class="col-form-label">Manzil</label>
                <textarea class="form-control" id="location" name="location"
                    placeholder="Ish joyi manzilini kiriting (qo'qon, Farg'ona, Toskent)">{{$job->location}}</textarea>
                @error('location')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone_number" class="col-form-label">Telefon raqam</label>
                <div class="col-3">
                    <input id="phone_number" type="text" name="phone_number" placeholder="+998 xx xxx xx xx"
                        value="{{$job->phone_number}}" class="form-control">
                </div>
                @error('phone_number')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="close_date" class="col-form-label">Yakunlanish sana</label>
                <div class="col-3">
                    <input type="date" class="form-control" id="close_date" name="close_date"
                        value="{{$job->close_date}}">
                </div>
                @error('close_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <button class="btn btn-success" type="submit">Yangilash</button>
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
        $(document).ready(function () {
            $('#description').summernote({
                placeholder: "",
                tabsize: 2,
                height: 120
            });
            $('#requirements').summernote({
                placeholder: "",
                tabsize: 2,
                height: 120
            });
            $('#conditions').summernote({
                placeholder: "",
                tabsize: 2,
                height: 120
            });
            $('#skills').summernote({
                placeholder: "",
                tabsize: 2,
                height: 120
            });
        });
    </script>
@endpush