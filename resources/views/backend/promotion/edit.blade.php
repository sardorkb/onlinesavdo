@extends('backend.layouts.master')
@section('title','Aksiyani tahrirlash | Baraka Development')
@section('main-content')

<div class="card">
    <h5 class="card-header">Aksiyani tahrirlash</h5>
    <div class="card-body">

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


</script>
@endpush