<x-app-layout>
    @slot('content')
    <!-- Hero 1 - Bootstrap Brain Component -->
    <section class="promo-venue py-5 min-vh-100">
        <div class="container">
            <h1 class="">Order <span class="text-primary">Details</span></h1>
            <div class="row mt-4 text-body-tertiary">
                <div class="col-8">
                    <div class="row">
                        <h3 class="mb-4 col">Player Name</h3>
                        <h3 class="mb-4 col">{{ $order->user->username }}</h3>
                    </div>
                    <div class="row">
                        <h3 class="mb-4 col">Field</h3>
                        <h3 class="mb-4 col">{{ $order->field->title }}</h3>
                    </div>
                    <div class="row">
                        <h3 class="mb-4 col">Time</h3>
                        <h3 class="mb-4 col">{{ $order->start_time . ' - ' . $order->end_time }}</h3>
                    </div>
                    <div class="row">
                        <h3 class="mb-4 col">SubTotal</h3>
                        <h3 class="mb-4 col">{{ Number::currency($order->amount, 'IDR') }}</h3>
                    </div>
                    <div class="row">
                        <h3 class="mb-4 col">Status</h3>
                        <h3 class="mb-4 col">{{ ucwords($order->status) }}</h3>
                    </div>
                </div>

                <div class="col">
                    @if (is_null($order->payment_receipt))
                    <h5 class="fw-bold">Tata Cara Pembayaran</h5>
                    <hr class="bg-body-tertiary w-100 border-2">
                    <ul>
                        <li>Transfer sejumlah uang yang tertera pada pesanan ke rekening Bank <strong>{nama_bank}</strong> <strong>{no_rekening}</strong> A/n <strong>{nama}</strong></li>
                        <li>Screenshot dan upload bukti pembayaran pada form yang tersedia agar dapat dikonfirmasi oleh admin</li>
                    </ul>
                    <form action="{{ route('order.paymentReceipt', ['order' => $order->order_code]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h5 class="fw-bold">Upload Bukti Pembayaran</h5>
                        <hr class="bg-body-tertiary w-100 border-2">
                        <p class=""">Silahkan Upload Bukti Pembayaran, status pemesanan akan tetap " Unpaid" hingga
                            staff Admin kami mengonfirmasi bukti pembayaran Anda</p> <div class="mb-3">
                            <label for="upload_file" class="form-label">Upload Bukti Pembayaran</label>
                            <input type="file" class="form-control" id="upload_file" name="payment_receipt"
                                accept="image/jpg,image/jpeg,image/png" required
                                oninvalid="showAlert('error', 'error', 'Harus Upload File')">
                </div>
                <hr class="bg-body-tertiary w-100 border-2">
                <div class="d-flex gap-3 justify-content-end">
                    <button href="" class="btn btn-light border">Tutup</button>
                    <button href="" class="btn btn-primary text-white">Upload</butt>
                </div>
                </form>
                @else
                <h3>Bukti Pembayaran</h3>
                <img src="{{ Storage::url($order->payment_receipt) }}" class="img-fluid rounded-4" alt="">
                @if ($order->status == 'UNPAID')
                <form action="{{ route('order.paymentReceipt', ['order' => $order->order_code]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="upload_file" class="form-label">Upload Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="upload_file" name="payment_receipt"
                            accept="image/jpg,image/jpeg,image/png" required>
                    </div>
                    <button href="" class="btn btn-primary text-white">Ubah Bukti Pembayaran</butt>
                </form>
                @endif
                @endif
            </div>
        </div>
        </div>
    </section>
    <x-footer />
    @endslot

    @push('script')
    <script>

    </script>
    @endpush
</x-app-layout>
