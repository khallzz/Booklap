<x-app-layout>
    @slot('content')
        <!-- Hero 1 - Bootstrap Brain Component -->
        <section class="schedule py-5">
            <div class="container d-flex flex-column justify-content-center align-items-center">
                <h2>Pilih Lapangan :</h2>
                <select name="field" id="" class="form-control w-50 text-center my-3 border-dark border-3">
                    <option value="">Pilih Lapangan</option>
                    @foreach ($fields as $item)
                        <option value="{{ $item->slug }}" data-phone-field="{{ $item->contact_person }}">{{ $item->title }}
                        </option>
                    @endforeach
                </select>
                <div class="w-50" id="calendar"></div>
                <div class="my-3 text-center w-25">
                    <label for="tanggalInput">Tanggal Pemesanan:</label>
                    <input type="text" readonly class="form-control w-100 border-3 border-black text-center"
                        id="tanggalInput">
                </div>
                <div class="sesi mt-3 d-lg-block w-100">
                    <h4 class="fw-bold">Jadwal Tersedia</h4>
                    <div class="row my-3">
                        <div class="col d-flex flex-lg-row flex-column justify-content-evenly gap-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sesi" id="08:00-10:00"
                                    start-time="08:00" end-time="10:00" value="08:00-10:00">
                                <label class="" for="08:00-10:00">08:00-10:00</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sesi" id="10:00-12:00"
                                    start-time="10:00" end-time="12:00" value="10:00-12:00">
                                <label class="" for="10:00-12:00">10:00-12:00</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sesi" id="12:00-14:00"
                                    start-time="12:00" end-time="14:00" value="12:00-14:00">
                                <label class="" for="12:00-14:00">12:00-14:00</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sesi" id="14:00-16:00"
                                    start-time="14:00" end-time="16:00" value="14:00-16:00">
                                <label class="" for="14:00-16:00">14:00-16:00</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sesi" id="16:00-18:00"
                                    start-time="16:00" end-time="18:00" value="16:00-18:00">
                                <label class="" for="16:00-18:00">16:00-18:00</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-primary text-white text-center w-25 py-2" id="btnBook"
                            data-bs-toggle="modal" data-bs-target="#resumeModal">Book Now</button>
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
                        <p class=" m-0">{{ Auth::user()->username }}</p>
                        <p class=" m-0">{{ Auth::user()->phone_number ?? 'Nomor Telepon Belum diset' }}</p>
                        <div class="d-flex justify-content-between mt-4">
                            <p class="m-0" id="fieldText"></p>
                            <p class="fw-bold m-0" id="fieldContact"></p>
                        </div>
                        <hr class="border-primary border-2">
                        <p class="text-center"><i class="bi bi-calendar-week text-primary me-3"></i><span
                                id="tanggalText"></span> | <span id="sesiText"></span></p>
                        <hr class="border-primary border-2">
                        <button type="button" class="btn text-body-tertiary fw-bold border-0"
                            data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary text-white fw-bold px-4" id="btnBookCommit">Book</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- END OF MODAL --}}

        <!-- Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-4 px-4">
                    <div class="modal-body">
                        <h1 class="modal-title fs-5 text-center fw-bold" id="exampleModalLabel">
                            Field
                            <span class="text-primary">Details</span>
                        </h1>
                        <hr class="border-primary border-2">
                        <div class="d-flex justify-content-center align-items-center my-3">
                            <img src={{ asset('assets/ic-succedd.svg') }} alt="">
                        </div>
                        <hr class="border-primary border-2">
                        <p class="text-center text-primary fw-thin">Congratulations! your order almost complete</p>
                        {{-- <p class="fw-bold m-0">{{ $item->location }} </p> --}}
                        <hr class="border-primary border-2">
                        <p class="text-center" id="scheduleResult"></p>
                        <hr class="border-primary border-2">
                        <a href="" class="btn btn-primary text-white fw-bold px-4" id="btnToOrderDetail">Continue
                            Payment</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- END OF MODAL --}}

        <form class="d-none" action="">
            <input type="date" id="tanggal">
            <input type="text" id="jadwal">
            <input type="text" id="lapangan">
        </form>
    @endslot
    @push('script')
        <script>
            $(document).ready(function() {
                $('input[type=radio][name=sesi]').change(function() {
                    time = this.value
                    $('input[name=session]').val(time)
                    $('#sesiText').html(time)
                })
                const field = new URLSearchParams(window.location.search).get('field') ?? '';
                $(`select[name=field]`).val(field).change()
                $(`#fieldContact`).html($('select[name=field] option:selected').attr('data-phone-field'))
                $(`#fieldText`).html($('select[name=field] option:selected').html())

                var payloadOrder = {
                    field: field,
                    phone_field: $('select[name=field] option:selected').attr('data-phone-field') ?? '',
                    tanggal: '',
                    start_time: '',
                    end_time: ''
                }

                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable: true,
                    // hiddenDays: [5], // hide Mondays, Wednesdays, and Fridays
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                    },
                    dateClick: function(info) {
                        payloadOrder.tanggal = info.dateStr
                        console.log(payloadOrder)
                        var url = `{{ route('order.checkSchedule', ['field' => ':field:']) }}`
                        url = url.replace(':field:', payloadOrder.field)
                        $('#tanggalInput').val(info.dateStr)
                        $('#tanggalText').html(info.dateStr)
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                ...payloadOrder,
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(res) {
                                console.log(res)
                                $(`input[name=sesi][type=radio]`).prop("checked", false);
                                $(`.form-check label`).removeClass("disable");
                                $(`input[name=sesi]`).prop("disabled", false);
                                $('input[name=sesi]').each((i, obj) => {
                                    res.orders.forEach((e) => {
                                        if ($(obj).prop('disabled')) {
                                            return;
                                        }
                                        const format = 'HH:mm:ss'
                                        const start_time = moment(e.start_time,
                                            format)
                                        const end_time = moment(e.end_time,
                                            format)
                                        const input_start = moment($(obj).attr(
                                            'start-time'), format)
                                        const input_end = moment($(obj).attr(
                                            'end-time'), format)
                                        if (input_start.isBetween(start_time,
                                                end_time, null, '[)') ||
                                            input_end.isBetween(start_time,
                                                end_time, null, '(]') || (start_time
                                                .isSame(input_start) && end_time
                                                .isSame(input_end))
                                        ) {
                                            $(obj).siblings('label').addClass(
                                                'disable');
                                            $(obj).prop("disabled", true);
                                        }
                                    })
                                })
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
                $('select[name=field]').change(() => {
                    const item = $(this).find("option:selected")
                    payloadOrder.field = item.val()
                    payloadOrder.phone_field = item.attr('data-phone-field') ?? ''
                    console.log(payloadOrder)
                })
                $('input[name=sesi]').change(function() {
                    payloadOrder.start_time = $(this).attr('start-time')
                    payloadOrder.end_time = $(this).attr('end-time')
                    console.log(payloadOrder)
                })
                $('#btnBookCommit').click(() => {
                    $.ajax({
                        url: "{{ route('order.store') }}",
                        type: 'POST',
                        data: {
                            ...payloadOrder,
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(res) {
                            console.log(res)
                            $('#resumeModal').modal('hide')
                            $('#confirmModal').modal('show')
                            $('#scheduleResult').html(
                                `<i class="bi bi-calendar-week text-primary me-3"></i> ${payloadOrder.tanggal} | ${payloadOrder.start_time} - ${payloadOrder.end_time}`
                            )
                            $('#btnToOrderDetail').attr('href', res.url)
                        }
                    })
                })
                $('#btnBook'.click((e) => {
                    e.preventDefault()
                    if(payloadOrder.field = '') {
                        showAlert('error', 'Input Laparangan Diperlukan', 'Input lapangan tidak boleh kosong')
                    }
                    if(payloadOrder.start_time = '') {
                        showAlert('error', 'Input Jadwal Diperlukan', 'Input jadwal tidak boleh kosong')
                    }
                    if(payloadOrder.tanggal = '') {
                        showAlert('error', 'Input Tanggal Diperlukan', 'Input tanggal pemesanaan tidak boleh kosong')
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
