<!DOCTYPE html>
<html lang="en">

@include('backend.layouts.head')

<body>
    <main class="main" id="top">

        @include('backend.layouts.sidebar')

        @include('backend.layouts.header')

        <div class="content">

            @yield('main-content')

            @include('backend.layouts.footer')

        </div>

    </main>
</body>
</html>
