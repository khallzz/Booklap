<x-dashboard>
    @slot('content')
        <div class="container">

            <div class="row">
                <!-- Grooming Card -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <a href="{{ route('admin.field.index') }}">
                            <img src="{{ asset('assets/lapangan.png') }}" class="card-img-top mx-auto d-block" alt="Grooming">
                            <hr class="hr-view">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Fields</h5>
                            <p class="card-text">Lihat Data Lapangan</p>
                        </div>
                    </div>
                </div>

                <!-- Pet Hotel Card -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <a href="{{ route('admin.order.index') }}">
                            <img src="{{ asset('assets/ic-order.png') }}" class="card-img-top mx-auto d-block"
                                alt="Pet Hotel">
                            <hr class="hr-view">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Orders</h5>
                            <p class="card-text">Lihat Data Pemesanan Lapangan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <!-- Orders Card -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <a href="{{ route('admin.feedback.index') }}">
                            <img src="{{ asset('assets/ic-feedback.png') }}" class="card-img-top mx-auto d-block"
                                alt="Orders">
                            <hr class="hr-view">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Feedback</h5>
                            <p class="card-text">Lihat Semua Data Feedback</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endslot
</x-dashboard>
