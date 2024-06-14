<x-dashboard>
    @slot('content')
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.order.show', ['order' => $pethotel->order->id]) }}" class="btn btn-primary">Lihat
                    Order</a>
                <a href="{{ route('admin.pethotel.edit', ['pethotel' => $pethotel->id]) }}" class="btn btn-warning">Edit
                    Data</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="row">
                    <div class="col-lg-6 col">
                        <div class="form-group">
                            <label>Tanggal Mulai Pemesanan</label>
                            <input type="date" name="start_date" value="{{ $pethotel->start_date }}" class="form-control"
                                readonly>
                        </div>
                    </div>
                    <div class="col-lg-6 col">
                        <div class="form-group">
                            <label>Tanggal Akhir Pemesanan</label>
                            <input type="date" name="end_date" value="{{ $pethotel->end_date }}" class="form-control"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input type="text" name="owner" placeholder="Nama" class="form-control"
                        value="{{ $pethotel->owner }}" readonly />
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="address" placeholder="Alamat" class="form-control"
                        value="{{ $pethotel->address }}" readonly />
                </div>
                <div class="form-group">
                    <label>No.HP</label>
                    <input type="text" name="phone_number" placeholder="0821..." class="form-control"
                        value="{{ $pethotel->phone_number }}" readonly />
                </div>

                <div class="form-group">
                    <label>Nama Kucing</label>
                    <input type="text" name="pet_name" placeholder="Nama Kucing Peliharaan" class="form-control"
                        value="{{ $pethotel->pet_name }}" readonly />
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <label>Jenis Kelamin</label>
                    <input type="text" name="pet_age" placeholder="Usia Kucing" class="form-control"
                        value="{{ $pethotel->pet_gender }}" readonly />
                </div>
                <div class="form-group">
                    <label>Usia</label>
                    <input type="text" name="pet_age" placeholder="Usia Kucing" class="form-control"
                        value="{{ $pethotel->pet_age }}" readonly />
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label>Merk Pakan</label>
                    <input type="text" name="pet_food" placeholder="Merk Makanan" class="form-control"
                        value="{{ $pethotel->pet_food }}" readonly />
                </div>
                <div class="form-group">
                    <label>Catatan</label>
                    <input type="text" name="note" placeholder="Catatan" class="form-control"
                        value="{{ $pethotel->note }}" readonly />
                </div>

                <div class="form-group">
                    <label>Sertifikat Vaksin</label>
                    @if ($pethotel->vaccine != null)
                        <img src="{{ Storage::url($pethotel->vaccine) }}" alt="" class="img-fluid">
                    @else
                        <h5 class="badge bg-danger">Tidak Ada Data</h5>
                    @endif
                </div>
                <div class="form-group">
                    <label>File Medical Check Up H-1</label>
                    @if ($pethotel->medcheck != null)
                        <img src="{{ Storage::url($pethotel->medcheck) }}" alt="" class="img-fluid">
                    @else
                        <h5 class="badge bg-danger">Tidak Ada Data</h5>
                    @endif
                </div>
            </div>
        </div>
    @endslot
</x-dashboard>
