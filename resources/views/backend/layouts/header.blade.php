<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">

            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
                aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="{{ route('admin') }}">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center"><img src="{{asset('back/img/logos/navbarlogolight.png') }}"
                            width="200" />
                    </div>
                </div>
            </a>
            
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row">
          <li class="nav-item">
            <a href="{{route('storage.link')}}"  class="btn btn-outline-warning btn-sm mr-3">
              Storage Link
          </a>
          <a href="{{route('cache.clear')}}"  class="btn btn-outline-danger btn-sm mr-3">
            Keshni tozalash
          </a>
          </li>
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                    <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="moon"></span></label>
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                            data-feather="sun"></span></label>
                </div>
            </li>
            <li class="nav-item dropdown">
              @include('backend.notification.show')
            </li>
            <li class="nav-item dropdown">
              @include('backend.message.message')
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!"
                    role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="avatar avatar-l ">
                        @if (Auth()->user()->photo)
                            <img class="rounded-circle " src="{{ Auth()->user()->photo }}" alt="" />
                        @else
                            <img class="img-profile rounded-circle" src="{{ asset('backend/img/avatar.png') }}">
                        @endif
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">
                                    @if (Auth()->user()->photo)
                                        <img class="rounded-circle " src="{{ Auth()->user()->photo }}"
                                            alt="" />
                                    @else
                                        <img class="img-profile rounded-circle"
                                            src="{{ asset('/backend/img/avatar.png') }}">
                                    @endif
                                </div>
                                <h6 class="mt-2 text-body-emphasis">{{ Auth()->user()->name }}</h6>
                            </div>
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 12rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3" href="{{route('admin-profile')}}"> <span
                                            class="me-2 text-body" data-feather="user"></span><span>Profil</span></a>
                                </li>
                                <li class="nav-item"><a class="nav-link px-3" href="{{route('change.password.form')}}"><span
                                            class="me-2 text-body" data-feather="pie-chart"></span>Parolni o'zgartirish</a></li>
                                <li class="nav-item"><a class="nav-link px-3" href="{{route('settings')}}"> <span
                                            class="me-2 text-body" data-feather="settings"></span>Sozlamalar</a></li>
                            </ul>
                            <hr />
                            <div class="px-3"> 
                              <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                                <span class="me-2" data-feather="log-out"> </span>Chiqish
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
