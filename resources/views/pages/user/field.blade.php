<x-app-layout>
    @slot('content')
        <!-- Hero 1 - Bootstrap Brain Component -->
        <section class="promo-venue py-5">
            <div class="container">
                @if (count($promo_fields) > 0)
                    <h2>Promo <span class="text-primary">Venue</span></h2>
                    @foreach ($promo_fields->chunk(4) as $items)
                        <div class="row">
                            @foreach ($items as $item)
                                <div class="col-3">
                                    <button data-bs-toggle="modal" data-bs-target="#promoField{{ $loop->iteration }}"
                                        class="border-0 p-0 position-relative">
                                        <span class="badge bg-primary position-absolute top-2 end-2">PROMO</span>
                                        <img src="{{ asset('assets/field-img.png') }}" class="img-fluid w-100"
                                            alt="">
                                    </button>
                                    <strong>{{ $item->title }}</strong>
                                    <p class="text-muted m-0">{{ $item->location }}</p>
                                    <p class="text-muted">Start From <span class="text-success">{{ $item->price }}</span>
                                    </p>
                                    <!-- Modal -->
                                    <div class="modal fade" id="promoField{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content rounded-4 px-4">
                                                <div class="modal-body">
                                                    <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">
                                                        Field
                                                        <span class="text-primary">Details</span>
                                                    </h1>
                                                    <hr class="border-primary border-2">
                                                    <p class="fw-bold m-0">{{ $item->title }}</p>
                                                    <p class="fw-bold m-0">{{ $item->price }} (2 Hours)</p>
                                                    <p class="fw-bold m-0">{{ $item->location }} </p>
                                                    <hr class="border-primary border-2">
                                                    <button type="button" class="btn text-body-tertiary fw-bold border-0"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <a href={{ route('book.schedule.index', ['field' => $item->slug]) }} class="btn btn-primary text-white fw-bold px-4">Book</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- END OF MODAL --}}
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endif
                <h2>Pilihan <span class="text-primary">Venue</span></h2>
                @foreach ($regular_fields->chunk(4) as $items)
                    <div class="row">
                        @foreach ($items as $item)
                            <div class="col-3">
                                <button data-bs-toggle="modal" data-bs-target="#regularField{{ $loop->iteration }}"
                                    class="border-0 p-0">
                                    <img src="{{ asset('assets/field-img.png') }}" class="img-fluid w-100" alt="">
                                </button>
                                <strong>{{ $item->title }}</strong>
                                <p class="text-muted m-0">{{ $item->location }}</p>
                                <p class="text-muted">Start From <span class="text-success">{{ $item->price }}</span></p>
                                <!-- Modal -->
                                <div class="modal fade" id="regularField{{ $loop->iteration }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content rounded-4 px-4">
                                            <div class="modal-body">
                                                <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">
                                                    Field
                                                    <span class="text-primary">Details</span>
                                                </h1>
                                                <hr class="border-primary border-2">
                                                <p class="fw-bold m-0">{{ $item->title }}</p>
                                                <p class="fw-bold m-0">{{ $item->price }} (2 Hours)</p>
                                                <p class="fw-bold m-0">{{ $item->location }} </p>
                                                <hr class="border-primary border-2">
                                                <button type="button" class="btn text-body-tertiary fw-bold border-0"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                    <a href={{ route('book.schedule.index', ['field' => $item->slug]) }} class="btn btn-primary text-white fw-bold px-4">Book</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- END OF MODAL --}}
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>
        <x-footer />
    @endslot
</x-app-layout>
