<x-app-layout class="">
    @slot('content')
    <div class="container guest-page min-h-75vh">
        <div class="py-5">
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('Email Verifikasi Berhasil Dikirim') }}
            </div>
            @endif
            <h1>Oops! Akun Kamu Belum Terverifikasi :(</h1>
            <p>Kamu tidak dapat melanjutkan proses karena akunmu belum terverifikasi</p>
            <form class="d-inline" action={{route('verification.resend')}} method="POST">
                @csrf
                <p>Cek inbox email untuk memverifikasi email atau klik
                    <button class="btn btn-link p-0 m-0 align-baseline" type="submit ">Disini</button>
                    untuk mengirim email verifikasi</p>
            </form>
        </div>
    </div>
    <x-footer />
    @endslot
</x-app-layout>
