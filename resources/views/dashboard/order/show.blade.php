<x-dashboard>
    @slot('content')
        @if (!is_null($order->payment_receipt) && ($order->status != 'FINISHED' || $order->status != 'CANCELED'))
            @if ($order->status == 'CONFIRMED')
                <form action="{{ route('admin.order.finished', ['order' => $order->order_code]) }}" method="POST"
                    class="mb-3 h-100">
                    @csrf
                    <button type="submit" class="btn btn-success">Selesaikan Pesanan</button>
                </form>
            @elseif($order->status == 'UNPAID')
                <form action="{{ route('admin.order.confirm', ['order' => $order->order_code]) }}" method="POST"
                    class="mb-3 h-100">
                    @csrf
                    <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                </form>
            @endif
        @endif
        @if ($order->status != 'CANCELED' && $order->status != 'FINISHED')
            <form action="{{ route('admin.order.cancel', ['order' => $order->order_code]) }}" method="POST"
                class="mb-3 h-100">
                @csrf
                <button type="submit" class="btn btn-danger">Batalkan Pesanan</button>
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
                            value="{{ $order->user->phone_number }}" disabled>
                    </div>
                    <label>Harga</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="number" name="price" placeholder="Nama" class="form-control" disabled
                            value="{{ $order->amount }}">
                        @if ($order->is_promo)
                            <span class="input-group-text bg-primary text-white">PROMO</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label>Waktu Pesanan Dibuat</label>
                        <input type="datetime" name="price" class="form-control" required disabled
                            value="{{ $order->created_at }}">
                    </div>
                    <div class="form-group mb-3">
                        <h6>Status:
                            @switch($order->status)
                                @case('UNPAID')
                                    <span
                                        class="fw-bold badge {{ is_null($order->payment_receipt) ? 'bg-light text-black' : 'bg-warning' }}">{{ $order->payment_receipt == null ? 'Belum Bayar' : 'Sudah Bayar' }}</span>
                                @break

                                @case('CONFIRMED')
                                    <span class="badge bg-warning">Dikonfirmasi</span>
                                @break

                                @case('FINISHED')
                                    <span class="badge bg-success">Selesai</span>
                                @break

                                @case('CANCELED')
                                    <span class="badge bg-danger">Batal</span>
                                @break
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
        </form>
    @endslot
</x-dashboard>
