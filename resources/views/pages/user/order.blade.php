<x-app-layout>
    @slot('content')
        <!-- Hero 1 - Bootstrap Brain Component -->
        <section class="promo-venue py-5 min-vh-100">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-8">
                        <h1 class="fw-bolder mb-4">Booking <span class="text-primary">History</span></h1>
                        <a class="card rounded-5 border-2 shadow border-dark text-decoration-none mb-4" href="">
                            <div class="card-body">
                                <h3 class="card-title fw-bold">SERENA Mansion Field</h3>
                                <h5 class="text-body-tertiary">Booking #KJSDFJ</h5>
                                <h5 class="">08:00 - 10:00, 6 June 2024</h5>
                                <span class="badge fs-6 bg-success rounded-5 me-4">FINISHED</span> <span
                                    class="text-body-tertiary">Rp. 550.000</span>
                            </div>
                        </a>
                        <a class="card rounded-5 border-2 shadow border-dark text-decoration-none mb-4" href="">
                            <div class="card-body">
                                <h3 class="card-title fw-bold">SERENA Mansion Field</h3>
                                <h5 class="text-body-tertiary">Booking #KJSDFJ</h5>
                                <h5 class="">08:00 - 10:00, 6 June 2024</h5>
                                <span class="badge fs-6 bg-success rounded-5 me-4">FINISHED</span> <span
                                    class="text-body-tertiary">Rp. 550.000</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <x-footer />
    @endslot
</x-app-layout>
