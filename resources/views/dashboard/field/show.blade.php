<x-dashboard>
    @slot('content')
        <div class="row my-2">
            <div class="col">
                <a href="{{ route('admin.field.edit', ['field' => $field->id]) }}" class="btn btn-warning">Edit
                    Data</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group mb-2">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $field->title }}" class="form-control"
                                placeholder="Title" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group mb-2">
                            <label>Lokasi</label>
                            <input type="text" name="location" value="{{ $field->location }}" placeholder="Lokasi"
                                class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Harga</label>
                    <input type="text" name="price" placeholder="Harga" class="form-control" readonly
                        value="{{ $field->price }}" />
                </div>
                <div class="form-group mb-2">
                    <label>Contact Person</label>
                    <input type="text" name="contact_person" placeholder="Alamat" class="form-control" readonly
                        value="{{ $field->contact_person }}" />
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" readonly disabled
                        {{ $field->is_promo ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        Promo?
                    </label>
                </div>

            </div>
            <div class="col-lg-6 col-12">
                <img src="{{ $field->field_img ? Storage::url($field->field_img) : asset('assets/field-img.png') }}"
                    class="img-fluid rounded-4 w-100" alt="">
            </div>
        </div>
    @endslot
</x-dashboard>
