@extends('remake.template')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama-nama Unit</h5>

            <!-- Search Form -->
            <form action="{{ route('units') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari unit..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            <a href="{{ route('create_unit') }}" target="_blank"><button class="btn btn-primary" type="submit">Tambah Unit
                    Baru</button></a>


            <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0">
                    <thead>
                        <tr class="border-2 border-bottom border-primary border-0">
                            <th scope="col" class="ps-0">Nama Unit</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider w-100">
                        @if ($units->count() > 0)
                            @foreach ($units as $item)
                                <tr>
                                    <th scope="row" class="align-top w-25">
                                        <span class="d-flex align-items-start">

                                            {{ $item->nama_unit }}

                                        </span>
                                    </th>
                                    <td class="align-top">
                                        <div class="d-flex flex-column gap-3 align-items-end">
                                            <a href="{{ route('edit_unit') . '?id_unit=' . $item->id }}" target="_blank">
                                                <iconify-icon class="text-black fs-6 pointer w-100" data-toggle="tooltip"
                                                    data-placement="top" title="Edit" icon="teenyicons:edit-1-solid"
                                                    style="cursor: pointer"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">No users found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $units->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <!-- Add this JavaScript to enable the 'Lihat selengkapnya' functionality -->
    <script>
        document.querySelectorAll('.toggle-content').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const content = btn.previousElementSibling;
                const shortContent = content.querySelector('.short-content');
                const fullContent = content.querySelector('.full-content');

                // Check if both elements exist before proceeding
                if (shortContent && fullContent) {
                    if (fullContent.style.display === 'none') {
                        fullContent.style.display = 'block';
                        shortContent.style.display = 'none';
                        btn.textContent = 'Lihat lebih sedikit';
                    } else {
                        fullContent.style.display = 'none';
                        shortContent.style.display = 'block';
                        btn.textContent = 'Lihat selengkapnya';
                    }
                } else {
                    console.error('Short content or full content not found.');
                }
            });
        });
    </script>
@endsection
