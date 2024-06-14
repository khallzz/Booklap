<x-dashboard>
    @slot('content')
        @if (!$order->is_paid)
            <form action="{{ route('admin.order.confirm', ['order' => $order->id]) }}" method="POST" class="mb-3 h-100">
                @csrf
                <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
            </form>
        @endif
        <form action="">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group mb-3">
                        <label>Order ID</label>
                        <input type="text" name="owner" placeholder="Nama" class="form-control"
                            value="{{ $order->id }}" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Nama" class="form-control"
                            value="{{ $order->user->email }}" disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nomor Telp.</label>
                        <input type="text" name="phone_number" placeholder="Nama" class="form-control"
                            value="{{ $order->service->phone_number }}" disabled>
                    </div>
                    <label>Harga</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="number" name="price" placeholder="Nama" class="form-control" disabled
                            value="{{ $order->price }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Waktu Pesanan Dibuat</label>
                        <input type="datetime" name="price" class="form-control" required disabled
                            value="{{ $order->created_at }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>Jenis Layanan</label>
                        <input type="text" name="price" class="form-control" required disabled
                            value="{{ $order->service->product->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <h6>Status:
                            @switch($order->confirmation)
                                @case('confirm')
                                    <span
                                        class="fw-bold badge {{ $order->is_paid ? 'bg-success' : 'bg-danger' }}">{{ $order->is_paid ? 'Paid' : 'Unpaid' }}</span>
                                    <span
                                        class="fw-bold badge {{ $order->payment_receipt != null ? 'bg-success' : 'bg-danger' }}">{{ $order->payment_receipt == null ? 'Belum Bayar' : 'Sudah Bayar' }}</span>
                                @break

                                @case('waiting')
                                    <span class="badge bg-warning">Menunggu Konfirmasi</span>
                                @break

                                @default
                                    <span class="badge bg-danger">Ditolak</span>
                            @endswitch
                        </h6>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <h5>Bukti Pembayaran</h5>
                    @if ($order->payment_receipt)
                        <img id="gambar" src="{{ Storage::url($order->payment_receipt) }}" alt=""
                            class="img-fluid">
                    @else
                        <h5 class="badge bg-danger">Belum Ada Bukti Pembayaran</h5>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @if ($order->service_type == 'App\Models\Grooming')
                        <a class="btn btn-primary"
                            href="{{ route('admin.grooming.show', ['grooming' => $order->service_id]) }}">Lihat Detail
                            Pemesanan Grooming</a>
                    @else
                        <a class="btn btn-primary"
                            href="{{ route('admin.pethotel.show', ['pethotel' => $order->service_id]) }}">Lihat Detail
                            Pemesanan Pethotel</a>
                    @endif
                </div>
            </div>
        </form>
    @endslot
</x-dashboard>
