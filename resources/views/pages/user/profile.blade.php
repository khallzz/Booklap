<x-app-layout>
    @slot('content')
    <!-- Hero 1 - Bootstrap Brain Component -->
    <section class="min-vh-100 py-5">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card border-0 shadow">
                        <div class="card-body d-flex justify-content-between align-items-center gap-3">
                            <div class="text-center">
                                <img src="{{ $user->profile_image != null ? Storage::url($user->profile_image) : asset('assets/field-img.png') }}"
                                    class="rounded-circle object-fit-cover" alt="" width="100px" height="100px">
                                <form action="{{ route('profile.updateImage') }}" method="POST"
                                    enctype="multipart/form-data" id="form-image">
                                    @csrf
                                    <label class="pe-pointer" id="label-profile" for="profile_image">Change
                                        Picture</label>
                                    <input type="file" class="d-none" name="profile_image" id="profile_image"
                                        accept="image/jpg,image/jpeg,image/png">
                                </form>
                            </div>
                            <div class="" style="width: 60%">
                                <p class="fw-bold m-0">{{ $user->username }}</p>
                                <p class="m-0 text-body-tertiary">{{ $user->email }}</p>
                                <hr class="w-100 border-3 border-black my-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h5 class="card-title">Profile</h5>
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" name="username" class="form-control"
                                                value="{{ $user->username }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ $user->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" id="phone_number" name="phone_number"
                                                class="form-control" value="{{ $user->phone_number }}"
                                                placeholder="089756634...">
                                        </div>
                                        <input type="submit" class="btn btn-primary w-100 text-white" value="Update" />
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="fullname">Fullname</label>
                                            <input type="text" id="fullname" name="fullname" class="form-control"
                                                value="{{ $user->fullname }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="dob">Date of Birth</label>
                                            <input type="date" id="dob" name="dob" class="form-control"
                                                value="{{ $user->dob }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender" class="form-select">
                                                @if (!is_null($user->gender))
                                                <option value="{{ $user->gender }}">
                                                    {{ $user->gender == 'FEMALE' ? 'Perempuan' : 'Laki-laki' }}
                                                </option>
                                                @endif
                                                <option value="FEMALE">Perempuan</option>
                                                <option value="MALE">Laki-laki</option>
                                            </select>
                                        </div>
                                        <div class="my-auto">
                                            @if (Auth::user()->email_verified_at != null)
                                            <span class="badge bg-success py-2">Email Terverifikasi</span>
                                            @else
                                            <span class="badge bg-danger py-2">Email Belum Terverifikasi</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer />
    @endslot
    @push('script')
    <script>
        $(document).ready(() => {
            $('input[name=profile_image]').change(() => {
                $('#form-image').submit()
            })
        })
    </script>
    @endpush
</x-app-layout>
