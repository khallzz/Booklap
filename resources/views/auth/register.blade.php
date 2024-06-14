<x-app-layout>
    @slot('content')
        <div class="container py-5 guest-page">
            <div class="row justify-content-center">
                <div class="col-4">
                    <img src="{{ asset('assets/login-img.png') }}" class="rounded-4 w-100 object-fit-cover" height="500px"
                        alt="">
                </div>
                <div class="col-5">
                    <h1 class="mb-5">Selamat Datang di <span class="text-primary fw-bold">BookLap</span></h1>
                    <h4 class="text-body-tertiary mb-4 fw-bold">Mulai petualangan baru kamu dengan <br> menggunakan <span
                            class="text-primary">BookLap!</span></h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-8">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Name">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-8">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-8">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password"
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-8">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-8">
                                <button type="submit" class="btn btn-primary w-100 text-white">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <x-footer />
    @endslot
</x-app-layout>
