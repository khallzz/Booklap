<x-app-layout>
    @slot('content')
        <!-- Hero 1 - Bootstrap Brain Component -->
        <section class="schedule py-5">
                <div class="container d-flex flex-column justify-content-center align-items-center">
                    <h2>Pilih Lapangan :</h2>
                    <select name="field" id="" class="form-control w-50 text-center my-3 border-dark border-3">
                        <option value="">Pilih Lapangan</option>
                        @foreach ($fields as $item)
                            <option value="{{ $item->slug }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                    <div class="w-50" id="calendar"></div>
                    <div class="sesi mt-3 d-lg-block w-100">
                        <h4 class="fw-bold">Jadwal Tersedia</h4>
                        <div class="row my-3">
                            <div class="col d-flex flex-lg-row flex-column justify-content-evenly gap-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sesi" id="08:00-10:00"
                                        value="08:00-10:00">
                                    <label class="" for="08:00-10:00">08:00-10:00</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sesi" id="10:00-12:00"
                                        value="10:00-12:00">
                                    <label class="" for="10:00-12:00">10:00-12:00</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sesi" id="12:00-14:00"
                                        value="12:00-14:00">
                                    <label class="" for="12:00-14:00">12:00-14:00</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sesi" id="14:00-16:00"
                                        value="14:00-16:00">
                                    <label class="" for="14:00-16:00">14:00-16:00</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sesi" id="16:00-18:00"
                                        value="16:00-18:00">
                                    <label class="" for="16:00-18:00">16:00-18:00</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-primary text-white text-center w-25 py-2" data-bs-toggle="modal" data-bs-target="#resumeModal">Book Now</button>
                        </div>
                    </div>
                </div>
        </section>
        <x-footer />
        <!-- Modal -->
        <div class="modal fade" id="resumeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-4 px-4">
                    <div class="modal-body">
                        <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">
                            Field
                            <span class="text-primary">Details</span>
                        </h1>
                        <hr class="border-primary border-2">
                        <p class="fw-bold m-0">{{ Auth::user()->username }}</p>
                        <p class="fw-bold m-0">{{ Auth::user()->phone_number }}</p>
                        {{-- <p class="fw-bold m-0">{{ $item->location }} </p> --}}
                        <hr class="border-primary border-2">
                        <button type="button" class="btn text-body-tertiary fw-bold border-0"
                            data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary text-white fw-bold px-4">Book</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- END OF MODAL --}}

    @endslot
    @push('script')
        <script>
            $(document).ready(function() {
                $('input[type=radio][name=sesi]').change(function() {
                    time = this.value
                    $('input[name=session]').val(time)
                })
                const field = new URLSearchParams(window.location.search).get('field') ?? '';
                $(`select[name=field]`).val(field).change()
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable: true,
                    // hiddenDays: [5], // hide Mondays, Wednesdays, and Fridays
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                    },
                    dateClick: function(info) {
                        $('input[name=date]').val(info.dateStr)
                        $.ajax({
                            url: "{{ route('home') }}",
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                date: info.dateStr,
                            },
                            success: function(res) {
                                if (res.session.length == 0) {
                                    $(`.form-check label`).removeClass("disable");
                                    $(`input[name=sesi]`).prop("disabled", false);
                                }
                                res.session.forEach(element => {
                                    $(`label[for="${element.session}"]`).addClass(
                                        'disable');
                                    $(`input[value="${element.session}"]`).prop(
                                        "disabled", true);
                                });
                            }
                        })
                    },
                    selectAllow: function(selectInfo) {
                        //  create a day
                        var oneDay = 24 * 60 * 60 * 1000;
                        var startDay = selectInfo.start;
                        //  FullCalendar always gives next next day of select end day, so do minus one day
                        var endDay = selectInfo.end - oneDay;
                        var count = Math.round(Math.abs((startDay - endDay) / oneDay));
                        //  starts at 0, so add to start at 1
                        var dayCount = (count + 1);
                        if (dayCount < 2) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    validRange: {
                        start: new Date,
                    }
                });
                calendar.render();
            })
        </script>
    @endpush
</x-app-layout>
