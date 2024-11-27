@extends('frontend.layouts.master')
@section('title', 'Kirish | Baraka Development')
@section('main-content')
<section id="contact-us">
    <div class="container">
        <div class="col-auto">
            <nav class="mb-2" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kirish</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="login-container">
        <h2>Kirish</h2>
        <p>Saytga kirish uchun elektron pochtangiz va parolingizni kiriting</p>
        <form class="form" method="post" action="{{route('login.submit')}}">
            @csrf
            <div class="form-group">
                <label>Elektron pochta<span>*</span></label>
                <input type="email" name="email" placeholder="" required="required" value="{{old('email')}}">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Parol<span>*</span></label>
                <input type="password" name="password" placeholder="" required="required" value="{{old('password')}}">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <div class="login-btn">
                    <button class="btn" type="submit">Kirish</button>
                    <a href="{{route('register.form')}}" class="btn">Ro'yxatdan o'tish</a>
                </div>
            </div>
            <div class="checkbox">
                <label class="checkbox-inline"><input name="news" type="checkbox"> Meni eslab qoling</label>
            </div>
            @if (Route::has('password.request'))
                <a class="lost-pass" href="{{ route('password.reset') }}">Parolni unutdingizmi?</a>
            @endif
        </form>
    </div>
</section>

@endsection
@push('styles')
    <style>
        .login-container {
            margin: 50px auto;
            max-width: 600px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #003366;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            color: #666;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            color: #003366;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group span.text-danger {
            color: red;
            font-size: 12px;
        }

        .login-btn {
            justify-content: space-between;
            margin-right: 5px;
            align-items: center;
            margin-bottom: 15px;
        }

        .login-btn .btn {
            padding: 10px 20px;
            background-color: #00297D;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .login-btn .btn:hover {
            background-color: #4980f1;
        }
        .checkbox {
            margin-bottom: 15px;
        }

        .lost-pass {
            display: block;
            text-align: center;
            color: #003366;
            text-decoration: none;
            margin-top: 10px;
        }

        .lost-pass:hover {
            text-decoration: underline;
        }
    </style>
@endpush