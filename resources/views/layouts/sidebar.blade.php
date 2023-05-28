@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark noselect">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none"><span
                                class="fs-5 d-none d-sm-inline">Menu</span></a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link align-middle px-0">
                                <i class="bi bi-house-door-fill fs-4"></i>
                                <span class="ms-1 d-none d-sm-inline">{{ __('sidebar.home') }}</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link px-0 align-middle" href="#message-menu" data-bs-toggle="collapse"
                               role="button" aria-expanded="false" aria-controls="message-menu">
                                <i class="fs-4 bi bi-envelope-fill"></i>
                                <span class="ms-1 d-none d-sm-inline">Nachrichten</span>
                            </a>
                            <ul id="message-menu" class="nav flex-column ms-1 collapse ms-1 ms-md-3">
                                <li class="w-100">
                                    <a href="{{ route('showAllMessages') }}"
                                       class="nav-link px-0 bi bi-envelope-open-fill">
                                        <span class="d-none d-sm-inline">{{ __('sidebar.all-messages') }}</span>
                                    </a>
                                </li>
                                <li class="w-100">
                                    <a href="{{ route('createNewMessage') }}"
                                       class="nav-link px-0 bi bi-envelope-plus-fill">
                                        <span class="d-none d-sm-inline">{{ __('sidebar.new-message') }}</span>
                                    </a>
                                </li>
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0 bi bi-patch-question-fill">
                                        <span class="d-none d-sm-inline">{{ __('sidebar.all-badges') }}</span>
                                    </a>
                                </li>
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0 bi bi-patch-plus-fill">
                                        <span class="d-none d-sm-inline">{{ __('sidebar.new-badge') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-link px-0 align-middle" href="#submenu1" data-bs-toggle="collapse"
                               role="button" aria-expanded="false" aria-controls="submenu1">
                                <i class="fa fa-bar-chart fs-4"></i>
                                <span class="ms-1 d-none d-sm-inline">Highscores</span>
                            </a>
                            <ul id="submenu1" class="nav flex-column ms-1 collapse ms-1 ms-md-3">
                                <li class="w-100"><a href="#" class="nav-link px-0">
                                        <span class="d-none d-sm-inline">Item</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0 bi bi-database-fill-add">
                                        <span class="d-none d-sm-inline">Item</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi bi-alarm-fill"></i>
                                <span class="ms-1 d-none d-sm-inline">Timers</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="bi bi-badge-ad-fill fs-4"></i>
                                <span class="ms-1 d-none d-sm-inline">Ads</span>
                            </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0">
                                        <span class="d-none d-sm-inline">Product</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0">
                                        <span class="d-none d-sm-inline">Product</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0">
                                        <span class="d-none d-sm-inline">Product</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0">
                                        <span class="d-none d-sm-inline">Product</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li></li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                           id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">{{ __('login.logout') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-75">
                @yield('extra-content')
            </div>
        </div>
    </div>
@endsection
