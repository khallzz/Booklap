<x-app-layout>
    @slot('content')
        <!-- Hero 1 - Bootstrap Brain Component -->
        <section class="py-5 min-vh-100">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-8">
                        <h1 class="fw-bolder mb-4">Booking <span class="text-primary">History</span></h1>
                        @foreach ($orders as $order)
                            @php
                                $bg_badge = '';
                                switch ($order->status) {
                                    case 'UNPAID':
                                        $bg_badge = 'bg-dark';
                                        break;
                                    case 'CONFIRMED':
                                        $bg_badge = 'bg-primary';
                                        break;
                                    case 'FINISHED':
                                        $bg_badge = 'bg-success';
                                        break;
                                    case 'CANCELED':
                                        $bg_badge = 'bg-danger';
                                        break;
                                }
                            @endphp
                            <a class="card order rounded-5 border-2 shadow border-dark text-decoration-none mb-4" href="{{ route('order.show', ['order' => $order->order_code]) }}">
                                <div class="card-body">
                                    <h3 class="card-title fw-bold">{{ $order->field->title }}</h3>
                                    <h5 class="text-body-tertiary">Booking #{{ $order->order_code }}</h5>
                                    <h5 class="">{{ $order->start_time }} - {{ $order->end_time }}, {{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}</h5>
                                    <span class="badge fs-6 rounded-5 me-4 {{ $bg_badge }}">{{ $order->status }}</span>
                                    <span class="text-body-tertiary">{{ Number::currency($order->amount, 'IDR') }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <x-footer />
    @endslot
</x-app-layout>
