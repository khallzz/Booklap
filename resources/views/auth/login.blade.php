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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-8">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

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
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required placeholder="Password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                        <p class="text-body-tertiary m-0">Lupa Password? <a class="btn btn-link p-0 m-0" href="{{ route('password.request') }}">{{ __('Klik Disini') }}</a></p>
                        @endif
                        <a class="btn btn-link p-0" href="{{ route('register') }}">{{ __('Register') }}</a>

                        <div class="row mb-0">
                            <div class="col-8">
                                <button type="submit" class="btn btn-primary w-100 text-white fw-bold">
                                    {{ __('Sign In') }}
                                </button>
                                <a href={{route('socialite', ['provider' => 'google'])}} class="btn btn-outline-primary w-100 text-primary text-white-hover fw-bold mt-3">
                                    <i class="bi bi-google"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <x-footer />
    @endslot
</x-app-layout>
