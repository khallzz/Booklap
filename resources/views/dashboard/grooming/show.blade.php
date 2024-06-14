<x-dashboard>
    @slot('content')
        <div class="row my-2">
            <div class="col">
                <a href="{{ route('admin.order.show', ['order' => $grooming->order->id]) }}" class="btn btn-primary">Lihat
                    Order</a>
                <a href="{{ route('admin.grooming.edit', ['grooming' => $grooming->id]) }}"
                    class="btn btn-warning">Edit
                    Data</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="form-group mb-2">
                    @switch($grooming->order->confirmation)
                        @case('waiting')
                            <label>Status : <span class="badge bg-warning">Menunggu Konfirmasi</span></label>
                        @break

                        @case('confirm')
                            <label>Status : <span class="badge bg-success">Diterima</span></label>
                        @break

                        @default
                            <label class="mb-2">Status : <span class="badge bg-danger">Ditolak</span></label>
                            <input type="text" class="form-control" value="{{ $grooming->order->reject_message }}" readonly>
                    @endswitch
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group mb-2">
                            <label>Tanggal Grooming</label>
                            <input type="date" name="start_date" value="{{ $grooming->date }}" class="form-control"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group mb-2">
                            <label>Sesi</label>
                            <input type="time" name="end_date" value="{{ $grooming->session->format('H:i') }}"
                                class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Nama Pemilik</label>
                    <input type="text" name="owner" placeholder="Nama" class="form-control" readonly
                        value="{{ $grooming->owner }}" />
                </div>
                <div class="form-group mb-2">
                    <label>Alamat</label>
                    <input type="text" name="address" placeholder="Alamat" class="form-control" readonly
                        value="{{ $grooming->address }}" />
                </div>
                <div class="form-group mb-2">
                    <label>No.HP</label>
                    <input type="text" name="phone_number" placeholder="0821..." class="form-control" readonly
                        value="{{ $grooming->phone_number }}" />
                </div>

            </div>
            <div class="col-lg-6 col-12">
                <div class="form-group mb-2">
                    <label>Nama Kucing</label>
                    <input type="text" name="pet_name" placeholder="Nama Kucing Peliharaan" class="form-control" readonly
                        value="{{ $grooming->pet_name }}" />
                </div>
                <div class="form-group mb-2">
                    <label>Jenis Kelamin</label>
                    <input type="text" name="pet_age" placeholder="Usia Kucing" class="form-control" readonly
                        value="{{ $grooming->pet_gender }}" />
                </div>
                <div class="form-group mb-2">
                    <label>Sinyalement</label>
                    <input type="text" name="pet_food" placeholder="Merk Makanan" class="form-control" readonly
                        value="{{ $grooming->sinyalement }}" />
                </div>
                <div class="form-group mb-2">
                    <label>Catatan</label>
                    <input type="text" name="note" placeholder="Catatan" class="form-control" readonly
                        value="{{ $grooming->note }}" />
                </div>
            </div>
        </div>
    @endslot
</x-dashboard>
