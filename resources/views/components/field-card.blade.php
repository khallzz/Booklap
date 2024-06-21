<div class="col-3">
    {{-- {{ $loop }} --}}
    <div class="d-flex align-items-center justify-content-center mb-3">
        <button data-bs-toggle="modal" data-bs-target="#regularField{{ $loop->iteration }}"
            class="p-0 border border-primary border-3 rounded-3 field-img"
            style="background-image: url({{ $item->field_img ? Storage::url($item->field_img) : asset('assets/field-img.png') }})">
        </button>
    </div>
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
                    <a href={{ route('book.schedule.index', ['field' => $item->slug]) }}
                        class="btn btn-primary text-white fw-bold px-4">Book</a>
                </div>
            </div>
        </div>
    </div>
    {{-- END OF MODAL --}}
</div>
