<x-app-layout>
    @slot('content')
        <!-- Hero 1 - Bootstrap Brain Component -->
        <section class="py-5">
            <div class="container">
                <h3 class="fw-bold text-center">Get In Touch With Us</h3>
                <p class="text-muted text-center">For More Information About Our Product & Services. Please Feel Free To Drop
                    Us <br> An
                    Email. Our Staff Always Be There To Help You Out. Do Not Hesitate!</p>
                <div class="row justify-content-center pt-5">
                    <div class="col-4">
                        <div class="d-flex flex-row mb-4">
                            <i class="bi bi-geo-alt-fill me-3 fs-4"></i>
                            <div class="">
                                <p class="fw-bold m-0">Alamat</p>
                                <p>236 5th SE Avenue, New York NY10000, United States</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-4">
                            <i class="bi bi-telephone-fill me-3 fs-4"></i>
                            <div class="">
                                <p class="fw-bold m-0">Kontak</p>
                                <p>Mobile: +(84) 546-6789 <br>
                                    Hotline: +(84) 456-6789</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-4">
                            <i class="bi bi-clock-fill me-3 fs-4"></i>
                            <div class="">
                                <p class="fw-bold m-0">Hari Operasional</p>
                                <p>Monday-Friday: 9:00 - 22:00 <br>
                                    Saturday-Sunday: 9:00 - 21:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <form action={{ route('feedback.store') }} method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Your Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email Address</label>
                                <input class="form-control" type="email" id="email" name="email" required
                                    placeholder="example@domain.com">
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label fw-bold">Subject</label>
                                <input class="form-control" type="text" id="subject" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label fw-bold">Message</label>
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Pesan..." required></textarea>
                            </div>
                            <input type="submit" value="Submit" class="btn btn-primary text-white px-5">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <x-footer />
    @endslot
</x-app-layout>
