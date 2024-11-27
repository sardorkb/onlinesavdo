@extends('backend.layouts.master')
@section('title', 'Yangilik teg qo\'shish | Baraka Development')
@section('main-content')

<div class="card">
    <h5 class="card-header">Yangilik tegini qo'shish</h5>
    <div class="card-body">
      <form method="post" action="{{route('post-tag.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title</label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status</label>
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
