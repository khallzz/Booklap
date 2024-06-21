<x-app-layout>
    @slot('content')
        <!-- Hero 1 - Bootstrap Brain Component -->
        <section class="hero min-vh-100" style="background-image: url({{ asset('assets/bg-hero.png') }});">
            <div class="container text-center text-white h-100 my-auto d-flex flex-column align-items-center justify-content-center gap-5">
                <h1 class="hero-title">BOOKLAP</h1>
                <a href="{{ route('book') }}" class="btn btn-primary text-white fw-bolder py-4 px-5 fs-2 rounded-0">BOOK
                    NOW</a>
            </div>
        </section>
        <x-footer />
    @endslot
</x-app-layout>
