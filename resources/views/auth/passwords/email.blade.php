<x-app-layout>
    @slot('content')
        <div class="container py-5 guest-page">
            <div class="row justify-content-center">
                <div class="col-4">
                    <img src="{{ asset('assets/login-img.png') }}" class="rounded-4 w-100 object-fit-cover" height="500px"
                        alt="">
                </div>
                <div class="col-5">
                    <h1 class="mb-4">Forgot Password?</h1>
                    <h4 class="text-body-tertiary mb-4 fw-bold">Masukan email yang terdaftar pada <span
                            class="text-primary">BookLap</span></h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-muted">Back To <a href="{{ route('login') }}" class="btn btn-link p-0">Login Page</a></p>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-8">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-8">
                                <button type="submit" class="btn btn-primary text-white w-100">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                        <p class="text-muted pt-3">Will be sent to your email.</p>
                    </form>
                </div>
            </div>
        </div>
        <x-footer />
    @endslot
</x-app-layout>
