<x-app-layout>
    @slot('content')
        <section class="promo-venue py-5">
            <div class="container">
                @if (count($promo_fields) > 0)
                    <h2>Promo <span class="text-primary">Venue</span></h2>
                    @foreach ($promo_fields->chunk(4) as $items)
                        <div class="row">
                            @foreach ($items as $item)
                                <x-field-card :item="$item" :loop="$loop" />
                            @endforeach
                        </div>
                    @endforeach
                @endif
                <h2>Pilihan <span class="text-primary">Venue</span></h2>
                @if (count($regular_fields) == 0)
                    <div class="card border-0 shadow text-center">
                        <div class="card-body">
                            <h5 class="card-title">Tidak ada pilihan Venue</h5>
                        </div>
                    </div>
                @endif
                @foreach ($regular_fields->chunk(4) as $items)
                    <div class="row">
                        @foreach ($items as $item)
                            <x-field-card :item="$item" :loop="$loop" />
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>
        <x-footer />
    @endslot
</x-app-layout>
