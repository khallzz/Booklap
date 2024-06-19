<x-dashboard>
    @slot('content')
        <div class="container">
            <h1 class="text-center pd-4">List Lapangan</h1>
            <hr>

            <form action="{{ route('admin.field.index') }}" method="get">
                <div class="row pb-3">
                    <div class="col-lg-3 col-12 pt-4">
                        <a href="{{ route('admin.field.create') }}" class="btn btn-success">Tambah Data Lapangan</a>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-dark w-100">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Lokasi</th>
                            <th>Harga</th>
                            <th>Contact Person</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($fields) == 0)
                            <tr>
                                <td colspan="6" class="text-center">Tidak Ada Data Yang Ditampilkan</td>
                            </tr>
                        @endif
                        @foreach ($fields as $field)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $field->title }}</td>
                                <td>{{ $field->location }}</td>
                                <td>{{ $field->price }}
                                    @if ($field->is_promo)
                                    <span class="badge bg-primary">PROMO</span>
                                    @else
                                    <span class="badge bg-success">REGULAR</span>
                                    @endif
                                </td>
                                <td>{{ $field->contact_person }}</td>
                                <td class="">
                                    <a href="{{ route('admin.field.show', ['field' => $field->id]) }}"
                                        class="btn btn-success"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('admin.field.edit', ['field' => $field]) }}"
                                        class="btn btn-warning text-white"><i class="bi bi-pencil"></i></a>
                                    <form id="delete-form{{ $field->id }}"
                                        action="{{ route('admin.field.destroy', ['field' => $field]) }}"
                                        method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger confirm-delete"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $fields->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endslot
    @push('script')
        <script>
            $(document).ready(function() {
                $('.confirm-delete').on('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah Anda Yakin Menghapus Data?',
                        text: "Anda Tidak Akan Dapat Mengembalikannya!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).parent('form').trigger('submit')
                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                    });
                })
            });
        </script>
    @endpush
</x-dashboard>
