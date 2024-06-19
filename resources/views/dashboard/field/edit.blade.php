<x-dashboard>
    @slot('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <form action="{{ route('admin.field.update', ['field' => $field]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $field->title }}" class="form-control"
                                        placeholder="Title">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group mb-2">
                                    <label>Lokasi</label>
                                    <input type="text" name="location" value="{{ $field->location }}"
                                        placeholder="Lokasi" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label>Harga</label>
                            <input type="text" name="price" placeholder="Harga" class="form-control"
                                value="{{ $field->price }}" />
                        </div>
                        <div class="form-group mb-2">
                            <label>Contact Person</label>
                            <input type="text" name="contact_person" placeholder="089643423..." class="form-control"
                                value="{{ $field->contact_person }}" />
                        </div>
                        <div class="form-group mb-2">
                            <label>Ubah Foto</label>
                            <input type="file" name="field_image" class="form-control" accept="image/jpeg,jpg,png"/>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="is_promo"
                                {{ $field->is_promo ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">
                                Promo?
                            </label>
                        </div>
                        <input type="submit" value="Ubah Data" class="btn btn-primary w-100 text-white mt-3">
                    </form>
                </div>
                <div class="col-lg-6 col-12">
                    <img src="{{ $field->field_img ? Storage::url($field->field_img) : asset('assets/field-img.png') }}"
                        class="img-fluid rounded-4 w-100" alt="">
                </div>
            </div>
        </div>
    @endslot
</x-dashboard>
