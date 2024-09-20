@php
    $home = '';
    $order = '';
    $feedback = '';
    $field = '';
    if (Route::is('admin.feedback.*')) {
        $feedback = 'active';
    }
    if (Route::is('admin.dashboard.index')) {
        $home = 'active';
    }
    if (Route::is('admin.field.*')) {
        $field = 'active';
    }
    if (Route::is('admin.order.*')) {
        $order = 'active';
    }

@endphp

<div class="sidebar">
    <div class="d-flex justify-content-between">
        <a href="/" class="d-flex align-items-center mb-3 text-white text-decoration-none">
            <img src="{{ asset('assets/logo.png') }}" alt="orino-logo" style="width: 45px; height: auto;">
            <span class="fs-4 text-warning ms-3">BookLap</span>
        </a>
        <a href="javascript:void(0)" class="align-bottom text-decoration-none text-white fw-bold h3"
            onclick="closeNav()">x</a>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard.index') }}"
                class="nav-link d-flex align-items-center gap-2 text-white {{ $home }}" aria-current="page">
                <i class="bi bi-house-door-fill"></i>
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('admin.order.index') }}"
                class="nav-link d-flex align-items-center gap-2 mt-2 text-white {{ $order }}"
                aria-current="page">
                <i class="bi bi-ticket-perforated-fill"></i>
                Order
            </a>
        </li>
        <li>
            <a href="{{ route('admin.field.index') }}"
                class="nav-link d-flex align-items-center gap-2 mt-2 text-white {{ $field }}"
                aria-current="page">
                <i class="bi bi-dribbble"></i>
                Lapangan
            </a>
        </li>
        <li>
            <a href="{{ route('admin.feedback.index') }}"
                class="nav-link d-flex align-items-center gap-2 mt-2 text-white {{ $feedback }}"
                aria-current="page">
                <i class="bi bi-envelope-check-fill"></i>
                Feedback
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown position-absolute bottom-0 mb-3">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ Auth::user()->profile_image != null ? Storage::url(Auth::user()->profile_image) : asset('assets/field-img.png') }}" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>{{ Auth::user()->username }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
            <li>
                <form id="logout-form" class="" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" class="dropdown-item text-white" value="Logout" />
                </form>
            </li>
        </ul>
    </div>
</div>
